<?php

namespace DpdPickup\Api\Resource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use DpdPickup\Api\State\DpdPickupAroundProvider;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/front/dpd-pickup-pudo',
            name: 'api_dpd_pickup_around_get_collection_front',
            provider: DpdPickupAroundProvider::class
        ),
    ],
    normalizationContext: ['groups' => [DpdPickupAroundResource::GROUP_FRONT_READ]]
)]
class DpdPickupAroundResource
{
    public const GROUP_FRONT_READ = 'front:dpd_pickup_around:read';

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $name = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?float $longitude = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?float $latitude = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $code = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $address = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $zipcode = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $city = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $distance = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public array $hours = [];

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): void
    {
        $this->longitude = $longitude;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(?string $zipcode): void
    {
        $this->zipcode = $zipcode;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function getDistance(): ?string
    {
        return $this->distance;
    }

    public function setDistance(?string $distance): void
    {
        $this->distance = $distance;
    }

    public function getHours(): array
    {
        return $this->hours;
    }

    public function setHours(array $hours): void
    {
        $this->hours = $hours;
    }
}
