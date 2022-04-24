<?php

use Illuminate\Database\Seeder;

use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::create([
            'ten_xe'        => 'Bugatti Chiron',
            'anh_xe'        => 'Bugatti_Chiron.png',
            'ma_hang_xe'    => 3,
            'so_luong'      => 10,
            'gia_thue_xe'   => '29000000',
            'so_cho_ngoi'   => 2,
            'tien_phat'     => '2000000',
            'mo_ta'         => 'Bugatti Chiron 2022 là mẫu xe tiếng tăm đến từ nước Pháp. Đa số các con xe của Bugatti đều tập trung chú trọng đến khả năng vận hành, hệ...'
        ]);

        Car::create([
            'ten_xe'        => 'Bugatti Veyron',
            'anh_xe'        => 'Bugatti-Veyron.png',
            'ma_hang_xe'    => 3,
            'so_luong'      => 10,
            'gia_thue_xe'   => '14000000',
            'so_cho_ngoi'   => 2,
            'tien_phat'     => '2000000',
            'mo_ta'         => 'Nhắc đến cái tên “ông hoàng tốc độ” thì không thể bỏ qua những con xe của hãng Bugatti đến từ nước Pháp. Không hề thua kém những thương hiệu...'
        ]);

        Car::create([
            'ten_xe'        => 'Chevrolet Corvette Stingray C8',
            'anh_xe'        => 'chevrolet-corvette-stingray-c8.png',
            'ma_hang_xe'    => 6,
            'so_luong'      => 10,
            'gia_thue_xe'   => '12000000',
            'so_cho_ngoi'   => 2,
            'tien_phat'     => '2000000',
            'mo_ta'         => 'Thế hệ mới Chevrolet Corvette Stingray C8 ra mắt lần đầu tiên tháng 7/2019 tại Mỹ và nhanh chóng nhận được sự chào đón của các tín đồ yêu...'
        ]);
    }
}
