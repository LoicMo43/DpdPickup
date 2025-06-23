<?php

namespace DpdPickup\Api\Normalizer;

use DpdPickup\Api\Resource\DpdPickupOrderResource;
use Thelia\Model\Order;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

class DpdPickupOrderResourceNormalizer implements ContextAwareNormalizerInterface
{
    /**
     * @param $data
     * @param $format
     * @param array $context
     * @return bool
     */
    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return $data instanceof Order;
    }

    /**
     * @param $order
     * @param $format
     * @param array $context
     * @return DpdPickupOrderResource
     */
    public function normalize($order, $format = null, array $context = []): DpdPickupOrderResource
    {
        $resource = new DpdPickupOrderResource();
        $resource->id = $order->getId();
        $resource->ref = $order->getRef();
        $resource->customer_id = $order->getCustomerId();
        $resource->status_id = $order->getStatusId();
        $resource->status_code = $order->getOrderStatus()?->getCode();
        $resource->delivery_module_id = $order->getDeliveryModuleId();
        $resource->total_taxed_amount = $order->getTotalAmount();
        $resource->total_amount = $order->getTotalAmount() - $order->getTotalTax();
        $resource->created_at = $order->getCreatedAt()?->format('Y-m-d H:i:s');
        $resource->invoice_date = $order->getInvoiceDate()?->format('Y-m-d');
        $resource->is_paid = $order->isPaid(false);
        $resource->is_processing = $order->isProcessing();
        $resource->is_sent = $order->isSent();
        $resource->is_cancelled = $order->isCancelled();
        $resource->weight = $order->getWeight();

        return $resource;
    }
}
