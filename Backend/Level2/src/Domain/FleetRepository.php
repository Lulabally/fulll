<?php

namespace Domain;

interface FleetRepository
{
    public function createFleet(): Fleet;

    public function registerVehicule(Fleet $fleet, Vehicule $vehicule): Fleet;

    public function get(int $id): Fleet;
}
