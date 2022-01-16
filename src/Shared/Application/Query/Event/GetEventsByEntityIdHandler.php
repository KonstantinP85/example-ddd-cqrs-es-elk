<?php

declare(strict_types=1);

namespace App\Shared\Application\Query\Event;

use App\Infrastructure\Repository\EventRepository;
use App\Shared\Application\Query\QueryHandlerInterface;

class GetEventsByEntityIdHandler implements QueryHandlerInterface
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
     * @param GetEventsByEntityIdQuery $query
     * @return array
     */
    public function __invoke(GetEventsByEntityIdQuery $query): array
    {
        $result = $this->eventRepository->getEventsByEntityId($query->getId(), $query->getEntityName());

        return $result;
    }
}