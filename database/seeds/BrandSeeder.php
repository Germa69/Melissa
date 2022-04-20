<?php

use Illuminate\Database\Seeder;

use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'ten_hang_xe'   => 'Porche',
            'logo'          => 'porche.png',
            'quoc_gia'      => 'Đức',
            'nam_thanh_lap' => 2007
        ]);

        Brand::create([
            'ten_hang_xe'   => 'Ford',
            'logo'          => 'ford.jpg',
            'quoc_gia'      => 'Hoa Kỳ',
            'nam_thanh_lap' => 1997
        ]);

        Brand::create([
            'ten_hang_xe'   => 'Bugatti',
            'logo'          => 'bugati.png',
            'quoc_gia'      => 'Pháp',
            'nam_thanh_lap' => 1909
        ]);

        Brand::create([
            'ten_hang_xe'  => 'Rolls Royce',
            'logo'         => 'rolls-royce.jpg',
            'quoc_gia'      => 'Vương Quốc Anh',
            'nam_thanh_lap' => 2013
        ]);

        Brand::create([
            'ten_hang_xe'  => 'Toyota',
            'logo'         => 'toyota.png',
            'quoc_gia'      => 'Nhật bản',
            'nam_thanh_lap' => 1995
        ]);

        Brand::create([
            'ten_hang_xe'  => 'Chevrolet',
            'logo'         => 'chevrolet.jpg',
            'quoc_gia'      => 'Hoa Kỳ',
            'nam_thanh_lap' => 2006
        ]);

        Brand::create([
            'ten_hang_xe'  => 'Mercedes Benz',
            'logo'         => 'mercedes.png',
            'quoc_gia'      => 'Đức',
            'nam_thanh_lap' => 1995
        ]);

        Brand::create([
            'ten_hang_xe'  => 'Vinfast',
            'logo'         => 'vinfast.jpg',
            'quoc_gia'      => 'Việt Nam',
            'nam_thanh_lap' => 2017
        ]);

        Brand::create([
            'ten_hang_xe'  => 'Lamborghini',
            'logo'         => 'lamborghini.png',
            'quoc_gia'      => 'Italy',
            'nam_thanh_lap' => 1963
        ]);
    }
}
