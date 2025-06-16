<?php

namespace App\Services;

use App\Services\BaseServiceInterface;

interface UserServiceInterface extends BaseServiceInterface
{
    /**
     * Login
     *
     * @param array $data
     * @return void|array|bool|\App\Models\User
     */
    public function login($data);
}
