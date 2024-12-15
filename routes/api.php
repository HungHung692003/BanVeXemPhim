<?php

use App\Http\Controllers\API\APIAdminComtroller;
use App\Http\Controllers\API\APIDichVuController;
use App\Http\Controllers\API\APIDanhSachTaiKhoanController;
use App\Http\Controllers\API\APIDonHangController;
use App\Http\Controllers\API\APIDonViController;
use App\Http\Controllers\API\APIGheChieuController;
use App\Http\Controllers\API\APIHomepageController;
use App\Http\Controllers\API\APILichChieuController;
use App\Http\Controllers\API\APIPhimController;
use App\Http\Controllers\API\APIPhongChieuController;
use App\Http\Controllers\API\APIQuyenController;
use App\Http\Controllers\API\APIThongKeController;
use App\Http\Controllers\API\APIVeXemPhimController;
use App\Http\Controllers\APISlideController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [APIDanhSachTaiKhoanController::class, 'register'])->name('register');
Route::post('/login', [APIDanhSachTaiKhoanController::class, 'login'])->name('login');
Route::post('/admin/login', [APIAdminComtroller::class, 'Adminlogin'])->name('adminLogin');
Route::post('/phim/phim-dang-chieu', [APIPhimController::class, 'phimDangChieu']);
Route::post('/phim/phim-sap-chieu', [APIPhimController::class, 'phimSapChieu']);
Route::get('/slide-hien-thi', [APISlideController::class, 'slideHienThi']);
Route::post('/getID/film-detail', [APIHomepageController::class, 'getIdFilmDetail'])->name('getIdFilmDetail');
Route::post('/danh-sach-lich-chieu-theo-film', [APILichChieuController::class, 'lichChieuTheoFilm'])->name('lichChieuTheoFilm');
Route::post('/doi-mat-khau', [APIDanhSachTaiKhoanController::class, 'doiMatKhau'])->name('doiMatKhau');
Route::post('/reset-password', [APIDanhSachTaiKhoanController::class, 'resetPassword'])->name('resetPassword');


Route::group(['prefix'  =>  '/client', 'middleware' => 'APIClient'], function() {
    Route::post('/lich-chieu/info', [APILichChieuController::class, 'infoLichClient'])->name('infoLichClient');
    Route::post('/dat-ve-xem-phim', [APIVeXemPhimController::class, 'datVeXemPhim'])->name('datVeXemPhim');
    Route::post('/get-list-bill', [APIVeXemPhimController::class, 'getListBill'])->name('dataBill');
    Route::post('/get-list-bill-detail', [APIVeXemPhimController::class, 'getListBillDetail'])->name('dataBillDetail');
});

