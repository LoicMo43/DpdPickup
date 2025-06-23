<?php

namespace DpdPickup\Api\Resource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/front/dpd-pickup-deliveries',
            name: 'api_dpd_pickup_delivery_get_collection_front'
        ),
    ],
    normalizationContext: ['groups' => [DpdPickupDeliveryResource::GROUP_FRONT_READ]]
)]
class DpdPickupDeliveryResource
{
    public const GROUP_FRONT_READ = 'front:dpd_pickup_delivery:read';

    #[Groups([self::GROUP_FRONT_READ])]
    public ?int $id = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $code = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $title = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $chapo = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $description = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $postscriptum = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?float $postage = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?float $postageTax = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?float $postageUntaxed = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $postageTaxRuleTitle = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public $deliveryDate = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $iciRelaisModule = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getChapo(): ?string
    {
        return $this->chapo;
    }

    public function setChapo(?string $chapo): void
    {
        $this->chapo = $chapo;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getPostscriptum(): ?string
    {
        return $this->postscriptum;
    }

    public function setPostscriptum(?string $postscriptum): void
    {
        $this->postscriptum = $postscriptum;
    }

    public function getPostage(): ?float
    {
        return $this->postage;
    }

    public function setPostage(?float $postage): void
    {
        $this->postage = $postage;
    }

    public function getPostageTax(): ?float
    {
        return $this->postageTax;
    }

    public function setPostageTax(?float $postageTax): void
    {
        $this->postageTax = $postageTax;
    }

    public function getPostageUntaxed(): ?float
    {
        return $this->postageUntaxed;
    }

    public function setPostageUntaxed(?float $postageUntaxed): void
    {
        $this->postageUntaxed = $postageUntaxed;
    }

    public function getPostageTaxRuleTitle(): ?string
    {
        return $this->postageTaxRuleTitle;
    }

    public function setPostageTaxRuleTitle(?string $postageTaxRuleTitle): void
    {
        $this->postageTaxRuleTitle = $postageTaxRuleTitle;
    }

    public function getDeliveryDate(): null
    {
        return $this->deliveryDate;
    }

    public function setDeliveryDate(null $deliveryDate): void
    {
        $this->deliveryDate = $deliveryDate;
    }

    public function getIciRelaisModule(): ?string
    {
        return $this->iciRelaisModule;
    }

    public function setIciRelaisModule(?string $iciRelaisModule): void
    {
        $this->iciRelaisModule = $iciRelaisModule;
    }
}
