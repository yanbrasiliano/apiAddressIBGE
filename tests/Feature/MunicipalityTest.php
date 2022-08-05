<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;

class MunicipalityTest extends TestCase
{
	use DatabaseMigrations;
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */


	public function createMunicipality()
	{
		return \App\Models\Municipality::factory()->count(1)->create([
			'id' 												=> '2',
			'district'                  => 'Teste',
			'name'                   	  => 'Teste',
			'id_city'                   => '2',
			'id_ibge'                   => '2',

		]);
	}


	public function test_get_request_all_municipalities()
	{
		$municipality = $this->json('GET', '/municipality');

		$municipality->response->assertStatus(200);
		$municipality->response->assertJsonStructure([
			'*' => [
				'id',
				'district',
				'name',
				'id_city',
				'id_ibge',
				'created_at',
				'updated_at'
			]
		]);
		$this->assertCount(1, $municipality);
	}
	public function test_post_request_all_municipalties()
	{
		$municipality = $this->json('GET', '/orgaos', ['name' => 'Salvador']);
		$municipality->response->assertStatus(200);
		$this->assertCount(1, $municipality);
	}

	public function test_fail_route_get_request_all_municipalities()
	{
		$municipality= $this->json('GET', '/municipalities/1');
		$municipality->response->assertStatus(404);
	}

	public function test_get_request_by_id_municipalities()
	{
		$this->createMunicipality();

		$municipality = $this->json('GET', '/municipality/1');
		$municipality->response->assertStatus(200);
	}

	public function test_post_request_create_municipalities()
	{
		$municipality = $this->json('POST', '/municipality', [
			'district' 										=> 'Teste',
			'name'                     		=> 'Teste',
			'id_city'                   	=> 1,
			'id_ibge'                     => 1

		]);
		$municipality->response->assertStatus(200);
	}
}
