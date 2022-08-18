<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use App\Services\Api\BaseClientRequestService;
use Tests\TestCase;

class BaseClientRequestServiceTest extends TestCase
{
	protected $clientService;

	public function getClient()
	{
		$this->clientService = new BaseClientRequestService(env('URL_API_IBGE'));
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
