<?php

namespace Infra\Repository;

use Domain\Vehicule;
use Domain\VehiculeRepository as DomainVehiculeRepository;

/**
 * @todo
 */
class VehiculeRepository implements DomainVehiculeRepository
{
    public function createVehicule(): Vehicule
    {
        $vehicule = new Vehicule();
        $vehicule->setId(45);
        $vehicule->setPlateNumber('AA-714-BB');

        return $vehicule;
    }

    public function get(string $plateNumber): Vehicule
    {
        $vehicule = new Vehicule();
        $vehicule->setId(45);
        $vehicule->setPlateNumber($plateNumber);

        return $vehicule;
    }

    public function registerLocation(Vehicule $vehicule, string $location): Vehicule
    {
        $vehicule->setLocation($location);

        return $vehicule;
    }
}
