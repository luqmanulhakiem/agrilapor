<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('password');
        $data = [
            ['username' => 'admin', 'email' => 'admin@server.com', 'password' => $password, 'role' => 'admin' ],
            ['username' => 'user1', 'email' => 'user1@server.com', 'password' => $password, 'role' => 'user' ]
        ];

        User::insert($data);
    }
}
