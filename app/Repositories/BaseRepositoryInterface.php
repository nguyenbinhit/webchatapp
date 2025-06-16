<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface BaseRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAll(Request $request);

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $id
     * @return mixed
     */
    public function show($id);

    /**
     * @return mixed
     */
    public function count();
}
