<?php

namespace App\Services\Api;

use App\Interfaces\BaseRequestInterface;
use Illuminate\Support\Facades\Http;

class BaseClientRequestService implements BaseRequestInterface
{
    protected $server;
    protected $client;

    public function __construct($service_url)
    {
        $this->server = self::loadServer($service_url);
        $this->client = $this->makeRequest();
    }

    public static function loadServer($service_url): array
    {
        return [
            'url'     => $service_url,
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ];
    }

    public function makeRequest(): object
    {
        return Http::withHeaders($this->server['headers']);
    }

    public function get($route = '')
    {
        $response = $this->client->get($this->server['url'] . $route);

        return [
            'status' => $response->getStatusCode(),
            'response' => json_decode($response)
        ];
    }
}