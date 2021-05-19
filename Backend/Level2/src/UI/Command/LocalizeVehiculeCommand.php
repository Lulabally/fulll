<?php

namespace UI\Command;

use App\Command\ParkVehiculeAtLocationCommand;
use App\Command\ParkVehiculeAtLocationCommandHandler;
use Exception;
use Infra\Repository\VehiculeRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LocalizeVehiculeCommand extends Command
{
    protected static $defaultName = 'localize-vehicule';

    protected function configure(): void
    {
        $this->setDescription('Localize a vehicule');
        $this->addArgument('fleetId', InputArgument::REQUIRED, 'Fleet Id');
        $this->addArgument('vehiclePlateNumber', InputArgument::REQUIRED, 'Vehicule Plate Number');
        $this->addArgument('location', InputArgument::REQUIRED, 'Location');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $repository = new VehiculeRepository();
            $handler = new ParkVehiculeAtLocationCommandHandler($repository);
            $handler->handle(new ParkVehiculeAtLocationCommand(
                $repository->get($input->getArgument('vehiclePlateNumber')),
                $input->getArgument('location')
            ));
        } catch (Exception $e) {
            $output->write($e->getMessage());

            return Command::FAILURE;
        }

        $output->write('Vehicule was successfully localized');

        return Command::SUCCESS;
    }
}
