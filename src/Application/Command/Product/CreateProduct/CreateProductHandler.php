<?php

declare(strict_types=1);

namespace App\Application\Command\Product\CreateProduct;

use App\Domain\Model\Product\Product;
use App\Domain\Model\Product\ProductRepositoryInterface;
use App\Shared\Application\Command\CommandHandlerInterface;

class CreateProductHandler implements CommandHandlerInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private ProductRepositoryInterface $productRepository;

    /**
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param CreateProductCommand $command
     */
    public function __invoke(CreateProductCommand $command): void
    {
        $product = new Product($command->getTitle(), $command->getDescription(), $command->getPrice());
        $this->productRepository->add($product);
    }
}