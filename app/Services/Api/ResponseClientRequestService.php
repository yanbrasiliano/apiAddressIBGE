<?php

namespace App\Services\Api;

class ResponseClientRequestService extends BaseClientRequestService
{
	public function get($route = '')
	{
		$response = $this->client->get($this->server['url'] . $route);

		return [
			'status' => $response->getStatusCode(),
			'response' => $response->json(),
		];
	}
}
