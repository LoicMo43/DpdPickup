<?php

namespace DpdPickup\Api\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use DpdPickup\Api\Resource\DpdPickupUrlTrackingResource;
use Thelia\Model\OrderQuery;

class DpdPickupUrlTrackingProvider implements ProviderInterface
{
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array
    {
        $request = $context['request'] ?? null;
        $ref = $request?->query->get('ref');
        $results = [];

        if ($ref && null !== $order = OrderQuery::create()->findOneByRef($ref)) {
            $resource = new DpdPickupUrlTrackingResource();
            $resource->url = sprintf("http://www.dpd.fr/traces_info_%s", $order->getDeliveryRef());
            $results[] = $resource;
        }

        return $results;
    }
}
