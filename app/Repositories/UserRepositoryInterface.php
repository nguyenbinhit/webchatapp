<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Login
     *
     * @param array $data
     * @return void
     */
    public function login($data);
}
