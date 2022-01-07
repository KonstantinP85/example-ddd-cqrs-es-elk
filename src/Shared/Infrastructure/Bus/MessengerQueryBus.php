<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Bus;

use App\Shared\Application\Query\QueryBusInterface;
use App\Shared\Application\Query\QueryInterface;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class MessengerQueryBus implements QueryBusInterface
{
    use HandleTrait;

    /**
     * @param MessageBusInterface $messengerBusQuery
     */
    public function __construct(MessageBusInterface $messengerBusQuery)
    {
        $this->messageBus = $messengerBusQuery;
    }

    /**
     * @param QueryInterface $query
     * @return mixed
     * @throws \Exception
     */
    public function query(QueryInterface $query)
    {
        return $this->handle($query);
    }
}