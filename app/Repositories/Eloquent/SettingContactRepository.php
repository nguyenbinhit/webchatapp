<?php

namespace App\Repositories\Eloquent;

use App\Models\SettingContact;
use App\Repositories\SettingContactRepositoryInterface;

class SettingContactRepository extends BaseRepository implements SettingContactRepositoryInterface
{
    public function getModel()
    {
        return new SettingContact();
    }

    /**
     * Check if the code exists.
     *
     * @param string $code
     * @return mixed
     */
    public function checkCode(string $code)
    {
        return $this->model->where('code', $code)->first();
    }
}
