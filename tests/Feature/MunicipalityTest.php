<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;


class MunicipalityTest extends TestCase
{
	use DatabaseMigrations;

	public function createMunicipality()
	{
		return \App\Models\Municipality::factory()->count(1)->create([
			'district' => 'Serrinha',
			'name' => 'Araci',
			'id_ibge' => '2902104',
			'id_city' => '29016'
		]);
	}

	public function test_get_all()
	{
		$municipality = $this->get('api/municipality');
		$municipality->assertStatus(200);
		$municipality->assertJsonStructure([
			'*' => [
				'district',
				'name',
				'id_ibge',
				'id_city',
				'created_at',
				'updated_at'
			]
		]);
	}

	public function test_fail_route_get_request_all_municipalities()
	{
		$municipality = $this->get('api/municipalities/1');
		$municipality->assertStatus(404);
	}

	public function test_get_request_by_id_municipalities()
	{
		$this->createMunicipality();

		$municipality = $this->get('api/municipality/1');
		$municipality->assertStatus(200);
	}

	public function test_post_request_create_municipalities()
	{
		$municipality = $this->post('api/municipality', [
			'district' => 'Serrinha',
			'name' => 'Araci',
			'id_ibge' => '2902104',
			'id_city' => '29016'
		]);

		$municipality->assertStatus(200);
	}

	public function test_post_update_municipalities()
	{
		$municipality = $this->put('api/municipality/1', [
			'name' => 'TestCase'
		]);

		$this->assertEquals(
			Response::HTTP_OK,
			$municipality->getStatusCode()
		);
	}

	public function test_delete_municipalities()
	{
		$this->createMunicipality();

		$municipality = $this->delete('api/municipality/1');

		$this->assertEquals(
			Response::HTTP_OK,
			$municipality->getStatusCode()
		);
	}
}
