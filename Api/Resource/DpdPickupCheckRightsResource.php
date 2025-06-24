<?php

namespace DpdPickup\Api\Resource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use DpdPickup\Api\State\DpdPickupCheckRightsProvider;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/admin/dpd-pickup-check-rights',
            name: 'api_dpd_pickup_check_rights_get_collection_admin',
            provider: DpdPickupCheckRightsProvider::class
        ),
    ],
    normalizationContext: ['groups' => [DpdPickupCheckRightsResource::GROUP_ADMIN_READ]]
)]
class DpdPickupCheckRightsResource
{
    public const GROUP_ADMIN_READ = 'admin:dpd_pickup_check_rights:read';

    /**
     * @var string|null
     */
    #[Groups([self::GROUP_ADMIN_READ])]
    public ?string $errMes = null;

    /**
     * @var string|null
     */
    #[Groups([self::GROUP_ADMIN_READ])]
    public ?string $errFile = null;

    /**
     * @return string|null
     */
    public function getErrMes(): ?string
    {
        return $this->errMes;
    }

    /**
     * @param string|null $errMes
     * @return void
     */
    public function setErrMes(?string $errMes): void
    {
        $this->errMes = $errMes;
    }

    /**
     * @return string|null
     */
    public function getErrFile(): ?string
    {
        return $this->errFile;
    }

    /**
     * @param string|null $errFile
     * @return void
     */
    public function setErrFile(?string $errFile): void
    {
        $this->errFile = $errFile;
    }
}
