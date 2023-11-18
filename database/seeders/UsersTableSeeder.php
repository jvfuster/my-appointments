<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jose Vicente',
            'email' => 'jose@gmail.com',
            'password' => bcrypt('12345678'),
            'dni' => '34826345',
            'address' => '',
            'phone' => '123333444',
            'role' => 'admin'
        ]);

        User::factory()->count(50)->create();
    }
}
