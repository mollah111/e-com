<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banner = [
            [
                'banner_image' => 'banner1.png'
            ],
            [
                'banner_image' => 'banner2.png'
            ],
            [
                'banner_image' => 'banner3.png'
            ]
        ];

        Banner::insert($banner);
    }
}
