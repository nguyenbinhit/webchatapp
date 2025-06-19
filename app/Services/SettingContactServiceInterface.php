<?php

namespace App\Services;

use App\Services\BaseServiceInterface;

interface SettingContactServiceInterface extends BaseServiceInterface
{
    public function saveData(array $data): mixed;

    public function checkCode(string $code);
}
