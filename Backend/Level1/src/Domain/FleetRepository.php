<?php

namespace Domain;

interface FleetRepository
{
    public function registerVehicule(Fleet $fleet, Vehicule $vehicule): Fleet;
}
