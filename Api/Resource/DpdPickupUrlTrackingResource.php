<?php

namespace DpdPickup\Api\Resource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/front/dpd-pickup-url-tracking',
            name: 'api_dpd_pickup_url_tracking_get_collection_front',
            provider: DpdPickupUrlTrackingProvider::class
        ),
    ],
    normalizationContext: ['groups' => [DpdPickupUrlTrackingResource::GROUP_FRONT_READ]]
)]
class DpdPickupUrlTrackingResource
{
    public const GROUP_FRONT_READ = 'front:dpd_pickup_url_tracking:read';

    #[Groups([self::GROUP_FRONT_READ])]
    public ?string $url = null;

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }
}
