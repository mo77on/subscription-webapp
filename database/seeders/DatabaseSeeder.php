<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::create([
            'id' => 1,
            'name' => 'admin',
            'description' => 'admin',
        ]);

        \App\Models\Role::create([
            'id' => 2,
            'name' => 'subscriber',
            'description' => 'subscriber',
        ]);

        \App\Models\User::create([
            'name' => 'admin',
            'role_id' => 1,
            'email' => 'moncapada@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
    }
}
