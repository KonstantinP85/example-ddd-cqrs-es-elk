<?php

declare(strict_types=1);

namespace App\Rest\Product\Action;

use App\Application\Query\Product\GetProductById\GetProductByIdQuery;
use App\Shared\Application\Query\QueryBusInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class GetProductById
{
    /**
     * @var Serializer
     */
    private Serializer $serializer;

    /**
     * @var QueryBusInterface
     */
    private QueryBusInterface $queryBus;

    /**
     * @param QueryBusInterface $queryBus
     */
    public function __construct(QueryBusInterface $queryBus)
    {
        $this->queryBus = $queryBus;
        $this->serializer = new Serializer([new ObjectNormalizer()]);
    }

    /**
     * @Route("/product/{id}", methods={"GET"}, requirements={"id": "\d+"}, name="api_get_product")
     * @param Request $request
     * @return JsonResponse
     * @throws ExceptionInterface
     */
    public function __invoke(Request $request): JsonResponse
    {
        $id = $request->get('id');

        $product = $this->queryBus->query(new GetProductByIdQuery(intval($id)));

        return new JsonResponse(
            $this->serializer->normalize(
                $product,
                null,
                [AbstractNormalizer::ATTRIBUTES => ['id', 'title', 'description', 'price', 'createdTime']]),
        );
    }
}