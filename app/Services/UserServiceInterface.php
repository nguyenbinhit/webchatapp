<?php

namespace App\Services;

use App\Services\BaseServiceInterface;

interface UserServiceInterface extends BaseServiceInterface
{
    /**
     * Login
     *
     * @param array $data
     * @return void
     */
    public function login($data);
}
