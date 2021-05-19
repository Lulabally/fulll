<?php

namespace App\Command;

use Domain\Fleet;
use Domain\FleetRepository;

class CreateFleetCommandHandler
{
    private $repository;

    public function __construct(FleetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(): Fleet
    {
        return $this->repository->createFleet();
    }
}
