<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EarphoneSeeder extends Seeder
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

            DB::table('earphone')->insert([
                'TenSP' => $brand . ' Earphone ' . $color,
                'HinhAnh' => null,
                'MauSac' => $color,
                'Gia' => $price,
                'MieuTa' => null,
                'Hang' => $brand,
            ]);
        }
    }
}
