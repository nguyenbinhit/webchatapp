<?php

namespace App\Services;

use App\Services\BaseServiceInterface;

interface SettingContactServiceInterface extends BaseServiceInterface
{
    public function saveData(array $data): mixed;
}
