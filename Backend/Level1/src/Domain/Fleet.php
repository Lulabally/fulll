<?php

namespace Domain;

use Exception;

class Fleet
{
    private $id;

    private $user;

    private $vehicules;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?int
    {
        return $this->user;
    }

    public function setUser(int $userId)
    {
        $this->user = $userId;
    }

    public function getVehicules(): ?array
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): self
    {
        if (is_null($this->getVehicules()) || !in_array($vehicule, $this->getVehicules(), true)) {
            $this->vehicules[] = $vehicule;
        } else {
            throw new Exception('This vehicule is already registered.');
        }

        return $this;
    }
}
