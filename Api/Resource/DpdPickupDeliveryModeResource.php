<?php

namespace DpdPickup\Api\Resource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/front/dpd-pickup-delivery-modes',
            name: 'api_dpd_pickup_delivery_mode_get_collection_front'
        ),
    ],
    normalizationContext: ['groups' => [DpdPickupDeliveryModeResource::GROUP_FRONT_READ]]
)]
class DpdPickupDeliveryModeResource
{
    public const GROUP_FRONT_READ = 'front:dpd_pickup_delivery_mode:read';

    /**
     * @var float|null
     */
    #[Groups([self::GROUP_FRONT_READ])]
    public ?float $freeShippingFrom = null;

    /**
     * @return float|null
     */
    public function getFreeShippingFrom(): ?float
    {
        return $this->freeShippingFrom;
    }

    /**
     * @param float|null $freeShippingFrom
     * @return void
     */
    public function setFreeShippingFrom(?float $freeShippingFrom): void
    {
        $this->freeShippingFrom = $freeShippingFrom;
    }
}
