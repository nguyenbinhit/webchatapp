<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;

interface SettingContactRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Check if the code exists.
     *
     * @param string $code
     * @return mixed
     */
    public function checkCode(string $code);
}
