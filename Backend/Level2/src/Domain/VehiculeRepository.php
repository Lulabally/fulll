<?php

namespace Domain;

interface VehiculeRepository
{
    public function get(string $plateNumber): Vehicule;

    public function registerLocation(Vehicule $vehicule, string $location): Vehicule;
}
