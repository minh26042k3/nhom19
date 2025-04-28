<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'Hoa_Don';
    protected $primaryKey = "Ma_HoaDon";
    protected $keyType = 'string';
    protected $fillable = ['Ma_HoaDon','Tien_Dien','TienNuoc','TienPhat','NgayLap','GhiChu','TrangThai','TienDaTra','MaPhong'];
    public $timestamps = false;
}
