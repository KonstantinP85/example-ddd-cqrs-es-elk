<?php

declare(strict_types=1);

namespace App\Application\Query\Product\GetProductById;

use App\Application\Query\Product\Dto\ProductDto;
use App\Domain\Model\Product\Product;
use App\Shared\Application\Query\QueryHandlerInterface;
use App\Shared\Domain\Exception\DataNotFoundException;
use Doctrine\ORM\EntityManagerInterface;

class GetProductByIdHandler implements QueryHandlerInterface
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
     * @param GetProductByIdQuery $query
     * @return ProductDto
     * @throws DataNotFoundException
     */
    public function __invoke(GetProductByIdQuery $query): ProductDto
    {
        $product = $this->em->find(Product::class, $query->getId());

        if ($product === null) {
            throw new DataNotFoundException('Product with id=' . $query->getId() . ' is not found');
        }

        return ProductDto::getDto($product);
    }
}