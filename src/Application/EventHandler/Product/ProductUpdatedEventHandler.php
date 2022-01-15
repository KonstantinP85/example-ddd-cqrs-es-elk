<?php

declare(strict_types=1);

namespace App\Application\EventHandler\Product;

use App\Domain\Model\Product\ProductUpdatedEvent;
use App\Infrastructure\Repository\EventRepository;
use App\Shared\Infrastructure\Bus\EventHandlerInterface;

class ProductUpdatedEventHandler implements EventHandlerInterface
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
     * @param ProductUpdatedEvent $event
     */
    public function __invoke(ProductUpdatedEvent $event): void
    {
        $this->eventRepository->save($event);
    }
}