<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use http\Client\Curl\User;
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


        // Seed
        $this->call(AdminUserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(DesktopSeeder::class);
        $this->call(LaptopSeeder::class);
        $this->call(MouseSeeder::class);
        $this->call(PhoneSeeder::class);
        $this->call(ScreenSeeder::class);
        $this->call(EarphoneSeeder::class);
    }
}
