<?php

namespace DpdPickup\Api\State;

use DpdPickup\Api\Resource\DpdPickupDeliveryModeResource;
use DpdPickup\DpdPickup;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

class DpdPickupDeliveryModeNormalizer implements ContextAwareNormalizerInterface
{
    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return $data === DpdPickupDeliveryModeResource::class || (is_array($data) && isset($context['resource_class']) && $context['resource_class'] === DpdPickupDeliveryModeResource::class);
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $resource = new DpdPickupDeliveryModeResource();
        $resource->freeShippingFrom = DpdPickup::getFreeShippingAmount();

        return [$resource];
    }
}
