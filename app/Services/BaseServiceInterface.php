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
}
