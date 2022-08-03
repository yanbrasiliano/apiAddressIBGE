<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\QueryBuilder\MunicipalityRepository;
use App\Repositories\Contracts\QueryBuilder\MunicipalityRepositoryInterface;


use App\Repositories\Eloquent\MunicipalityRepository as EloquentMunicipalityRepository;
use App\Repositories\Contracts\Eloquent\MunicipalityRepositoryInterface as EloquentMunicipalityRepositoryInterface;


class RepositoryServiceProvider extends ServiceProvider
{

	/**
	 * Register any application services.
	 *
	 * @return void
	 */


	public function register()
	{
		//QueryBuilder
		$this->app->bind(MunicipalityRepositoryInterface::class, MunicipalityRepository::class);

		//Eloquent
		$this->app->bind(EloquentMunicipalityRepositoryInterface::class, EloquentMunicipalityRepository::class);

	}
}
