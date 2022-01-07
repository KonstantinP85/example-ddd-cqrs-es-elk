<?php

declare(strict_types=1);

namespace App\Application\Command\Product\UpdateProduct;

use App\Domain\Model\Product\ProductRepositoryInterface;
use App\Shared\Application\Command\CommandHandlerInterface;
use App\Shared\Domain\Exception\DataNotFoundException;

class UpdateProductHandler implements CommandHandlerInterface
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
     * @param UpdateProductCommand $command
     * @throws DataNotFoundException
     */
    public function __invoke(UpdateProductCommand $command): void
    {
        $product = $this->productRepository->find($command->getId());
        if ($product === null) {
            throw new DataNotFoundException('Product with id=' . $command->getId() . ' is not found');
        }

        $product->update($command->getTitle(), $command->getDescription(), $command->getPrice());
        $this->productRepository->update();
    }
}