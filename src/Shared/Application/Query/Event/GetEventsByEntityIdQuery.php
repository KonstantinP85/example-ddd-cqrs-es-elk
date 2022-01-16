<?php

declare(strict_types=1);

namespace App\Shared\Application\Query\Event;

use App\Shared\Application\Query\QueryInterface;

class GetEventsByEntityIdQuery implements QueryInterface
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $entityName;

    /**
     * @param int $id
     * @param string $entityName
     */
    public function __construct(int $id, string $entityName)
    {
        $this->id = $id;
        $this->entityName = $entityName;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEntityName(): string
    {
        return $this->entityName;
    }
}