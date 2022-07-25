<?php

namespace App\Service;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class callApi
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getVideo(): array
    {
        $response = $this->client->request(
            'GET',
            'http://localhost:7102/api/video_for_cvs'
        );
    return $response->toArray();
    }
}