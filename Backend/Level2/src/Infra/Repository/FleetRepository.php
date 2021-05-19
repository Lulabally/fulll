<?php

namespace Infra\Repository;

use Domain\Fleet;
use Domain\FleetRepository as DomainFleetRepository;
use Domain\Vehicule;

/**
 * @todo
 */
class FleetRepository implements DomainFleetRepository
{
    public function createFleet(): Fleet
    {
        $fleet = new Fleet();
        $fleet->setId(2);

        return $fleet;
    }

    public function registerVehicule(Fleet $fleet, Vehicule $vehicule): Fleet
    {
        $fleet->addVehicule($vehicule);

        return $fleet;
    }

    public function get(int $id): Fleet
    {
        $fleet = new Fleet();
        $fleet->setId($id);

        return $fleet;
    }

    public function save(Fleet $fleet)
    {
    }
}
