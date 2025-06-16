<?php

namespace App\Services;

use Illuminate\Http\Request;

interface BaseServiceInterface
{
    /**
     * Get all records
     *
     * @param Request $request
     * @return mixed
     */
    public function getAll(Request $request);

    /**
     * Create a new record
     *
     * @param array $data
     * @return mixed
     */

    public function create(array $data);

    /**
     * Update an existing record
     *
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data, $id);

    /**
     * Delete a record
     *
     * @param mixed $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Show a specific record
     *
     * @param mixed $id
     * @return mixed
     */
    public function show($id);

    /**
     * Count the total number of records
     *
     * @return mixed
     */

    public function count();
}
