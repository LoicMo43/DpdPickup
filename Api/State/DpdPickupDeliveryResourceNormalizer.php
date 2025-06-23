<?php

namespace DpdPickup\Api\Normalizer;

use DpdPickup\Api\Resource\DpdPickupDeliveryResource;
use DpdPickup\DpdPickup;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class DpdPickupDeliveryResourceNormalizer implements ContextAwareNormalizerInterface
{
    public function __construct(private ObjectNormalizer $normalizer) {}

    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return $data instanceof DpdPickupDeliveryResource;
    }

    public function normalize($object, string $format = null, array $context = []): array
    {
        /** @var DpdPickupDeliveryResource $object */
        $data = $this->normalizer->normalize($object, $format, $context);
        $data['iciRelaisModule'] = DpdPickup::getModuleId();

        return $data;
    }
}
