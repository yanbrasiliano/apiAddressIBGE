<?php

namespace App\Repositories\Contracts\QueryBuilder;

interface MunicipalityRepositoryInterface
{
    /**
     * Get all
     *
     * @method GET municipality
     * @access public
     */
    public function all();

    /**
     * Get municipality by ID
     *
     * @param int $id
     *
     * @method GET municipality/{id}
     * @access public
     */
    public function find(int $id);

    /**
     * Get municipality by fields
     *
     * @param array $fields
     *
     * @method POST municipality
     * @access public
     */
    public function findWhere(array $fields);

    /**
     * Post register
     *
     * @param array $request
     *
     * @method POST municipality
     * @access public
     */
    public function store(array $request);

    /**
     * Put update
     *
     * @param array $request
     * @param int $id
     *
     * @method PUT municipality/{id}
     * @access public
     */
    public function update(array $request, int $id);

    /**
     * DELETE item
     *
     * @param int $id
     *
     * @method DELETE municipality/{id}
     * @access public
     */
    public function destroy(int $id);
}
