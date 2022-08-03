<?php

namespace App\Traits;


trait QueryTrait
{
    public function getWhereFields($fields)
    {
        $where = [];

        foreach ($fields as $key => $value) {
            array_push($where, [$key, '=', $value]);
        }

        return $where;
    }

    public function getDataResponse($response)
    {
        return $response->getData();
    }
}
