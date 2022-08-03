<?php

namespace App\Repositories\Eloquent;

use App\Models\Municipality;
use App\Repositories\Contracts\Eloquent\MunicipalityRepositoryInterface;

class MunicipalityRepository extends AbstractRepository implements MunicipalityRepositoryInterface
{
    protected $model;

    public function __construct(Municipality $model)
    {
        $this->model = $model;
    }
}
