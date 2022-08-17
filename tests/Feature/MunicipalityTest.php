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

	public function newMunicipality()
	{
		return App\Models\Municipality::factory()->count(1)->create([
			'district' => 'Serrinha',
			'name' => 'Araci',
			'id_ibge' => '2902104',
			'id_city' => '29016'
		]);
	}

	public function testGetAll()
	{
		$municipality = $this->json('GET', '/municipality');
		dd($municipality);
		// $municipality->response->assertStatus(200);
		// $municipality->response->assertJsonStructure([
		// 	'*' => [
		// 		'district',
		// 		'name',
		// 		'id_ibge',
		// 		'id_city',
		// 		'created_at',
		// 		'updated_at'
		// 	]
		// ]);

		// $this->assertCount(1, $municipality);
	}
}
