<?php

declare(strict_types=1);

namespace App\Shared\Application\Query\Event;

use App\Infrastructure\Repository\EventRepository;
use App\Shared\Application\Query\QueryHandlerInterface;

class GetEventsHandler implements QueryHandlerInterface
{
    /**
     * @var EventRepository
     */
    private EventRepository $eventRepository;

    /**
     * @param EventRepository $eventRepository
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * @param GetEventsQuery $query
     * @return array
     */
    public function __invoke(GetEventsQuery $query): array
    {
        $result = $this->eventRepository->getEvents();

        return $result;
    }
}