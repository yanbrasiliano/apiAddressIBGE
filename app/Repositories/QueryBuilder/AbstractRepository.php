<?php

namespace App\Repositories\QueryBuilder;

use Illuminate\Support\Facades\DB;

abstract class AbstractRepository
{
    protected $table;

    public function __construct()
    {
        $this->table = $this->resolveTable();
    }

    public function resolveTable()
    {
        return DB::table(app($this->table)->getTable());
    }

    public function all()
    {
        return $this->table->get();
    }

    public function find(int $id)
    {
        return $this->table->find($id);
    }

    public function findWhere(array $fields)
    {
        return $this->table->where($fields)->get();
    }

    public function store(array $request)
    {
        return $this->table->insertGetId($request);
    }

    public function update(array $request, int $id)
    {
        return $this->table->where('id', $id)->update($request);
    }

    public function destroy(int $id)
    {
        return $this->table->where('id', $id)->delete();
    }
}
