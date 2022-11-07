<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@cc.cc',
            'password' => 'admin',
            'is_admin' => TRUE
        ]);

        User::factory(10)->create();
    }
}