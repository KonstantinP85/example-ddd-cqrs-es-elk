<?php

declare(strict_types=1);

namespace App\Application\EventHandler\Product;

use App\Domain\Model\Product\ProductCreatedEvent;
use App\Infrastructure\Repository\EventRepository;
use App\Shared\Infrastructure\Bus\EventHandlerInterface;

class ProductCreatedEventHandler implements EventHandlerInterface
{

    private EventRepository $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function __invoke(ProductCreatedEvent $event): void
    {
        $this->eventRepository->save($event);
    }
}