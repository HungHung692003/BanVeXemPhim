<?php

namespace App\Http\Controllers\API;

use App\Models\DanhSachTaiKhoan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\DangKyTaiKhoanRequest;
use App\Http\Requests\DeleteCustomerRequest;
use App\Http\Requests\DeletePhongChieuRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Jobs\SendMailJob;
use App\Mail\sendMail;
use App\Models\QuyenChucNang;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class APIDanhSachTaiKhoanController extends Controller
{

    public function search(Request $request) {
        $id_chuc_nang   =   19;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        //tim kiếm
        $data   = DanhSachTaiKhoan::Where('ho_va_ten', 'like', '%'. $request->tt. '%')
                                ->orWhere('email', 'like', '%'. $request->tt. '%')
                                ->get();
        //tim kiếm

        return response()->json([
            'xxx'    => $data,
        ]);
    }

    public function resetPassword(Request $request)
    {
        $taiKhoan   = DanhSachTaiKhoan::where('email', $request->email)->first();

        if($taiKhoan) {
            $taiKhoan->ma_doi_mat_khau  =   Str::uuid();
            $taiKhoan->save();

            $data['ho_va_ten']          =   $taiKhoan->ho_va_ten;
			$data['link']               =   'http://127.0.0.1:8000/doi-mat-khau/' . $taiKhoan->ma_doi_mat_khau;

            Mail::to($taiKhoan->email)->send(new sendMail('Khôi Phục Mật Khẩu', 'mail.quen_mat_khau', $data));

            return response()->json([
                'status'    => 1,
                'message'   => 'Vui lòng kiểm tra email của bạn!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Email không tồn tại!',
            ]);
        }
    }

    public function doiMatKhau(Request $request)
    {
        $taiKhoan   = DanhSachTaiKhoan::where('ma_doi_mat_khau', $request->id)->first();

        if($taiKhoan) {
            $taiKhoan->password         =   bcrypt($request->password);
            $taiKhoan->ma_doi_mat_khau  =   null;
            $taiKhoan->save();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã đổi mật khẩu thành công!',
            ]);

        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Liên kết không tồn tại!',
            ]);
        }
    }

    public function store(CreateCustomerRequest $request)
    {
        $id_chuc_nang   =   18;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {

            $data   = $request->all();

            DanhSachTaiKhoan::create($data);
            DB::commit();

            return response()->json([
                'status'    => true,
                'message'   => 'Đã thêm mới phim thành công!'
            ]);
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function update(UpdateCustomerRequest $request)
    {
        $id_chuc_nang   =   24;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {

            $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);
            if($danhSachTaiKhoan) {
                $data   = $request->all();
                $danhSachTaiKhoan->update($data);
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa phim thành công!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Phim không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function data()
    {
        $id_chuc_nang   =   19;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        $data   = DanhSachTaiKhoan::get();

        return response()->json([
            'xxx'    => $data,
        ]);
    }

    public function status(DeleteCustomerRequest $request)
    {
        $id_chuc_nang   =   20;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {

            $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);
            // dd($danhSachTaiKhoan);
            if($danhSachTaiKhoan) {
                if($danhSachTaiKhoan->tinh_trang == 1) {
                    $danhSachTaiKhoan->tinh_trang = 0;
                } else {
                    $danhSachTaiKhoan->tinh_trang = 1;
                }
                $danhSachTaiKhoan->save();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật trạng thái!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function block(Request $request)
    {
        $id_chuc_nang   =   21;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {

            $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);
            // dd($danhSachTaiKhoan);
            if($danhSachTaiKhoan) {
                if($danhSachTaiKhoan->is_block == 1) {
                    $danhSachTaiKhoan->is_block = 0;
                } else {
                    $danhSachTaiKhoan->is_block = 1;
                }
                $danhSachTaiKhoan->save();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật trạng thái!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function info(Request $request)
    {
        $id_chuc_nang   =   22;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {

            $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);
            if($danhSachTaiKhoan) {
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'data'      => $danhSachTaiKhoan
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function destroy(DeletePhongChieuRequest $request)
    {
        $id_chuc_nang   =   23;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {

            $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);

            if($danhSachTaiKhoan) {
                $danhSachTaiKhoan->delete();
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa tài khoản thành công!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function register(DangKyTaiKhoanRequest $request)
    {
        $data                   = $request->all();
        $data['is_block']       =   0;
        $data['tinh_trang']     =   0;
        $data['password']       = bcrypt($request->password);  // Gốc 123456 -> Lưu: e10adc3949ba59abbe56e057f20f883e
        $data['thay_the_id']    = Str::uuid();
        DanhSachTaiKhoan::create($data);

        $xxx['ho_va_ten']       =   $request->ho_va_ten;
        $xxx['link']            =   'http://127.0.0.1:8000/kich-hoat-tai-khoan/' . $data['thay_the_id'];

        // Mail::to($request->email)->send(new sendMail('Kích Hoạt Tài Khoản', 'mail.kich_hoat', $xxx));
        SendMailJob::dispatch($request->email, 'Kích Hoạt Tài Khoản', 'mail.kich_hoat', $xxx);

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã thêm mới tài khoản thành công!',
        ]);
    }

    public function login(Request $request)
    {
        $check  = Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password]);
        if($check == true) {
            // Sau khi đã qua attempt thì $check == true    => Laravel đã cấp session
            // Lấy thông tin của người dùng nào đã đăng nhập    => Auth->user();
            $user   =   Auth::guard('client')->user();
            // Kiểm tra người dùng này đã kích hoạt mail hay chưa?  Field   -> tinh_trang
            if($user->tinh_trang == false) {
                // Laravel thu hồi session lại
                Auth::guard('client')->logout();
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản chưa xác minh mail!',
                ]);
            } else {
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã đăng nhập thành công!',
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Tài khoản hoặc mật khẩu không đúng!',
            ]);
        }
        // $check      =   DanhSachTaiKhoan::where('email', $request->email)
        //                                 // ->where('password', $request->password)
        //                                 ->first();
        // $mk_luu     =   $check->password;
        // $mk_nhap    =   $request->password;

        // if($check && password_verify($mk_nhap, $mk_luu))  {
        //     // Ở đây nghĩa là ta check email và password nó giống ở database
        //     // Ta cần tạo 1 biến auth và giá trị và thông tin tài khoản của user vừa đăng nhập
        //     // Session::start();
        //     Session::put('auth', $check);
        //     return response()->json([
        //         'status'    => 1,
        //         'message'   => 'Đã đăng nhập thành công!',
        //     ]);
        // } else {
        //     return response()->json([
        //         'status'    => 0,
        //         'message'   => 'Tài khoản hoặc mật khẩu không đúng!',
        //     ]);
        // }
    }
}
