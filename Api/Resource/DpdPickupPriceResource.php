<?php

namespace DpdPickup\Api\Resource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/front/dpd-pickup-prices',
            name: 'api_dpd_pickup_price_get_collection_front'
        ),
    ],
    normalizationContext: ['groups' => [DpdPickupPriceResource::GROUP_FRONT_READ]]
)]
class DpdPickupPriceResource
{
    public const GROUP_FRONT_READ = 'front:dpd_pickup_price:read';

    #[Groups([self::GROUP_FRONT_READ])]
    public ?float $maxWeight = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?float $price = null;

    public function getMaxWeight(): ?float
    {
        return $this->maxWeight;
    }

    public function setMaxWeight(?float $maxWeight): void
    {
        $this->maxWeight = $maxWeight;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }
}
