<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin Satu',
                'level' => 'admin',
                'email' => 'admin1@example.com',
                'phone' => '081112223',
                'password' => bcrypt('12345'),
                'remember_token' => Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        User::insert($user);
    }
}
