<?php

namespace Domain;

interface VehiculeRepository
{
    public function registerLocation(Vehicule $vehicule, string $location): Vehicule;
}
