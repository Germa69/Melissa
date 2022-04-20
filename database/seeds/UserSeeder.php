<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('vi_VN');

        Admin::create([
            'ten'        => 'Nguyễn Vỹ Anh',
            'dia_chi'    => 'Hà Nội',
            'sdt'        => '0163248741',
            'avatar'     => 'anh1.jpg',
            'email'      => 'vyanh@gmail.com',
            'mat_khau'   => bcrypt('123'),
            'cap_do'     => 1
        ]);

        Admin::create([
            'ten'        => 'Nguyễn Đức Anh',
            'dia_chi'    => 'Hà Nội',
            'sdt'        => '01288032567',
            'avatar'     => 'anh2.jpg',
            'email'      => 'sin1208@gmail.com',
            'mat_khau'   => bcrypt('123'),
            'cap_do'     => 0
        ]);

        $limit = 3;
        $gender = $faker->randomElements(['male', 'female'])[0];

        for ($i = 0; $i < $limit; $i++) {
            Admin::create([
                'ten'      => $faker->firstName($gender) . ' ' . $faker->lastName($gender),
                'dia_chi'  => $faker->address,
                'sdt'      => $faker->unique()->phoneNumber,
                'avatar'   => $faker->image('public/uploads/avatar',640,480,null,false),
                'email'    => $faker->unique()->freeEmail,
                'mat_khau' => bcrypt('123'),
                'cap_do'   => 0
            ]);
        }
    }
}
