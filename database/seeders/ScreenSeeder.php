<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScreenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brandNames = ['apple', 'asus', 'dell', 'hp', 'iphone', 'macbook', 'samsung', 'sony', 'xiaomi'];
        $colorOptions = ['Black', 'White', 'Blue', 'Red', 'Gray'];

        for ($i = 0; $i < 10; $i++) {
            $brand = $brandNames[array_rand($brandNames)];
            $color = $colorOptions[array_rand($colorOptions)];
            $price = rand(1000000, 5000000);

            DB::table('screen')->insert([
                'TenSP' => 'Man Hinh ' . $brand .' '. $color .' '. $price,
                'HinhAnh' => 'screen_' . ($i + 1) . '.png',
                'MauSac' => $color,
                'Gia' => $price,
                'MieuTa' => 'Mô tả cho Screen ' . $brand,
                'Hang' => $brand,
            ]);
        }
    }
}
