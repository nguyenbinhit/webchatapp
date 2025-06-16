<?php

namespace App\Services\Production;

use App\Services\BaseServiceInterface;
use Illuminate\Http\Request;

class BaseService implements BaseServiceInterface
{
    /**
     * Get all records
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function getAll(Request $request)
    {
        return [];
    }

    /**
     * Create a new record
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return null;
    }

    /**
     * Update an existing record
     *
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return null;
    }

    /**
     * Delete a record
     *
     * @param mixed $id
     * @return mixed
     */
    public function delete($id)
    {
        return null;
    }

    /**
     * Show a specific record
     *
     * @param mixed $id
     * @return mixed
     */
    public function show($id)
    {
        return null;
    }

    /**
     * Count the total number of records
     *
     * @return mixed
     */
    public function count()
    {
        return 0;
    }
}
