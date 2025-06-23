<?php

namespace DpdPickup\Api\Provider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use DpdPickup\Api\Resource\DpdPickupAddressResource;
use DpdPickup\Model\AddressIcirelaisQuery;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Thelia\Model\AddressQuery;

class DpdPickupAddressProvider implements ProviderInterface
{
    /**
     * @param Operation $operation
     * @param array $uriVariables
     * @param array $context
     * @return DpdPickupAddressResource|null
     */
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): ?DpdPickupAddressResource
    {
        $id = $uriVariables['id'] ?? null;
        if (!$id) {
            throw new NotFoundHttpException('Address ID is required');
        }

        $address = AddressIcirelaisQuery::create()->findPk($id);

        if (null === $address) {
            $address = AddressQuery::create()->findPk($id);
        }

        if (null === $address) {
            throw new NotFoundHttpException('Address not found');
        }

        $res = new DpdPickupAddressResource();
        $res->title = $address->getTitleId();
        $res->company = $address->getCompany();
        $res->firstname = $address->getFirstname();
        $res->lastname = $address->getLastname();
        $res->address1 = $address->getAddress1();
        $res->address2 = $address->getAddress2();
        $res->address3 = $address->getAddress3();
        $res->zipcode = $address->getZipcode();
        $res->city = $address->getCity();
        $res->country = $address->getCountryId();

        return $res;
    }
}
