<?php

declare(strict_types=1);

namespace App\Shared\Application\Query\Event;

use App\Infrastructure\Repository\EventRepository;
use App\Shared\Application\Query\QueryHandlerInterface;

class GetEventsHandler implements QueryHandlerInterface
{
    private EventRepository $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     */
    public function __invoke(GetEventsQuery $query): array
    {
        $result = $this->eventRepository->getEvents();

        return $result;
    }
}