<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhanQuyenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('phan_quyens')->delete();
        DB::table('phan_quyens')->truncate();
        DB::table('phan_quyens')->insert([
            [
                'ten_quyen'     => 'Kế Toán',
		        'tinh_trang'    => 1,
            ],
            [
                'ten_quyen'     => 'Nhân Viên',
		        'tinh_trang'    => 1,
            ],
        ]);
    }
}
