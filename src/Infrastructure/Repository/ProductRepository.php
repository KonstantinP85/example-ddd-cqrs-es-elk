<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Model\Product\Product;
use App\Domain\Model\Product\ProductRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param int $id
     * @return Product|null
     */
    public function find(int $id): ?Product
    {
        return $this->em->find(Product::class, $id);
    }

    /**
     * @param Product $product
     */
    public function add(Product $product): void
    {
        $this->em->persist($product);
        $this->em->flush();
    }

    public function update(): void
    {
        $this->em->flush();
    }
}