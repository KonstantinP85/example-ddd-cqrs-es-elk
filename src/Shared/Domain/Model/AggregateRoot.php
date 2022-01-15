<?php

declare(strict_types=1);

namespace App\Shared\Domain\Model;

abstract class AggregateRoot
{
    /**
     * @var DomainEventInterface[]
     */
    private array $events = [];

    abstract public function getId(): int;

    /**
     * @return DomainEventInterface[]
     */
    public function popEvents(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }

    /**
     * @param DomainEventInterface $event
     */
    protected function append(DomainEventInterface $event): void
    {
        $this->events[] = $event;
    }
}