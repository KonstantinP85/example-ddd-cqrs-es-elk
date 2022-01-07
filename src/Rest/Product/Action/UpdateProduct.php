<?php

declare(strict_types=1);

namespace App\Rest\Product\Action;

use App\Application\Command\Product\UpdateProduct\UpdateProductCommand;
use App\Rest\CommandAction;
use App\Shared\Application\Command\CommandBusInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UpdateProduct extends CommandAction
{
    /**
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct($commandBus);
    }

    /**
     * @Route("/product/{id}", methods={"PUT"}, name="api_product_update")
     * @param Request $request
     * @return JsonResponse
     * @throws \Throwable
     */
    public function __invoke(Request $request): JsonResponse
    {
        $id = $request->get('id');
        $body = json_decode($request->getContent(), true);
        $command = new UpdateProductCommand(
            intval($id),
            $body['title'],
            $body['description'],
            intval($body['price']),
        );

        $this->handle($command);

        return new JsonResponse();
    }
}