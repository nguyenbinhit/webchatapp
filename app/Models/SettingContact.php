<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingContact extends Model
{
    use HasFactory;

    protected $table = 'setting_contact';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'title',
        'phone',
        'image_url',
        'main_account',
        'code',
        'code_id',
        'description',
        'key_word'
    ];
}
