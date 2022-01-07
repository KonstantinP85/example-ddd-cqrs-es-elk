<?php

declare(strict_types=1);

namespace App\Application\Command\Product\UpdateProduct;

use App\Shared\Application\Command\CommandInterface;

class UpdateProductCommand implements CommandInterface
{
    /**
     * @var int
     */
    private int $id;

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
     * @param int $id
     * @param string $title
     * @param string $description
     * @param int $price
     */
    public function __construct(int $id, string $title, string $description, int $price)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
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