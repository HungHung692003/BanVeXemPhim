<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucNangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('chuc_nangs')->delete();

        DB::table('chuc_nangs')->truncate();

        DB::table('chuc_nangs')->insert([
            // [
            //     'id'                =>  100,
            //     'ten_chuc_nang'     =>  'Tạo Mới Phòng Chiếu',
            //     'ten_group'         =>  'Phòng Chiếu',
            // ],
            // [
            //     'id'                =>  101,
            //     'ten_chuc_nang'     =>  'Xem Thông Tin Phòng Chiếu',
            //     'ten_group'         =>  'Phòng Chiếu',
            // ],
            // [
            //     'id'                =>  102,
            //     'ten_chuc_nang'     =>  'Đổi Trạng Thái Phòng Chiếu',
            //     'ten_group'         =>  'Phòng Chiếu',
            // ],
            // [
            //     'id'                =>  103,
            //     'ten_chuc_nang'     =>  'Xem Chi Tiết Phòng Chiếu',
            //     'ten_group'         =>  'Phòng Chiếu',
            // ],
            // [
            //     'id'                =>  104,
            //     'ten_chuc_nang'     =>  'Xóa Phòng Chiếu',
            //     'ten_group'         =>  'Phòng Chiếu',
            // ],
            // [
            //     'id'                =>  105,
            //     'ten_chuc_nang'     =>  'Cập Nhật Phòng Chiếu',
            //     'ten_group'         =>  'Phòng Chiếu',
            // ],
            // [
            //     'id'                =>  106,
            //     'ten_chuc_nang'     =>  'Tạo Mới Tài Khoản Khách Hàng',
            //     'ten_group'         =>  'Tài Khoản Khách',
            // ],
            // [
            //     'id'                =>  107,
            //     'ten_chuc_nang'     =>  'Lấy Thông Tin Khách Hàng',
            //     'ten_group'         =>  'Tài Khoản Khách',
            // ],
            [
                'ten_chuc_nang'     =>  'Thêm Mới Admin',
                'ten_group'         =>  'Admin',
            ],
            [
                'ten_chuc_nang'     =>  'Xem Thông Tin Admin',
                'ten_group'         =>  'Admin',
            ],
            [
                'ten_chuc_nang'     =>  'Đổi Trạng Thái Admin',
                'ten_group'         =>  'Admin',
            ],
            [
                'ten_chuc_nang'     =>  'Cập Nhật Admin',
                'ten_group'         =>  'Admin',
            ],
            [
                'ten_chuc_nang'     =>  'Xóa Admin',
                'ten_group'         =>  'Admin',
            ],
            [
                'ten_chuc_nang'     =>  'Thêm Mới Phim',
                'ten_group'         =>  'Phim',
            ],
            [
                'ten_chuc_nang'     =>  'Xem Thông Tin Phim',
                'ten_group'         =>  'Phim',
            ],
            [
                'ten_chuc_nang'     =>  'Đổi Trạng Thái Phim',
                'ten_group'         =>  'Phim',
            ],
            [
                'ten_chuc_nang'     =>  'Xem Chi Tiết Phim',
                'ten_group'         =>  'Phim',
            ],
            [
                'ten_chuc_nang'     =>  'Xóa Phim',
                'ten_group'         =>  'Phim',
            ],
            [
                'ten_chuc_nang'     =>  'Cập Nhật Phim',
                'ten_group'         =>  'Phim',
            ],
            [
                'ten_chuc_nang'     =>  'Thêm Mới Phòng Chiếu',
                'ten_group'         =>  'Phòng Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Xem Thông Tin Phòng Chiếu',
                'ten_group'         =>  'Phòng Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Đổi Trạng Thái Phòng Chiếu',
                'ten_group'         =>  'Phòng Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Xem Chi Tiết Phòng Chiếu',
                'ten_group'         =>  'Phòng Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Xóa Phòng Chiếu',
                'ten_group'         =>  'Phòng Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Cập Nhật Phòng Chiếu',
                'ten_group'         =>  'Phòng Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Thêm Mới Tài Khoản Khách Hàng',
                'ten_group'         =>  'Tài Khoản Khách',
            ],
            [
                'ten_chuc_nang'     =>  'Lấy Thông Tin Khách Hàng',
                'ten_group'         =>  'Tài Khoản Khách',
            ],
            [
                'ten_chuc_nang'     =>  'Đổi Trạng Thái Khách Hàng',
                'ten_group'         =>  'Tài Khoản Khách',
            ],
            [
                'ten_chuc_nang'     =>  'Khóa Tài Khoản Khách Hàng',
                'ten_group'         =>  'Tài Khoản Khách',
            ],
            [
                'ten_chuc_nang'     =>  'Xem Chi Tiết Tài Khách Hàng',
                'ten_group'         =>  'Tài Khoản Khách',
            ],
            [
                'ten_chuc_nang'     =>  'Xóa Tài Khoản Khách Hàng',
                'ten_group'         =>  'Tài Khoản Khách',
            ],
            [
                'ten_chuc_nang'     =>  'Cập Nhật Tài Khoản Khách Hàng',
                'ten_group'         =>  'Tài Khoản Khách',
            ],
            [
                'ten_chuc_nang'     =>  'Thêm Mới Ghế Chiếu',
                'ten_group'         =>  'Ghế Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Xem Thông Tin Chi Tiết Ghế Chiếu',
                'ten_group'         =>  'Ghế Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Đổi Trạng Thái Ghế Chiếu',
                'ten_group'         =>  'Ghế Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Cập Nhật Ghế Chiếu',
                'ten_group'         =>  'Ghế Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Thêm Mới Dịch Vụ',
                'ten_group'         =>  'Dịch Vụ',
            ],
            [
                'ten_chuc_nang'     =>  'Xem Thông Tin Dịch Vụ',
                'ten_group'         =>  'Dịch Vụ',
            ],
            [
                'ten_chuc_nang'     =>  'Xóa Dịch Vụ',
                'ten_group'         =>  'Dịch Vụ',
            ],
            [
                'ten_chuc_nang'     =>  'Cập Nhật Dịch Vụ',
                'ten_group'         =>  'Dịch Vụ',
            ],
            [
                'ten_chuc_nang'     =>  'Đổi Trạng Thái Dịch Vụ',
                'ten_group'         =>  'Dịch Vụ',
            ],
            [
                'ten_chuc_nang'     =>  'Thêm Mới Đơn Vị',
                'ten_group'         =>  'Đơn Vị',
            ],
            [
                'ten_chuc_nang'     =>  'Xem Thông Tin Đơn Vị',
                'ten_group'         =>  'Đơn Vị',
            ],
            [
                'ten_chuc_nang'     =>  'Xóa Đơn Vị',
                'ten_group'         =>  'Đơn Vị',
            ],
            [
                'ten_chuc_nang'     =>  'Cập Nhật Đơn Vị',
                'ten_group'         =>  'Đơn Vị',
            ],
            [
                'ten_chuc_nang'     =>  'Thêm Mới Lịch Chiếu',
                'ten_group'         =>  'Lịch Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Cập Nhật Lịch Chiếu',
                'ten_group'         =>  'Lịch Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Xóa Lịch Chiếu',
                'ten_group'         =>  'Lịch Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Xem Thông Tin Lịch Chiếu',
                'ten_group'         =>  'Lịch Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Đổi Trạng Thái Lịch Chiếu',
                'ten_group'         =>  'Lịch Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Xem Chi Tiết Lịch Chiếu',
                'ten_group'         =>  'Lịch Chiếu',
            ],
            [
                'ten_chuc_nang'     =>  'Phân Quyền',
                'ten_group'         =>  'Phân Quyền',
            ],
        ]);
    }
}
