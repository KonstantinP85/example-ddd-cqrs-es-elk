<?php

declare(strict_types=1);

namespace App\Rest;

use App\Shared\Application\Command\CommandBusInterface;
use App\Shared\Application\Command\CommandInterface;

abstract class CommandAction
{
    /**
     * @var CommandBusInterface
     */
    private CommandBusInterface $commandBus;

    /**
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param CommandInterface $command
     */
    protected function handle(CommandInterface $command): void
    {
        $this->commandBus->handle($command);
    }
}