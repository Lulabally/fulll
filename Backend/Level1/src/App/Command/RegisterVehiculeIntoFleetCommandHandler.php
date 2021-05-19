<?php

namespace App\Command;

use Domain\FleetRepository;

class RegisterVehiculeIntoFleetCommandHandler
{
    private $repository;

    public function __construct(FleetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(RegisterVehiculeIntoFleetCommand $command)
    {
        $this->repository->registerVehicule($command->getFleet(), $command->getVehicule());
    }
}
