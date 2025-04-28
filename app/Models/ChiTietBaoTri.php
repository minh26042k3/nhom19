<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietBaoTri extends Model
{
    protected $table = 'chitietbaotri';
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = ['MaNT', 'SoHieuBT'];
    protected $fillable = ['MaNT', 'SoHieuBT'];

  
    
}
