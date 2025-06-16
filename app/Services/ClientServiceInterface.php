<?php

namespace App\Services;

use App\Services\BaseServiceInterface;

interface ClientServiceInterface extends BaseServiceInterface
{
    /**
     * Login
     *
     * @param array $data
     * @return void|bool|\App\Models\Client
     */
    public function login($data);
}
