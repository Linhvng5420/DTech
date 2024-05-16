<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brandNames = ['apple', 'asus', 'iphone', 'samsung', 'sony', 'xiaomi'];
        $colorOptions = ['Black', 'White', 'Blue', 'Red', 'Gray'];

        for ($i = 0; $i < 10; $i++) {
            $brand = $brandNames[array_rand($brandNames)];
            $color = $colorOptions[array_rand($colorOptions)];
            $price = rand(1000000, 5000000);

            DB::table('phone')->insert([
                'TenSP' => $brand .' '. $color .' '. $price,
                'HinhAnh' => 'phone_' . ($i + 1) . '.png',
                'MauSac' => $color,
                'Gia' => $price,
                'Ram' => mt_rand(4, 16),
                'Rom' => mt_rand(128, 1024),
                'MieuTa' => 'Mô tả cho Phone ' . $brand,
                'Hang' => $brand,
            ]);
        }
    }
}
