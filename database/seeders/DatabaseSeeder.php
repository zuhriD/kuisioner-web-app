<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // make user roles admin and user
        \App\Models\Role::create([
            'role_name' => 'admin'
        ]);
        \App\Models\Role::create([
            'role_name' => 'user'
        ]);

        // make user admin
        \App\Models\User::create([
            'id' => 200,
            'name' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role_id' => 1 // admin
        ]);
    }
}
