<?php

namespace UI\Command;

use App\Command\CreateFleetCommandHandler;
use Domain\Fleet;
use Infra\Repository\FleetRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateFleetCommand extends Command
{
    protected static $defaultName = 'create';

    protected function configure(): void
    {
        $this->setDescription('Creates a new fleet.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $repository = new FleetRepository();
        $handler = new CreateFleetCommandHandler($repository);
        /**
         * @var Fleet $fleet
         */
        $fleet = $handler->handle();

        $output->write('Fleet #'.$fleet->getId().' was successfully created');

        return Command::SUCCESS;
    }
}
