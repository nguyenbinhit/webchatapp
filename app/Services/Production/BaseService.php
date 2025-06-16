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
}
