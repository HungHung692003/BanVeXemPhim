<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\DeleteAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\QuyenChucNang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIAdminComtroller extends Controller
{
    public function Adminlogin(Request $request)
    {
        $check  = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);
        if($check == true) {
            $admin = Admin::where('email', $request->email)
                          ->where('is_block', 0)
                          ->first();
            if($admin) {
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã đăng nhập thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản đã bị khóa!',
                ]);
            }

        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Tài khoản hoặc mật khẩu không đúng!',
            ]);
        }
    }

	public function store(CreateAdminRequest $request)
    {
        $id_chuc_nang   =   1;
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
            $data['password'] = bcrypt($data['password']);
            Admin::create($data);
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

    public function update(UpdateAdminRequest $request)
    {
        $id_chuc_nang   =   4;
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
            $admin   = Admin::find($request->id);
            if($admin) {
                $data   = $request->all();
                $data['password'] = bcrypt($data['password']);
                $admin->update($data);
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
        $id_chuc_nang   =   2;
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

        $data   = Admin::leftjoin('phan_quyens', 'admins.id_quyen', 'phan_quyens.id')
                       ->select('admins.*', 'phan_quyens.ten_quyen')
                       ->get();

        return response()->json([
            'data'    => $data,
        ]);
    }

    public function destroy(DeleteAdminRequest $request)
    {
        $id_chuc_nang   =   5;
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
            $admin   = Admin::find($request->id);

            if($admin) {
                $admin->delete();
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

    public function block(Request $request)
    {
        $id_chuc_nang   =   2;
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
            $admin   = Admin::find($request->id);
            // dd($admin);
            if($admin) {
                if($admin->is_block == 1) {
                    $admin->is_block = 0;
                } else {
                    $admin->is_block = 1;
                }
                $admin->save();
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
}
