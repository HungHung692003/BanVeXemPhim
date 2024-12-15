<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DanhSachTaiKhoan extends Authenticatable
{
    use HasFactory;

    protected $table = 'danh_sach_tai_khoans';

    protected $fillable = [
        'email',
        'password',
        'so_dien_thoai',
        'ngay_sinh',
        'dia_chi',
        'ho_va_ten',
        'is_block',
        'tinh_trang',
        'thay_the_id',
        'ma_doi_mat_khau',
    ];
}
