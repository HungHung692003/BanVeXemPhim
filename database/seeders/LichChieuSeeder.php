<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LichChieuSeeder extends Seeder
{
    public function run()
    {
        $currentDateTime = Carbon::now();

        DB::table('lich_chieus')->delete();
        DB::table('lich_chieus')->truncate();
        DB::table('lich_chieus')->insert([
            [
                'id_phim'       => 1,
                'id_phong'      => 1,
                'gio_bat_dau'   => Carbon::parse($currentDateTime->addDays(2))->format('Y-m-d') . " 18:00:00",
                'gio_ket_thuc'  => Carbon::parse($currentDateTime)->format('Y-m-d') . " 21:00:00",
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 1,
                'id_phong'      => 2,
                'gio_bat_dau'   => Carbon::parse($currentDateTime)->format('Y-m-d') . " 18:00:00",
                'gio_ket_thuc'  => Carbon::parse($currentDateTime)->format('Y-m-d') . " 21:00:00",
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 2,
                'id_phong'      => 1,
                'gio_bat_dau'   =>  Carbon::parse($currentDateTime->addDays(3))->format('Y-m-d') . " 10:00:00",
                'gio_ket_thuc'  =>  Carbon::parse($currentDateTime)->format('Y-m-d') . " 12:00:00",
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 2,
                'id_phong'      => 2,
                'gio_bat_dau'   =>  Carbon::parse($currentDateTime)->format('Y-m-d') . " 10:00:00",
                'gio_ket_thuc'  =>  Carbon::parse($currentDateTime)->format('Y-m-d') . " 12:00:00",
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 2,
                'id_phong'      => 3,
                'gio_bat_dau'   =>  Carbon::parse($currentDateTime)->format('Y-m-d') . " 10:00:00",
                'gio_ket_thuc'  =>  Carbon::parse($currentDateTime)->format('Y-m-d') . " 12:00:00",
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 3,
                'id_phong'      => 1,
                'gio_bat_dau'   =>  Carbon::parse($currentDateTime->addDays(4))->format('Y-m-d') . " 14:00:00",
                'gio_ket_thuc'  =>  Carbon::parse($currentDateTime)->format('Y-m-d') . " 16:00:00",
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 3,
                'id_phong'      => 2,
                'gio_bat_dau'   =>  Carbon::parse($currentDateTime)->format('Y-m-d') . " 14:00:00",
                'gio_ket_thuc'  =>  Carbon::parse($currentDateTime)->format('Y-m-d') . " 16:00:00",
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 3,
                'id_phong'      => 3,
                'gio_bat_dau'   =>  Carbon::parse($currentDateTime)->format('Y-m-d') . " 14:00:00",
                'gio_ket_thuc'  =>  Carbon::parse($currentDateTime)->format('Y-m-d') . " 16:00:00",
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 3,
                'id_phong'      => 4,
                'gio_bat_dau'   =>  Carbon::parse($currentDateTime)->format('Y-m-d') . " 14:00:00",
                'gio_ket_thuc'  =>  Carbon::parse($currentDateTime)->format('Y-m-d') . " 16:00:00",
                'trang_thai'    => 0,
            ],
        ]);
    }
}
