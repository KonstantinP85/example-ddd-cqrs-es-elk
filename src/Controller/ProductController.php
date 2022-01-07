<?php

declare(strict_types=1);

namespace App\Controller;

use Elasticsearch\ClientBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(): JsonResponse
    {
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => 'my_index',
            'id'    => 'my_id',
            'body'  => ['testField' => 'abc']
        ];

        $response = $client->index($params);

        return new JsonResponse($response);
    }

    /**
     * @Route("/index/get_index/{id}", name="get_index")
     */
    public function getIndex(int $id): JsonResponse
    {
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => 'my_index',
            'id'    => $id
        ];

        $response = $client->get($params);

        return new JsonResponse($response);
    }

    /**
     * @Route("/index/search", name="search")
     */
    public function search(): JsonResponse
    {
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => 'my_index',
            'body'  => [
                //'query' => [
                //    'match' => [
                //        'msg' => 'I am from'
                //    ]
                //]
            ]
        ];

        $response = $client->search($params);

        return new JsonResponse($response);
    }

    /**
     * @Route("/index/create/{id}", name="create")
     */
    public function create(int $id): JsonResponse
    {
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => 'my_index',
            'id'    => $id,
            'body'  => [
                'id'      => $id,
                'user'    => 'Monster',
                'msg'     => 'I am from Russia.',
                'tstamp'  => '1238081389',
                'location'=> '41.12,-71.34'
            ]
        ];
        $response = $client->index($params);

        return new JsonResponse($response);
    }
}