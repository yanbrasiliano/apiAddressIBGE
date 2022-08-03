<?php

namespace App\Repositories\Contracts\Eloquent;


interface MunicipalityRepositoryInterface
{

	/**
	 * Get all municipality
	 *
	 * @method  GET
	 * @access  public
	 */
	public function all();

	/**
	 * Get municipality by ID
	 *
	 * @param   int     $id
	 *
	 * @method  GET servico/{id}
	 * @access  public
	 */
	public function find(int $id);

	/**
	 * Post register municipality
	 *
	 * @param   array     $request
	 *
	 * @method  POST servico
	 * @access  public
	 */
	public function store(array $request);

	/**
	 * Put update municipality
	 *
	 * @param   array $request
	 * @param   int   $id
	 *
	 * @method  PUT municipality/{id}
	 * @access  public
	 */
	public function update(array $request, int $id);

	/**
	 * DELETE municipality
	 *
	 * @param   int   $id
	 *
	 * @method  DELETE municipality/{id}
	 * @access  public
	 */
	public function destroy(int $id);


}
