<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;
    protected $table = 'sinh_vien';
    protected $primaryKey = 'MaSV';
    protected $fillable = ['MaSV','TenSV','NgaySinh','SDT','DiaChi','Pass','MaPhong'];
    public $incrementing = false; // Nếu MaSV không tự động tăng
    protected $keyType = 'string';
    public $timestamps = false;
}
