<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the CMS users.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['username' => 'admin'],
            [
                'nama' => '',
                'no_telp' => null,
                'alamat' => null,
                'role' => 'admin',
                'password' => 'asdfasdf',
                'google2fa_secret' => null,
                'google2fa_enabled' => false,
                'google2fa_enabled_at' => null,
            ],
        );
    }
}
