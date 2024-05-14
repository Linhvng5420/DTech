<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
<<<<<<< HEAD
=======
use http\Client\Curl\User;
>>>>>>> @Linh/0-DataBase-and-Seed
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
<<<<<<< HEAD
=======

        // Seed
        $this->call(AdminUserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(DesktopSeeder::class);
        $this->call(LaptopSeeder::class);
        $this->call(MouseSeeder::class);
        $this->call(PhoneSeeder::class);
        $this->call(ScreenSeeder::class);
>>>>>>> @Linh/0-DataBase-and-Seed
    }
}
