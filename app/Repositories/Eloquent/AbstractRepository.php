<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;


abstract class AbstractRepository
{
	protected $model;

	public function __construct(Model $model)
	{
		$this->model = $model;
	}

	public function all()
	{
		return $this->model->all();
	}

	public function find(int $id)
	{
		return $this->model->find($id);
	}

	public function store(array $attributes)
	{
		return $this->model->create($attributes);
	}

	public function update(array $attributes, int $id)
	{
		return $this->model->where('id', $id)->save($attributes);
	}

	public function destroy(int $id)
	{
		return $this->model->where('id', $id)->delete();
	}
}
