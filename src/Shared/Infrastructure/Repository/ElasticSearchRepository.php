<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Repository;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;

abstract class ElasticSearchRepository
{
    /**
     * @var Client
     */
    private Client $client;

    public function __construct()
    {
        $this->client = ClientBuilder::create()->build();
    }

    abstract protected function index(): string;

    /**
     * @param array $document
     * @return array
     */
    protected function add(array $document): array
    {
        $query = [];

        $query['index'] = $this->index();
        $query['id'] = $document['id'] ?? null;
        $query['body'] = $document;

        return $this->client->index($query);
    }

    /**
     * @param array $document
     * @return array
     */
    protected function search(array $document): array
    {
        $query = [];

        $query['index'] = $this->index();
        $query['body'] = $document;

        return $this->client->search($query);
    }
}