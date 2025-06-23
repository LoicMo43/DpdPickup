<?php

namespace DpdPickup\Api\Resource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use DpdPickup\Api\Provider\DpdPickupAddressProvider;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new Get(
            uriTemplate: '/front/dpd-pickup-address/{id}',
            name: 'api_dpd_pickup_address_get_front',
            provider: DpdPickupAddressProvider::class
        )
    ],
    normalizationContext: ['groups' => [DpdPickupAddressResource::GROUP_FRONT_READ]]
)]
class DpdPickupAddressResource
{
    public const GROUP_FRONT_READ = 'front:dpd_pickup_address:read';

    /**
     * @var int|null
     */
    #[Groups([self::GROUP_FRONT_READ])]
    public ?int $title = null;

    /**
     * @var string|null
     */
    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $company = null;

    /**
     * @var string|null
     */
    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $firstname = null;

    /**
     * @var string|null
     */
    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $lastname = null;

    /**
     * @var string|null
     */
    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $address1 = null;

    /**
     * @var string|null
     */
    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $address2 = null;

    /**
     * @var string|null
     */
    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $address3 = null;

    /**
     * @var string|null
     */
    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $zipcode = null;

    /**
     * @var string|null
     */
    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $city = null;

    /**
     * @var int|null
     */
    #[Groups([self::GROUP_FRONT_READ])]
    public ?int $country = null;

    /**
     * @return int|null
     */
    public function getTitle(): ?int
    {
        return $this->title;
    }

    /**
     * @param int|null $title
     * @return void
     */
    public function setTitle(?int $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param string|null $company
     * @return void
     */
    public function setCompany(?string $company): void
    {
        $this->company = $company;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     * @return void
     */
    public function setFirstname(?string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     * @return void
     */
    public function setLastname(?string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string|null
     */
    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    /**
     * @param string|null $address1
     * @return void
     */
    public function setAddress1(?string $address1): void
    {
        $this->address1 = $address1;
    }

    /**
     * @return string|null
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    /**
     * @param string|null $address2
     * @return void
     */
    public function setAddress2(?string $address2): void
    {
        $this->address2 = $address2;
    }

    /**
     * @return string|null
     */
    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    /**
     * @param string|null $zipcode
     * @return void
     */
    public function setZipcode(?string $zipcode): void
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return void
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return int|null
     */
    public function getCountry(): ?int
    {
        return $this->country;
    }

    /**
     * @param int|null $country
     * @return void
     */
    public function setCountry(?int $country): void
    {
        $this->country = $country;
    }
}
