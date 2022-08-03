<?php

namespace App\Services\Repositories;

use App\Repositories\Contracts\QueryBuilder\MunicipalityRepositoryInterface as QueryBuilderInterface;
use App\Repositories\Contracts\Eloquent\MunicipalityRepositoryInterface as EloquentInterface;

use App\Traits\RestResponseTrait;
use App\Traits\QueryTrait;


use Illuminate\Support\Facades\DB;

class MunicipalityService implements QueryBuilderInterface, EloquentInterface
{
	use RestResponseTrait;
	use QueryTrait;

	protected $queryBuilder;
	protected $eloquent;

	public function __construct(QueryBuilderInterface $queryBuilder, EloquentInterface $eloquent)
	{
		$this->queryBuilder = $queryBuilder;
		$this->eloquent = $eloquent;
	}

	public function all()
	{
		return $this->successResponse($this->queryBuilder->all());
	}

	public function find(int $id)
	{
		return $this->successResponse($this->queryBuilder->find($id));
	}

	public function findWhere(array $fields)
	{
		return $this->successResponse($this->queryBuilder->findWhere($this->getWhereFields($fields)));
	}

	public function store(array $request)
	{

		try {
			DB::beginTransaction();
			$this->eloquent->store($request);
			DB::commit();

			return $this->successResponse("Successfully registered municipality.");
		} catch (\Exception $e) {
			DB::rollback();
			return $this->errorResponse($e->getMessage(), "Error while trying to register municipality.");
		}
	}

	public function update(array $request, int $id)
	{
		try {
			DB::beginTransaction();
			$request['updated_at'] = date("Y-m-d H:i:s", strtotime('now'));
			if ($this->queryBuilder->update($request, $id)) {
				$message = "Successfully update municipality.";
			} else {
				$message = "The municipality that you tried to update does not exist.";
			}
			DB::commit();

			return $this->successResponse($message);
		} catch (\Exception $e) {
			DB::rollback();
			return $this->errorResponse($e->getMessage(), "Error while trying to update municipality.");
		}
	}

	public function destroy(int $id)
	{
		try {
			DB::beginTransaction();
			if ($this->queryBuilder->destroy($id)) {
				$message = "Municipality deleted successfully";
			} else {
				$message = "The municipality that you tried to deleted does not exist.";
			}
			DB::commit();

			return $this->successResponse($message);
		} catch (\Exception $e) {
			DB::rollback();
			return $this->errorResponse($e->getMessage(), "Error while trying to deleted municipality.");
		}
	}
}
