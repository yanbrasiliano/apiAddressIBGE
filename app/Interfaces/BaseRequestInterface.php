<?php

namespace App\Interfaces;

interface BaseRequestInterface
{
    public static function loadServer($service_url);

    public function makeRequest();

    public function get($route = '');
}