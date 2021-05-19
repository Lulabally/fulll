<?php

namespace Domain;

use Exception;

class Vehicule
{
    private $id;

    private $plateNubmer;

    private $location;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlateNumber(): ?string
    {
        return $this->plateNubmer;
    }

    public function setPlateNumber(string $plateNumber): ?string
    {
        return $this->plateNubmer = $plateNumber;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): ?string
    {
        if ($this->location != $location) {
            $this->location = $location;
        } else {
            throw new Exception('This vehicule has already been parked at this location.');
        }

        return $this->location;
    }
}
