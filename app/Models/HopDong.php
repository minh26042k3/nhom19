<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HopDong extends Model
{
   protected $table = "hop_dong";
   protected $primaryKey = "MaHD";
   protected $keytype = 'string';
   protected $fillable = ['MaHD','NoiDung','NgayBatDau','NgayKetThuc','NgayLap','MaSV'];
   public $incrementing = false;
   public $timestamps = false;
}
