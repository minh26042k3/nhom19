<?php

use App\Http\Controllers\PhongController;
use App\Http\Controllers\SinhVienVController;
use App\Http\Controllers\BaotriController;
use App\Http\Controllers\NoithatController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sinhvien',[SinhVienVController::class,"index"]);
Route::post('/sinhvien',[SinhVienVController::class,"store"])->name('themsv')->withoutMiddleware([VerifyCsrfToken::class]);
Route::delete('/sinhvien/{MaSV}',[SinhVienVController::class,"destroy"])->name('xoasv')->withoutMiddleware([VerifyCsrfToken::class]);
Route::put('/sinhvien/{MaSV}',[SinhVienVController::class,"update"])->name('suasv')->withoutMiddleware([VerifyCsrfToken::class]);
Route::get('/phong',[PhongController::class,"index"]);
Route::post('/phong',[PhongController::class,"store"])->name('themphong')->withoutMiddleware([VerifyCsrfToken::class]);
Route::delete('/phong/{MaPhong}',[PhongController::class,"destroy"])->name('xoaphong')->withoutMiddleware([VerifyCsrfToken::class]);
Route::put('/phong/{MaPhong}',[PhongController::class,"update"])->name('suaphong')->withoutMiddleware([VerifyCsrfToken::class]);


Route::get('/baotri', [BaotriController::class, 'index']);
Route::post('/baotri', [BaotriController::class, 'store'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::put('/baotri/{SoHieuBT}', [BaotriController::class, 'update'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::delete('/baotri/{SoHieuBT}', [BaotriController::class, 'destroy'])->withoutMiddleware([VerifyCsrfToken::class]);

// NỘI THẤT
Route::get('/noithat', [NoithatController::class, 'index']);
Route::post('/noithat', [NoithatController::class, 'store'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::put('/noithat/{MaNT}', [NoithatController::class, 'update'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::delete('/noithat/{MaNT}', [NoithatController::class, 'destroy'])->withoutMiddleware([VerifyCsrfToken::class]);