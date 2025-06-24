<?php

namespace DpdPickup\Api\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use DpdPickup\Api\Resource\DpdPickupCheckRightsResource;
use DpdPickup\DpdPickup;
use Symfony\Contracts\Translation\TranslatorInterface;

class DpdPickupCheckRightsProvider implements ProviderInterface
{
    public function __construct(private TranslatorInterface $translator) {}

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array
    {
        $resources = [];
        $dir = __DIR__ . '/../../Config/';

        if (!is_readable($dir)) {
            $res = new DpdPickupCheckRightsResource();
            $res->errMes = $this->translator->trans("Can't read Config directory", [], DpdPickup::DOMAIN);
            $res->errFile = '';
            $resources[] = $res;
        }
        if (!is_writable($dir)) {
            $res = new DpdPickupCheckRightsResource();
            $res->errMes = $this->translator->trans("Can't write Config directory", [], DpdPickup::DOMAIN);
            $res->errFile = '';
            $resources[] = $res;
        }
        if ($handle = @opendir($dir)) {
            while (false !== ($file = readdir($handle))) {
                if (strlen($file) > 5 && substr($file, -5) === ".json") {
                    $fullPath = $dir . $file;
                    if (!is_readable($fullPath)) {
                        $res = new DpdPickupCheckRightsResource();
                        $res->errMes = $this->translator->trans("Can't read file", [], DpdPickup::DOMAIN);
                        $res->errFile = "DpdPickup/Config/" . $file;
                        $resources[] = $res;
                    }
                    if (!is_writable($fullPath)) {
                        $res = new DpdPickupCheckRightsResource();
                        $res->errMes = $this->translator->trans("Can't write file", [], DpdPickup::DOMAIN);
                        $res->errFile = "DpdPickup/Config/" . $file;
                        $resources[] = $res;
                    }
                }
            }
            closedir($handle);
        }

        return $resources;
    }
}
