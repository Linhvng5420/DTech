<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'TenHang' => 'apple',
            ],
            [
                'TenHang' => 'asus',
            ],
            [
                'TenHang' => 'dell',
            ],
            [
                'TenHang' => 'hp',
            ],
            [
                'TenHang' => 'iphone',
            ],
            [
                'TenHang' => 'macbook',
            ],
            [
                'TenHang' => 'samsung',
            ],
            [
                'TenHang' => 'sony',
            ],
            [
                'TenHang' => 'xiaomi',
            ],
        ];

        foreach ($brands as $brand) {
            DB::table('brand')->insert($brand);
        }
    }
}
