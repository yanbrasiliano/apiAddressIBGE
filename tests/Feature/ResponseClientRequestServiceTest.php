<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use App\Services\Api\ResponseClientRequestService;
use Tests\TestCase;

class ResponseClientRequestServiceTest extends TestCase
{
	protected $clientService;

	public function getClient()
	{
		$this->clientService = new ResponseClientRequestService(env('URL_API_IBGE'));
	}

	public function test_api_get_request()
	{
		$this->getClient();

		$this->assertEquals(
			Response::HTTP_OK,
			$this->clientService->get('municipios')['status']
		);
	}
}
