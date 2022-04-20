<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('vi_VN');

        $gender = $faker->randomElements(['male', 'female'])[0];
        $randomId = $faker->randomElements([1, 2, 3, 4, 5])[0];
        $images = [
            'anh1.jpg',
            'anh2.jpg',
            'anh3.jpg',
            'anh4.jpg',
            'anh5.jpg',
            'anh6.jpg',
            'anh7.jpg',
            'anh8.jpg',
            'anh9.jpg',
            'anh10.jpg',
        ];

        for ($i = 0; $i < sizeof($images); $i++) {
            Customer::create([
                'ten'             => $faker->firstName($gender) . ' ' . $faker->lastName($gender),
                'anh_khach_hang'  => $images[$i],
                'email'           => $faker->unique()->freeEmail,
                'mat_khau'        => bcrypt('123'),
                'dia_chi'         => $faker->address,
                'so_CMND'         => '00' . $randomId . '' . $faker->numerify('#########'),
                'sdt'             => $faker->unique()->phoneNumber
            ]);
        }
    }
}
