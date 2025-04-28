<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaoTri extends Model
{ 

    protected $table = 'baotri';
    protected $primaryKey = 'SoHieuBT';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['SoHieuBT', 'GhiChu', 'PhiBT','NgayBaoTri'];

}
