<?php

namespace Infra\Repository;

use Domain\Fleet;
use Domain\FleetRepository as DomainFleetRepository;
use Domain\Vehicule;

class FleetRepository implements DomainFleetRepository
{
    public function registerVehicule(Fleet $fleet, Vehicule $vehicule): Fleet
    {
        $fleet->addVehicule($vehicule);

        return $fleet;
    }
}
