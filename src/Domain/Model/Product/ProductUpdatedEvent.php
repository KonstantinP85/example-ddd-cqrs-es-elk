<?php

declare(strict_types=1);

namespace App\Domain\Model\Product;

use App\Shared\Domain\Model\DomainEventInterface;

class ProductUpdatedEvent implements DomainEventInterface
{
    /**
     * @var Product
     */
    private Product $product;

    /**
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getProduct()->getId(),
            'title' => $this->getProduct()->getTitle(),
            'description' => $this->getProduct()->getDescription(),
            'price' => $this->getProduct()->getPrice(),
            'created_time' => $this->getProduct()->getCreatedTime(),
        ];
    }
}