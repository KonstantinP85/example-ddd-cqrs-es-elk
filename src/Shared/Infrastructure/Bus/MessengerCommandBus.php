<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Bus;

use App\Shared\Application\Command\CommandBusInterface;
use App\Shared\Application\Command\CommandInterface;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\MessageBusInterface;

class MessengerCommandBus implements CommandBusInterface
{
    /**
     * @var MessageBusInterface
     */
    private MessageBusInterface $messengerBusCommand;

    /**
     * @param MessageBusInterface $messengerBusCommand
     */
    public function __construct(MessageBusInterface $messengerBusCommand)
    {
        $this->messengerBusCommand = $messengerBusCommand;
    }

    /**
     * @param CommandInterface $command
     * @throws \Exception
     */
    public function handle(CommandInterface $command): void
    {
        try {
            $this->messengerBusCommand->dispatch($command);
        } catch (HandlerFailedException $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}