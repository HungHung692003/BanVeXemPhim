<?php

namespace App\Http\Controllers;

use App\Models\DanhSachTaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DanhSachTaiKhoanController extends Controller
{
    public function resetPassword()
    {
        return view('client.password.forgot_password');
    }

    public function index()
    {
        return view('admin.page.list_tai_khoan.index');
    }

    public function indexVue()
    {
        return view('admin.page.list_tai_khoan.index_vue');
    }

    public function kichHoat($id)
    {
        $taiKhoan   = DanhSachTaiKhoan::where('thay_the_id', $id)->first();
        if($taiKhoan) {
            $taiKhoan->tinh_trang   =   1;
            $taiKhoan->thay_the_id  =   null;
            $taiKhoan->save();

            toastr()->success('Đã kích hoạt tài khoản thành công!');
            return redirect('/login');
        } else {
            toastr()->error("Tài khoản không tồn tại!");
            return redirect('/');
        }
    }

    public function doiMatKhau($id)
    {
        $taiKhoan   =   DanhSachTaiKhoan::where('ma_doi_mat_khau', $id)->first();
        if($taiKhoan) {
            return view('client.password.change_password', compact('id'));
        } else {
            toastr()->error('Liên kết không tồn tại!');
            return redirect('/');
        }
    }
}
