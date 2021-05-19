<?php

namespace App\Command;

use Domain\Vehicule;

class ParkVehiculeAtLocationCommand
{
    private $vehicule;
    private $location;

    public function __construct(Vehicule $vehicule, string $location)
    {
        $this->vehicule = $vehicule;
        $this->location = $location;
    }

    public function getVehicule(): Vehicule
    {
        return $this->vehicule;
    }

    public function getLocation(): string
    {
        return $this->location;
    }
}
