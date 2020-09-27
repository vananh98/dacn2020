<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(example::class);
    }
}
class example extends Seeder
{
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('taikhoan')->insert([
            ['TenTK' => Str::random(3), 'MatKhau' => bcrypt('anhmv'), 'email' => Str::random(3) . '@gmail.com', 'Quyen' => 0],
            ['TenTK' => Str::random(3), 'MatKhau' => bcrypt('anhmv'), 'email' => Str::random(3) . '@gmail.com', 'Quyen' => 1],
            ['TenTK' => Str::random(3), 'MatKhau' => bcrypt('anhmv'), 'email' => Str::random(3) . '@gmail.com', 'Quyen' => 1],
            ['TenTK' => Str::random(3), 'MatKhau' => bcrypt('anhmv'), 'email' => Str::random(3) . '@gmail.com', 'Quyen' => 1],
            ['TenTK' => Str::random(3), 'MatKhau' => bcrypt('anhmv'), 'email' => Str::random(3) . '@gmail.com', 'Quyen' => 1],
            ['TenTK' => Str::random(3), 'MatKhau' => bcrypt('anhmv'), 'email' => Str::random(3) . '@gmail.com', 'Quyen' => 1]
        ]);
        // DB::table('producttype')->insert([
        //     ['name'=>'Máy tính'],
        //     ['name'=>'Máy ảnh'],
        //     ['name'=>'Điện thoại']
        // ]);
        // DB::table('brands')->insert([
        //     ['name'=>'Cannon'],
        //     ['name'=>'Samsung'],
        //     ['name'=>'LG']
        // ]);
        DB::table('sanpham')->insert([
            ['TenSP' => Str::random(5), 'Gia' => 150000, 'MaLoai' => 1, 'Hinh' => '03.png', 'SoLuong' => 10, 'FK_MaTH' => 1],
            ['TenSP' => Str::random(5), 'Gia' => 150000, 'MaLoai' => 2, 'Hinh' => '03.png', 'SoLuong' => 10, 'FK_MaTH' => 2],
            ['TenSP' => Str::random(5), 'Gia' => 150000, 'MaLoai' => 3, 'Hinh' => '03.png', 'SoLuong' => 10, 'FK_MaTH' => 3],
        ]);
    }
}
