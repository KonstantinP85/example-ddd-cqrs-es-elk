<?php

declare(strict_types=1);

namespace App\Rest\Events\Action;

use App\Shared\Application\Query\Event\GetEventsByEntityIdQuery;
use App\Shared\Application\Query\QueryBusInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GetEventsByEntityId
{
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
    }

    /**
     * @Route("/events/{entity_name}/{id}", methods={"GET"}, requirements={"id": "\d+"}, name="api_get_events_by_entity_id")
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $entityName = $request->get('entity_name');
        $id = $request->get('id');
        $events = $this->queryBus->query(new GetEventsByEntityIdQuery(intval($id), $entityName));

        return new JsonResponse($events);
    }
}