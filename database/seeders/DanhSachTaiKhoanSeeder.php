<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhSachTaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {

            DB::table('danh_sach_tai_khoans')->delete();

            DB::table('danh_sach_tai_khoans')->truncate();

            DB::table('danh_sach_tai_khoans')->insert([
                [
                    'ho_va_ten'         =>"Admin",
                    'email'             =>"admin@master.com",
                    'password'          =>bcrypt(123456),
                    'so_dien_thoai'     =>"0333314445",
                    'ngay_sinh'         =>"2001-05-04",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Nguyễn Quốc Long",
                    'email'             =>"quoclongdng@gmail.com",
                    'password'          =>bcrypt(123456),
                    'so_dien_thoai'     =>"0412331132",
                    'ngay_sinh'         =>"2000-11-22",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Lê Thanh Trường",
                    'email'             =>"thanhtruong@gmail.com",
                    'password'          =>bcrypt(123456),
                    'so_dien_thoai'     =>"0413421322",
                    'ngay_sinh'         =>"2001-10-12",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Võ Đình Quốc Huy",
                    'email'             =>"vodinhquochuy@gmail.com",
                    'password'          =>bcrypt(123456),
                    'so_dien_thoai'     =>"0321313122",
                    'ngay_sinh'         =>"2001-03-12",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Phùng Văn Mạnh",
                    'email'             =>"phungvanmanh@gmail.com",
                    'password'          =>bcrypt(123456),
                    'so_dien_thoai'     =>"0931333312",
                    'ngay_sinh'         =>"2001-03-01",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Nguyễn Hoài Bảo",
                    'email'             =>"nguyenhoaibao02012004@gmail.com",
                    'password'          =>bcrypt(123456),
                    'so_dien_thoai'     =>"0352622128",
                    'ngay_sinh'         =>"2001-03-02",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Thái Đăng Duy",
                    'email'             =>"duythai090903@gmail.com",
                    'password'          =>bcrypt(123456),
                    'so_dien_thoai'     =>"0906544572",
                    'ngay_sinh'         =>"2001-03-03",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Lê Mạnh Hiền",
                    'email'             =>"hienlemanh2002@gmail.com",
                    'password'          =>bcrypt(123456),
                    'so_dien_thoai'     =>"0377191497",
                    'ngay_sinh'         =>"2001-03-04",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Hà Minh Hiếu",
                    'email'             =>"hmhieu42@gmail.com",
                    'password'          =>bcrypt(123456),
                    'so_dien_thoai'     =>"0974095458",
                    'ngay_sinh'         =>"2001-03-05",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Hà Đức Hòa",
                    'email'             =>"duchoa16092004@gmail.com",
                    'password'          =>bcrypt(123456),
                    'so_dien_thoai'     =>"1231231231",
                    'ngay_sinh'         =>"2001-03-06",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Đào Thu Thiên",
                    'email'             =>"daothuthien06021996@gmail.com",
                    'password'          =>bcrypt(123456),
                    'so_dien_thoai'     =>"1231231231",
                    'ngay_sinh'         =>"2001-03-07",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Lê Thị Thu Trinh",
                    'email'             =>"trinhcute287@gmail.com",
                    'password'          =>bcrypt(123456),
                    'so_dien_thoai'     =>"1231231231",
                    'ngay_sinh'         =>"2001-03-08",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Phạm Văn Tư",
                    'email'             =>"phamtu.090303@gmail.com",
                    'password'          =>bcrypt(123456),
                    'so_dien_thoai'     =>"0327238573",
                    'ngay_sinh'         =>"2001-03-09",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Tiêu Chấn Phi Hưng",
                    'email'             =>"tramtieu2890@gmail.com",
                    'password'          =>bcrypt(123456),
                    'so_dien_thoai'     =>"0903557228",
                    'ngay_sinh'         =>"2001-03-10",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Đặng Văn Phố",
                    'email'             =>"dangvanpho138@gmail.com",
                    'password'          =>bcrypt(123456),
                    'so_dien_thoai'     =>"0332174717",
                    'ngay_sinh'         =>"2001-03-11",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
            ]);
        }
    }
}
