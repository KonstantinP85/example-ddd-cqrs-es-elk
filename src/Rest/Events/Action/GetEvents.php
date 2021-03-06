<?php

declare(strict_types=1);

namespace App\Rest\Events\Action;

use App\Shared\Application\Query\Event\GetEventsQuery;
use App\Shared\Application\Query\QueryBusInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GetEvents
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
     * @Route("/events", methods={"GET"}, requirements={"id": "\d+"}, name="api_get_events")
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {

        $events = $this->queryBus->query(new GetEventsQuery());

        return new JsonResponse($events);
    }
}