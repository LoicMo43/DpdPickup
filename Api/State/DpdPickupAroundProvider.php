<?php

namespace DpdPickup\Api\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use DpdPickup\Api\Resource\DpdPickupAroundResource;
use DpdPickup\DpdPickup;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Thelia\Model\AddressQuery;
use Thelia\Core\Translation\Translator;

class DpdPickupAroundProvider implements ProviderInterface
{
    public function __construct(private RequestStack $requestStack) {}

    /**
     * @param Operation $operation
     * @param array $uriVariables
     * @param array $context
     * @return array|object[]
     * @throws \Exception
     */
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array
    {
        $request = $this->requestStack->getCurrentRequest();
        $zipcode = $request?->query->get('zipcode', '');
        $city = $request?->query->get('city', '');

        $excludeZipCodes = DpdPickup::getConfigExcludeZipCode();
        $date = date('d/m/Y');

        if ($zipcode && $city) {
            if (in_array($zipcode, $excludeZipCodes, true)) {
                return [];
            }
            $queryParams = [
                "zipCode" => $zipcode,
                "city" => str_replace(" ", "%", $city),
                "request_id" => "1234",
                "date_from" => $date
            ];
        } else {
            $session = $request?->getSession();
            $customer = $session?->getCustomerUser();
            if (null === $customer) {
                throw new BadRequestHttpException("Customer not connected.");
            }
            $address = AddressQuery::create()
                ->filterByCustomerId(1)
                ->filterByIsDefault(true)
                ->findOne();
            if (!$address) {
                throw new BadRequestHttpException("Default address not found.");
            }
            if (in_array($address->getZipcode(), $excludeZipCodes)) {
                return [];
            }
            $queryParams = [
                "address"    => str_replace(" ", "%", $address->getAddress1()),
                "zipCode"    => $address->getZipcode(),
                "city"       => str_replace(" ", "%", $address->getCity()),
                "request_id" => "1234",
                "date_from"  => $date
            ];
        }

        try {
            $getPudoSoap = new \SoapClient(__DIR__ . "/../../Config/exapaq.wsdl", ['soap_version' => SOAP_1_2]);
            $response = $getPudoSoap->GetPudoList($queryParams);
        } catch (\SoapFault $e) {
            return [];
        }

        $xml = new \SimpleXMLElement($response->GetPudoListResult->any);
        if (isset($xml->ERROR)) {
            throw new BadRequestHttpException("Error while choosing pick-up & go store: " . $xml->ERROR);
        }

        $items = [];
        foreach ($xml->PUDO_ITEMS->PUDO_ITEM as $item) {
            $res = new DpdPickupAroundResource();
            $distance = (string)$item->DISTANCE;
            if (strlen($distance) < 4) {
                $distance .= " m";
            } else {
                $distance = (string) ((float)$distance / 1000);
                $distance = rtrim(rtrim($distance, '0'), '.');
                $distance = str_replace(".", ",", $distance) . " km";
            }
            $hours = [];
            foreach ($item->OPENING_HOURS_ITEMS->OPENING_HOURS_ITEM as $openingHoursItem) {
                $day = Translator::getInstance()->trans('day_' . (string)$openingHoursItem->DAY_ID, [], DpdPickup::DOMAIN);
                $hours[$day][] = [
                    'START_TM' => (string)$openingHoursItem->START_TM,
                    'END_TM' => (string)$openingHoursItem->END_TM
                ];
            }
            $res->name = self::cleanString((string)$item->NAME);
            $res->longitude = (float)str_replace(",", ".", $item->LONGITUDE);
            $res->latitude = (float)str_replace(",", ".", $item->LATITUDE);
            $res->code = (string)$item->PUDO_ID;
            $res->address = self::cleanString((string)$item->ADDRESS1);
            $res->zipcode = self::cleanString((string)$item->ZIPCODE);
            $res->city = self::cleanString((string)$item->CITY);
            $res->distance = $distance;
            $res->hours = $hours;
            $items[] = $res;
        }

        return $items;
    }

    /**
     * @param $string
     * @return string
     */
    public static function cleanString($string): string
    {
        return str_replace(['"'], ["'"], $string);
    }
}
