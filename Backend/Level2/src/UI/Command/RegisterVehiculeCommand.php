<?php

namespace UI\Command;

use App\Command\RegisterVehiculeIntoFleetCommand;
use App\Command\RegisterVehiculeIntoFleetCommandHandler;
use Exception;
use Infra\Repository\FleetRepository;
use Infra\Repository\VehiculeRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RegisterVehiculeCommand extends Command
{
    protected static $defaultName = 'register-vehicle';

    protected function configure(): void
    {
        $this->setDescription('Register a vehicule into a fleet');
        $this->addArgument('fleetId', InputArgument::REQUIRED, 'Fleet Id');
        $this->addArgument('vehiclePlateNumber', InputArgument::REQUIRED, 'Vehicule Plate Number');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $repository = new FleetRepository();
            $vehiculeRepository = new VehiculeRepository();
            $handler = new RegisterVehiculeIntoFleetCommandHandler($repository);
            $handler->handle(new RegisterVehiculeIntoFleetCommand(
                $repository->get($input->getArgument('fleetId')),
                $vehiculeRepository->get($input->getArgument('vehiclePlateNumber'))
            ));
        } catch (Exception $e) {
            $output->write($e->getMessage());

            return Command::FAILURE;
        }

        $output->write('Vehicule was successfully registered');

        return Command::SUCCESS;
    }
}
