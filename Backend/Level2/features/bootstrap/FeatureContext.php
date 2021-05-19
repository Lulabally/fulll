<?php

use App\Command\ParkVehiculeAtLocationCommand;
use App\Command\ParkVehiculeAtLocationCommandHandler;
use App\Command\RegisterVehiculeIntoFleetCommand;
use App\Command\RegisterVehiculeIntoFleetCommandHandler;
use Behat\Behat\Context\Context;
use Domain\Fleet;
use Domain\Vehicule;
use Infra\Repository\FleetRepository;
use Infra\Repository\VehiculeRepository;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $myFleet;
    private $vehicule;
    private $anotherFleet;
    private $registerExceptionMessage;
    private $location;
    private $parkExceptionMessage;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->registerExceptionMessage = '';
        $this->parkExceptionMessage = '';
    }

    /**
     * @Given my fleet
     */
    public function myFleet()
    {
        $myFleet = new Fleet();
        $myFleet->setUser(18);
        $this->myFleet = $myFleet;
    }

    /**
     * @Given a vehicle
     *
     * @param mixed $vehicule
     */
    public function aVehicle()
    {
        $vehicule = new Vehicule();
        $vehicule->setPlateNumber('AA-228-AA');
        $this->vehicule = $vehicule;
    }

    /**
     * @When I register this vehicle into my fleet
     */
    public function iRegisterThisVehicleIntoMyFleet()
    {
        $repository = new FleetRepository();
        $handler = new RegisterVehiculeIntoFleetCommandHandler($repository);
        $handler->handle(new RegisterVehiculeIntoFleetCommand(
            $this->myFleet,
            $this->vehicule
        ));
    }

    /**
     * @Then this vehicle should be part of my vehicle fleet
     */
    public function thisVehicleShouldBePartOfMyVehicleFleet()
    {
        Assert::assertContains($this->vehicule, $this->myFleet->getVehicules());
    }

    /**
     * @Given I have registered this vehicle into my fleet
     */
    public function iHaveRegisteredThisVehicleIntoMyFleet()
    {
        $repository = new FleetRepository();
        $handler = new RegisterVehiculeIntoFleetCommandHandler($repository);
        $handler->handle(new RegisterVehiculeIntoFleetCommand(
            $this->myFleet,
            $this->vehicule
        ));
    }

    /**
     * @When I try to register this vehicle into my fleet
     */
    public function iTryToRegisterThisVehicleIntoMyFleet()
    {
        try {
            $repository = new FleetRepository();
            $handler = new RegisterVehiculeIntoFleetCommandHandler($repository);
            $handler->handle(new RegisterVehiculeIntoFleetCommand(
                $this->myFleet,
                $this->vehicule
            ));
        } catch (Exception $e) {
            $this->registerExceptionMessage = $e->getMessage();
        }
    }

    /**
     * @Then I should be informed this this vehicle has already been registered into my fleet
     */
    public function iShouldBeInformedThisThisVehicleHasAlreadyBeenRegisteredIntoMyFleet()
    {
        Assert::assertEquals('This vehicule is already registered.', $this->registerExceptionMessage);
    }

    /**
     * @Given the fleet of another user
     */
    public function theFleetOfAnotherUser()
    {
        $anotherFleet = new Fleet();
        $anotherFleet->setUser(32);
        $this->anotherFleet = $anotherFleet;
    }

    /**
     * @Given this vehicle has been registered into the other user's fleet
     */
    public function thisVehicleHasBeenRegisteredIntoTheOtherUsersFleet()
    {
        $repository = new FleetRepository();
        $handler = new RegisterVehiculeIntoFleetCommandHandler($repository);
        $handler->handle(new RegisterVehiculeIntoFleetCommand(
            $this->anotherFleet,
            $this->vehicule
        ));
    }

    /**
     * @When I register this other vehicle into my fleet
     */
    public function iRegisterThisOtherVehicleIntoMyFleet()
    {
        $repository = new FleetRepository();
        $handler = new RegisterVehiculeIntoFleetCommandHandler($repository);
        $handler->handle(new RegisterVehiculeIntoFleetCommand(
            $this->myFleet,
            $this->vehicule
        ));
    }

    /**
     * @Then this other vehicle should be part of my vehicle fleet
     */
    public function thisOtherVehicleShouldBePartOfMyVehicleFleet()
    {
        Assert::assertContains($this->vehicule, $this->myFleet->getVehicules());
    }

    /**
     * @Given a location
     */
    public function aLocation()
    {
        $this->location = '48.862725,2.287592';
    }

    /**
     * @When I park my vehicle at this location
     */
    public function iParkMyVehicleAtThisLocation()
    {
        $repository = new VehiculeRepository();
        $handler = new ParkVehiculeAtLocationCommandHandler($repository);
        $handler->handle(new ParkVehiculeAtLocationCommand(
            $this->vehicule,
            $this->location
        ));
    }

    /**
     * @Then the known location of my vehicle should verify this location
     */
    public function theKnownLocationOfMyVehicleShouldVerifyThisLocation()
    {
        Assert::assertEquals($this->location, $this->vehicule->getLocation());
    }

    /**
     * @Given my vehicle has been parked into this location
     */
    public function myVehicleHasBeenParkedIntoThisLocation()
    {
        $repository = new VehiculeRepository();
        $handler = new ParkVehiculeAtLocationCommandHandler($repository);
        $handler->handle(new ParkVehiculeAtLocationCommand(
            $this->vehicule,
            $this->location
        ));
    }

    /**
     * @When I try to park my vehicle at this location
     */
    public function iTryToParkMyVehicleAtThisLocation()
    {
        try {
            $repository = new VehiculeRepository();
            $handler = new ParkVehiculeAtLocationCommandHandler($repository);
            $handler->handle(new ParkVehiculeAtLocationCommand(
                $this->vehicule,
                $this->location
            ));
        } catch (Exception $e) {
            $this->parkExceptionMessage = $e->getMessage();
        }
    }

    /**
     * @Then I should be informed that my vehicle is already parked at this location
     */
    public function iShouldBeInformedThatMyVehicleIsAlreadyParkedAtThisLocation()
    {
        Assert::assertEquals('This vehicule has already been parked at this location.', $this->parkExceptionMessage);
    }
}
