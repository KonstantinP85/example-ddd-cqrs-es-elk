<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Shared\Domain\Model\DomainEventInterface;
use App\Shared\Infrastructure\Repository\ElasticSearchRepository;

class EventRepository extends ElasticSearchRepository
{
    private const EVENTS_INDEX = 'events';

    /**
     * @return string
     */
    protected function index(): string
    {
        return self::EVENTS_INDEX;
    }

    /**
     * @param DomainEventInterface $message
     * @return void
     */
    public function save(DomainEventInterface $message): void
    {
        $document = [
            'id' => rand(1,9000),
            'type' => get_class($message),
            'payload' => $message->toArray(),
            'recording_date' => (new \DateTime()),
        ];

        $this->add($document);
    }

    /**
     * @return array
     */
    public function getEvents(): array
    {
        $document = [];

        return $this->search($document);
    }
}