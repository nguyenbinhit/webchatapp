<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;

interface ClientRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Login
     *
     * @param array $data
     * @return void
     */
    public function login($data);
}
