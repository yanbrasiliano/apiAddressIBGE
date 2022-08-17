<?php

namespace App\Repositories\QueryBuilder;

use App\Models\Municipality;
use App\Repositories\Contracts\QueryBuilder\MunicipalityRepositoryInterface;
use Illuminate\Support\Facades\DB;


class MunicipalityRepository extends AbstractRepository implements MunicipalityRepositoryInterface
{
	protected $table = Municipality::class;

	public function find($id)
	{
		return DB::table('municipality')
			->select('id_ibge')
			->where('id_ibge', $id)
			->get();
	}
}
