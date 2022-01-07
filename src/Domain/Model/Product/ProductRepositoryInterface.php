<?php

declare(strict_types=1);

namespace App\Domain\Model\Product;

interface ProductRepositoryInterface
{
    public function find(int $id): ?Product;

    public function add(Product $product): void;

    public function update(): void;
}