<?php

use App\Http\Controllers\PhongController;
use App\Http\Controllers\SinhVienVController;
use App\Http\Controllers\BaotriController;
use App\Http\Controllers\ChiTietBaoTriController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\HopDongController;
use App\Http\Controllers\NoithatController;
use App\Http\Controllers\YKienController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sinhvien',[SinhVienVController::class,"hienthisinhvien"]);
Route::get('/sinhvien/{MaSV}',[SinhVienVController::class,"timsinhvien"]);
Route::post('/sinhvien',[SinhVienVController::class,"themsinhvien"])->name('themsv')->withoutMiddleware([VerifyCsrfToken::class]);
Route::delete('/sinhvien/{MaSV}',[SinhVienVController::class,"xoasinhvien"])->name('xoasv')->withoutMiddleware([VerifyCsrfToken::class]);
Route::put('/sinhvien/{MaSV}',[SinhVienVController::class,"suasinhvien"])->name('suasv')->withoutMiddleware([VerifyCsrfToken::class]);

Route::get('/phong',[PhongController::class,"hienthiphong"]);
Route::get('/phong/{MaPhong}',[PhongController::class,"timphong"]);
Route::post('/phong',[PhongController::class,"themphong"])->name('themphong')->withoutMiddleware([VerifyCsrfToken::class]);
Route::delete('/phong/{MaPhong}',[PhongController::class,"xoaphong"])->name('xoaphong')->withoutMiddleware([VerifyCsrfToken::class]);
Route::put('/phong/{MaPhong}',[PhongController::class,"suaphong"])->name('suaphong')->withoutMiddleware([VerifyCsrfToken::class]);


Route::get('/baotri', [BaoTriController::class, 'index']);
Route::get('/baotri/{SoHieuBT}', [BaoTriController::class, 'show']);
Route::post('/baotri', [BaoTriController::class, 'store'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::put('/baotri/{SoHieuBT}', [BaoTriController::class, 'update'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::delete('/baotri/{SoHieuBT}', [BaoTriController::class, 'destroy'])->withoutMiddleware([VerifyCsrfToken::class]);

// NỘI THẤT
Route::get('/noithat', [NoiThatController::class, 'index']);
Route::get('/noithat/{MaNT}', [NoiThatController::class, 'show']);
Route::post('/noithat', [NoiThatController::class, 'store'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::put('/noithat/{MaNT}', [NoiThatController::class, 'update'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::delete('/noithat/{MaNT}', [NoiThatController::class, 'destroy'])->withoutMiddleware([VerifyCsrfToken::class]);

Route::get('/chitietbaotri', [ChiTietBaoTriController::class, 'index']);

Route::get('/ykien',[YKienController::class,'hienthiykien']);
Route::get('/ykien/{Ma_CH}',[YKienController::class,'timykien']);
Route::post('/ykien',[YKienController::class,'themykien'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::put('/ykien/{Ma_CH}',[YKienController::class,'suaykien'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::delete('/ykien/{Ma_CH}',[YKienController::class,'xoaykien'])->withoutMiddleware([VerifyCsrfToken::class]);

Route::get('/hopdong', [HopDongController::class, 'index']);   
Route::get('/hopdong/{id}', [HopDongController::class, 'show']);    
Route::post('/hopdong', [HopDongController::class, 'store'])->withoutMiddleware([VerifyCsrfToken::class]);  
Route::put('/hopdong/{id}', [HopDongController::class, 'update'])->withoutMiddleware([VerifyCsrfToken::class]);  
Route::delete('hopdong/{id}', [HopDongController::class, 'destroy'])->withoutMiddleware([VerifyCsrfToken::class]);

Route::post('/hoadon', [HoaDonController::class, 'store'])->withoutMiddleware([VerifyCsrfToken::class]); 
Route::put('/hoadon/{id}', [HoaDonController::class, 'update'])->withoutMiddleware([VerifyCsrfToken::class]); // Cập nhật hóa đơn
Route::delete('/hoadon/{id}', [HoaDonController::class, 'destroy'])->withoutMiddleware([VerifyCsrfToken::class]); // Xóa hóa đơn
Route::get('/hoadon', [HoaDonController::class, 'index']);
Route::get('/hoadon/{id}', [HoaDonController::class, 'show']); 