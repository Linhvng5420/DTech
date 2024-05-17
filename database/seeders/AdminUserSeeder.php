<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@tdc.vn',
                'profile_image' => 'default_admin.png',
                'password' => Hash::make('1234'),
                'role' => 'admin',
            ],
            [
                'username' => 'admin1',
                'email' => 'admin1@tdc.vn',
                'profile_image' => 'default_admin.png',
                'password' => Hash::make('1234'),
                'role' => 'admin',
            ]
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
