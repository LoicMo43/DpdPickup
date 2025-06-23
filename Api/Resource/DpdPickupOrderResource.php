<?php

namespace DpdPickup\Api\Resource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/front/dpd-pickup-orders',
            name: 'api_dpd_pickup_orders_get_collection_front'
        ),
    ],
    normalizationContext: ['groups' => [DpdPickupOrderResource::GROUP_FRONT_READ]]
)]
class DpdPickupOrderResource
{
    public const GROUP_FRONT_READ = 'front:dpd_pickup_order:read';

    #[Groups([self::GROUP_FRONT_READ])]
    public ?int $id = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $ref = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?int $customer_id = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?int $status_id = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $status_code = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?int $delivery_module_id = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?float $total_taxed_amount = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?float $total_amount = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $created_at = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $invoice_date = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?bool $is_paid = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?bool $is_processing = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?bool $is_sent = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?bool $is_cancelled = null;

    #[Groups([self::GROUP_FRONT_READ])]
    public ?float $weight = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(?string $ref): void
    {
        $this->ref = $ref;
    }

    public function getCustomerId(): ?int
    {
        return $this->customer_id;
    }

    public function setCustomerId(?int $customer_id): void
    {
        $this->customer_id = $customer_id;
    }

    public function getStatusId(): ?int
    {
        return $this->status_id;
    }

    public function setStatusId(?int $status_id): void
    {
        $this->status_id = $status_id;
    }

    public function getStatusCode(): ?string
    {
        return $this->status_code;
    }

    public function setStatusCode(?string $status_code): void
    {
        $this->status_code = $status_code;
    }

    public function getDeliveryModuleId(): ?int
    {
        return $this->delivery_module_id;
    }

    public function setDeliveryModuleId(?int $delivery_module_id): void
    {
        $this->delivery_module_id = $delivery_module_id;
    }

    public function getTotalTaxedAmount(): ?float
    {
        return $this->total_taxed_amount;
    }

    public function setTotalTaxedAmount(?float $total_taxed_amount): void
    {
        $this->total_taxed_amount = $total_taxed_amount;
    }

    public function getTotalAmount(): ?float
    {
        return $this->total_amount;
    }

    public function setTotalAmount(?float $total_amount): void
    {
        $this->total_amount = $total_amount;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function setCreatedAt(?string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getInvoiceDate(): ?string
    {
        return $this->invoice_date;
    }

    public function setInvoiceDate(?string $invoice_date): void
    {
        $this->invoice_date = $invoice_date;
    }

    public function getIsPaid(): ?bool
    {
        return $this->is_paid;
    }

    public function getIsProcessing(): ?bool
    {
        return $this->is_processing;
    }

    public function setIsProcessing(?bool $is_processing): void
    {
        $this->is_processing = $is_processing;
    }

    public function getIsSent(): ?bool
    {
        return $this->is_sent;
    }

    public function setIsSent(?bool $is_sent): void
    {
        $this->is_sent = $is_sent;
    }

    public function getIsCancelled(): ?bool
    {
        return $this->is_cancelled;
    }

    public function setIsCancelled(?bool $is_cancelled): void
    {
        $this->is_cancelled = $is_cancelled;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): void
    {
        $this->weight = $weight;
    }
}
