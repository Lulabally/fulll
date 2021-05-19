<?php

namespace App\Command;

use Domain\VehiculeRepository;

class ParkVehiculeAtLocationCommandHandler
{
    private $repository;

    public function __construct(VehiculeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ParkVehiculeAtLocationCommand $command)
    {
        $this->repository->registerLocation($command->getVehicule(), $command->getLocation());
    }
}
