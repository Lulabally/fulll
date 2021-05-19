<?php

namespace Infra\Repository;

use Domain\Vehicule;
use Domain\VehiculeRepository as DomainVehiculeRepository;

class VehiculeRepository implements DomainVehiculeRepository
{
    public function registerLocation(Vehicule $vehicule, string $location): Vehicule
    {
        $vehicule->setLocation($location);

        return $vehicule;
    }
}
