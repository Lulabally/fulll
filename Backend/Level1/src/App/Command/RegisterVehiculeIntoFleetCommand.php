<?php

namespace App\Command;

use Domain\Fleet;
use Domain\Vehicule;

class RegisterVehiculeIntoFleetCommand
{
    private $fleet;
    private $vehicule;

    public function __construct(Fleet $fleet, Vehicule $vehicule)
    {
        $this->fleet = $fleet;
        $this->vehicule = $vehicule;
    }

    public function getFleet(): Fleet
    {
        return $this->fleet;
    }

    public function getVehicule(): Vehicule
    {
        return $this->vehicule;
    }
}
