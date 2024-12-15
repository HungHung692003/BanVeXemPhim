<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DanhSachTaiKhoanController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\DonViController;
use App\Http\Controllers\GheChieuController;
use App\Http\Controllers\LichChieuController;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\PhongChieuController;
use App\Http\Controllers\QuyenController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ThanhToanController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\TrangChuController;
use App\Models\DonHang;
use Illuminate\Support\Facades\Route;
use PHPUnit\Event\Code\TestCollection;

Route::get('/auto-thanh-toan', [ThanhToanController::class, 'index']);
Route::post('/send-mail', [TestController::class, 'SendMail']);
Route::get('/view-send-mail', [TestController::class, 'viewSendMail']);

Route::get('/create', [TestController::class, 'create']);
Route::get('/read', [TestController::class, 'read']);

// Route::get('/on-bai', [AdminController::class, 'onbai']);

Route::get('/', [TrangChuController::class, 'index']);
Route::get('/kich-hoat-tai-khoan/{id}', [DanhSachTaiKhoanController::class, 'kichHoat']);
Route::get('/reset-password', [DanhSachTaiKhoanController::class, 'resetPassword']);
Route::get('/doi-mat-khau/{id}', [DanhSachTaiKhoanController::class, 'doiMatKhau']);

Route::get('/register', [CustomerController::class, 'viewRegister']);
Route::get('/login', [CustomerController::class, 'viewLogin']);
Route::get('/logout', [CustomerController::class, 'logout']);
Route::get('/admin/login' , [AdminController::class , 'viewLogin']);
Route::get('/film-detail/{id}', [TrangChuController::class, 'detailPhim']);
Route::get('/forgot-password', [CustomerController::class, 'viewForgotPassword']);
Route::get('/change-password', [CustomerController::class, 'viewChangePassword']);
Route::get('/phim-dang-chieu', [TrangChuController::class, 'viewPhimDangChieu']);
Route::get('/phim-sap-chieu', [TrangChuController::class, 'viewPhimSapChieu']);
Route::get('/bai-viet', [TrangChuController::class, 'viewBaiViet']);
Route::get('/lien-he', [TrangChuController::class, 'viewLienHe']);
Route::get('/list-bill', [CustomerController::class, 'viewListBill'])->middleware('WebClient');

Route::group(['prefix'  =>  '/admin', 'middleware' => 'WebAdmin'], function() {
    Route::get('/', [AdminController::class, 'index']);
    // Quản Lý Phim
    Route::group(['prefix'  =>  '/phim'], function() {
        Route::get('/', [PhimController::class, 'index']);
        Route::get('/vue', [PhimController::class, 'indexVue']);
    });
    Route::group(['prefix'  =>  '/phong-chieu'], function() {
        Route::get('/', [PhongChieuController::class, 'index']);
        Route::get('/vue', [PhongChieuController::class, 'indexVue']);
    });
    Route::group(['prefix'  =>  '/danh-sach-tai-khoan'], function() {
        Route::get('/', [DanhSachTaiKhoanController::class, 'index']);
        Route::get('/vue', [DanhSachTaiKhoanController::class, 'indexVue']);
    });
    Route::group(['prefix'  =>  '/ghe-chieu'], function() {
        Route::get('/{id_phong}', [GheChieuController::class, 'index']);
    });
    Route::group(['prefix'  =>  '/dich-vu'], function() {
        Route::get('/', [DichVuController::class, 'index']);
    });
    Route::group(['prefix'  =>  '/don-vi'], function() {
        Route::get('/', [DonViController::class, 'index']);
    });
    Route::group(['prefix'  =>  '/lich-chieu'], function() {
        Route::get('/sap-chieu', [LichChieuController::class, 'index']);
        Route::get('/da-chieu', [LichChieuController::class, 'indexDaChieu']);
    });
    Route::group(['prefix'  =>  '/quyen'], function() {
        Route::get('/', [QuyenController::class, 'indexQuyen']);
    });
    Route::group(['prefix'  =>  '/don-hang'], function() {
        Route::get('/', [DonHangController::class, 'index']);
    });
    Route::group(['prefix'  =>  '/thong-ke'], function() {
        Route::get('/bt-1', [ThongKeController::class, 'bt1']);
        Route::get('/bt-2', [ThongKeController::class, 'bt2']);
        Route::get('/bt-3', [ThongKeController::class, 'bt3']);
        Route::get('/bt-4', [ThongKeController::class, 'bt4']);
        Route::get('/bt-5', [ThongKeController::class, 'bt5']);
    });

});
