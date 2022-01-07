<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Bus;

use App\Shared\Domain\Model\DomainEventInterface;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\MessageBusInterface;

class MessengerEventBus
{
    private MessageBusInterface $messengerBusEvent;

    public function __construct(MessageBusInterface $messengerBusEvent)
    {
        $this->messengerBusEvent = $messengerBusEvent;
    }

    /**
     * @throws \Exception
     */
    public function handle(DomainEventInterface $event): void
    {
        try {
            $this->messengerBusEvent->dispatch($event, [
                //new AmqpStamp($command->getType()),
            ]);
        } catch (HandlerFailedException $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}