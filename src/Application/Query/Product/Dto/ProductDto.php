<?php

declare(strict_types=1);

namespace App\Application\Query\Product\Dto;

use App\Domain\Model\Product\Product;

class ProductDto
{
    /**
     * @var string
     */
    public string $id;

    /**
     * @var string
     */
    public string $title;

    /**
     * @var string
     */
    public string $description;

    /**
     * @var string
     */
    public string $price;

    /**
     * @var string
     */
    public string $createdTime;

    /**
     * @param Product $product
     * @return ProductDto
     */
    public static function getDto(Product $product): ProductDto
    {
        $dto = new ProductDto();
        $dto->setId((string)$product->getId());
        $dto->setTitle($product->getTitle());
        $dto->setDescription($product->getDescription());
        $dto->setPrice((string)$product->getPrice());
        $dto->setCreatedTime($product->getCreatedTime()->format('Y-m-d H:i:s'));

        return $dto;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string $price
     */
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    /**
     * @param string $createdTime
     */
    public function setCreatedTime(string $createdTime): void
    {
        $this->createdTime = $createdTime;
    }
}