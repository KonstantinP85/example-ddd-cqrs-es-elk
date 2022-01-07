<?php

declare(strict_types=1);

namespace App\Application\Query\Product\GetProductById;

use App\Shared\Application\Query\QueryInterface;

class GetProductByIdQuery implements QueryInterface
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}