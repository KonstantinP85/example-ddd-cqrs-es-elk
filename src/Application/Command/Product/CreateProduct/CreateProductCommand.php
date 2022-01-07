<?php

declare(strict_types=1);

namespace App\Application\Command\Product\CreateProduct;

use App\Shared\Application\Command\CommandInterface;

class CreateProductCommand implements CommandInterface
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @var string
     */
    private string $description;

    /**
     * @var integer
     */
    private int $price;

    /**
     * @param string $title
     * @param string $description
     * @param int $price
     */
    public function __construct(string $title, string $description, int $price)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }
}