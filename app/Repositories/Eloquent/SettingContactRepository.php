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
}
