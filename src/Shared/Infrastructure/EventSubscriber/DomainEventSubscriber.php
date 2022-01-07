<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\EventSubscriber;

use App\Shared\Domain\Model\AggregateRoot;
use App\Shared\Infrastructure\Bus\MessengerEventBus;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Doctrine\ORM\Events;

class DomainEventSubscriber implements EventSubscriber
{
    /**
     * @var AggregateRoot[]
     */
    private array $entities = [];

    private MessengerEventBus $eventBus;

    public function __construct(MessengerEventBus $eventBus)
    {
        $this->eventBus = $eventBus;
    }

    public function getSubscribedEvents(): array
    {
        return [
            Events::postPersist,
            Events::postUpdate,
            Events::postRemove,
            Events::postFlush,
        ];
    }

    public function postPersist(LifecycleEventArgs $args): void
    {
        $this->keepAggregateRoots($args);
    }

    public function postUpdate(LifecycleEventArgs $args): void
    {
        $this->keepAggregateRoots($args);
    }

    public function postRemove(LifecycleEventArgs $args): void
    {
        $this->keepAggregateRoots($args);
    }

    /**
     * @param PostFlushEventArgs $args
     * @throws \Exception
     */
    public function postFlush(PostFlushEventArgs $args): void
    {
        foreach ($this->entities as $entity) {
            foreach ($entity->popEvents() as $event) {
                $this->eventBus->handle($event);
            }
        }
    }

    /**
     * @param LifecycleEventArgs $args
     */
    private function keepAggregateRoots(LifecycleEventArgs $args): void
    {
        $entity = $args->getEntity();

        if (!($entity instanceof AggregateRoot)) {
            return;
        }

        $this->entities[] = $entity;
    }
}