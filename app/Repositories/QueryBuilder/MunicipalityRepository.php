<?php

namespace App\Repositories\QueryBuilder;

use App\Models\Municipality;
use App\Repositories\Contracts\QueryBuilder\MunicipalityRepositoryInterface;

class MunicipalityRepository extends AbstractRepository implements MunicipalityRepositoryInterface
{
    protected $table = Municipality::class;
}
