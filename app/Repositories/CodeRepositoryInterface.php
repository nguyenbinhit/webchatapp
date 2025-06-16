<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;

interface CodeRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Get data by code.
     *
     * @param string $code
     * @return mixed
     */
    public function getByCode(string $code);
}