Route::group(['prefix'  =>  '/admin', 'middleware' => 'APIAdmin'], function() {
    Route::post('/create', [APIAdminComtroller::class, 'store'])->name('adminStore');
    Route::post('/data', [APIAdminComtroller::class, 'data'])->name('adminData');
    Route::post('/del', [APIAdminComtroller::class, 'destroy'])->name('adminDel');
    Route::post('/update', [APIAdminComtroller::class, 'update'])->name('adminUpdate');
    Route::post('/block', [APIAdminComtroller::class, 'block'])->name('taiKhoanAdminBlock');

    // Quản Lý Phim
    Route::group(['prefix'  =>  '/phim'], function() {
        Route::post('/create', [APIPhimController::class, 'store'])->name('phimStore');
        Route::post('/data', [APIPhimController::class, 'data'])->name('phimData');
        Route::post('/status', [APIPhimController::class, 'status'])->name('phimStatus');
        Route::post('/info', [APIPhimController::class, 'info'])->name('phimInfo');
        Route::post('/del', [APIPhimController::class, 'destroy'])->name('phimDel');
        Route::post('/update', [APIPhimController::class, 'update'])->name('phimUpdate');

    });

    // Quản Lý Phòng Chiếu
    Route::group(['prefix'  =>  '/phong-chieu'], function() {
        Route::post('/create', [APIPhongChieuController::class, 'store'])->name('phongChieuStore');
        Route::post('/data', [APIPhongChieuController::class, 'data'])->name('phongChieuData');
        Route::post('/status', [APIPhongChieuController::class, 'status'])->name('phongStatus');
        Route::post('/info', [APIPhongChieuController::class, 'info'])->name('phongInfo');
        Route::post('/del', [APIPhongChieuController::class, 'destroy'])->name('phongDel');
        Route::post('/update', [APIPhongChieuController::class, 'update'])->name('phongUpdate');
    });

    Route::group(['prefix'  =>  '/danh-sach-tai-khoan'], function() {
        Route::post('/create', [APIDanhSachTaiKhoanController::class, 'store'])->name('taiKhoanStore');
        Route::post('/search', [APIDanhSachTaiKhoanController::class, 'search'])->name('taiKhoanSearch');
        Route::post('/data', [APIDanhSachTaiKhoanController::class, 'data'])->name('taiKhoanData');
        Route::post('/status', [APIDanhSachTaiKhoanController::class, 'status'])->name('taiKhoanStatus');
        Route::post('/block', [APIDanhSachTaiKhoanController::class, 'block'])->name('taiKhoanBlock');
        Route::post('/info', [APIDanhSachTaiKhoanController::class, 'info'])->name('taiKhoanInfo');
        Route::post('/del', [APIDanhSachTaiKhoanController::class, 'destroy'])->name('taiKhoanDel');
        Route::post('/update', [APIDanhSachTaiKhoanController::class, 'update'])->name('taiKhoanUpdate');
    });

    // Quản Lý Ghế Chiếu
    Route::group(['prefix'  =>  '/ghe-chieu'], function() {
        Route::post('/create', [APIGheChieuController::class, 'store'])->name('gheChieuStore');
        Route::post('/info', [APIGheChieuController::class, 'infoPhongGhe'])->name('infoPhongGhe');
        Route::post('/status', [APIGheChieuController::class, 'status'])->name('gheChieuStatus');
        Route::post('/update', [APIGheChieuController::class, 'update'])->name('gheChieuUpdate');
    });

    // Quản Lý Dịc Vụ
    Route::group(['prefix'  =>  '/dich-vu'], function() {
        Route::post('/create', [APIDichVuController::class, 'store'])->name('dichVuStore');
        Route::post('/data', [APIDichVuController::class, 'data'])->name('dichVuData');
        Route::post('/del', [APIDichVuController::class, 'destroy'])->name('dichVuDel');
        Route::post('/update', [APIDichVuController::class, 'update'])->name('dichVuUpdate');
        Route::post('/status', [APIDichVuController::class, 'status'])->name('dichVuStatus');
    });

    // Quản Lý Dịch Vụ
    Route::group(['prefix'  =>  '/don-vi'], function() {
        Route::post('/create', [APIDonViController::class, 'store'])->name('donViStore');
        Route::post('/data', [APIDonViController::class, 'data'])->name('donViData');
        Route::post('/del', [APIDonViController::class, 'destroy'])->name('donViDel');
        Route::post('/update', [APIDonViController::class, 'update'])->name('donViUpdate');
    });

    // Quản Lý Lịch Chiếu
    Route::group(['prefix'  =>  '/lich-chieu'], function() {
        Route::post('/create', [APILichChieuController::class, 'store'])->name('lichChieuStore');
        Route::post('/update', [APILichChieuController::class, 'update'])->name('lichChieuUpdate');
        Route::post('/delete', [APILichChieuController::class, 'destroy'])->name('lichChieuDelete');
        Route::post('/data', [APILichChieuController::class, 'data'])->name('lichChieuData');
        Route::post('/data-sap-chieu', [APILichChieuController::class, 'dataSapChieu'])->name('lichChieuDataSapChieu');
        Route::post('/data-da-chieu', [APILichChieuController::class, 'dataDaChieu'])->name('lichChieuDataDaChieu');
        Route::post('/status', [APILichChieuController::class, 'status'])->name('lichChieuStatus');
        Route::post('/info', [APILichChieuController::class, 'info'])->name('lichChieuInfo');
    });

    Route::group(['prefix'  =>  '/quyen'], function() {
        Route::post('/data-quyen', [APIQuyenController::class, 'dataQuyen'])->name('dataQuyen');
        Route::post('/data-chuc-nang', [APIQuyenController::class, 'dataChucNang'])->name('dataChucNang');
        Route::post('/create', [APIQuyenController::class, 'store'])->name('quyenStore');
        Route::post('/update', [APIQuyenController::class, 'update'])->name('quyenUpdate');
        Route::post('/delete', [APIQuyenController::class, 'destroy'])->name('quyenDelete');
        Route::post('/status', [APIQuyenController::class, 'status'])->name('quyenStatus');

        Route::post('/phan-quyen', [APIQuyenController::class, 'phanQuyen'])->name('phanQuyen');
    });

    Route::group(['prefix'  =>  '/thong-ke'], function() {
        Route::post('/bt-1', [APIThongKeController::class, 'bt1'])->name('bt1');
        Route::post('/bt-2', [APIThongKeController::class, 'bt2'])->name('bt2');
        Route::post('/bt-3', [APIThongKeController::class, 'bt3'])->name('bt3');
        Route::post('/bt-4', [APIThongKeController::class, 'bt4'])->name('bt4');
        Route::post('/bt-5', [APIThongKeController::class, 'bt5'])->name('bt5');
    });

    Route::group(['prefix'  =>  '/don-hang'], function() {
        Route::post('/data-don-hang', [APIDonHangController::class, 'dataDonHang'])->name('dataDonHang');
        Route::post('/data-chi-tiet-don-hang', [APIDonHangController::class, 'dataChiTietDonHang'])->name('dataChiTietDonHang');
    });
});
