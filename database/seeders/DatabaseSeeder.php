<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Code;
use App\Models\ManagementMessage;
use App\Models\SettingContact;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('6%yT2f$E*)Fc+8Kr'),
        ]);

        User::factory()->create([
            'name' => 'Developer',
            'email' => 'developer@gmail.com',
            'password' => Hash::make('9%yT2f$E*)Fc+2Kr'),
        ]);

        Code::factory(10)->create();

        Client::factory(10)->create();

        ManagementMessage::factory(10)->create();

        SettingContact::factory(10)->create();
    }
}
