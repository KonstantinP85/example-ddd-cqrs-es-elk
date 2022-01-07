<?php

declare(strict_types=1);

namespace App\Shared\Domain\Model;

interface DomainEventInterface
{
    public function toArray(): array;
}