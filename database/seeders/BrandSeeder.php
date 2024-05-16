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
                'HinhAnh' => strtolower('apple') . '.png', // 'apple.png'
            ],
            [
                'TenHang' => 'asus',
                'HinhAnh' => strtolower('asus') . '.png', // 'asus.png'
            ],
            [
                'TenHang' => 'dell',
                'HinhAnh' => strtolower('dell') . '.png', // 'dell.png'
            ],
            [
                'TenHang' => 'hp',
                'HinhAnh' => strtolower('hp') . '.png', // 'hp.png'
            ],
            [
                'TenHang' => 'iphone',
                'HinhAnh' => strtolower('iphone') . '.png', // 'iphone.png'
            ],
            [
                'TenHang' => 'macbook',
                'HinhAnh' => strtolower('macbook') . '.png', // 'macbook.png'
            ],
            [
                'TenHang' => 'samsung',
                'HinhAnh' => strtolower('samsung') . '.png', // 'samsung.png'
            ],
            [
                'TenHang' => 'sony',
                'HinhAnh' => strtolower('sony') . '.png', // 'sony.png'
            ],
            [
                'TenHang' => 'xiaomi',
                'HinhAnh' => strtolower('xiaomi') . '.png', // 'xiaomi.png'
            ],
        ];

        foreach ($brands as $brand) {
            DB::table('brand')->insert($brand);
        }
    }
}
