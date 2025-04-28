<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YKien extends Model
{
    protected $table = 'y_kien';
    protected $primaryKey = 'Ma_CH';
    protected $fillable = ['Ma_CH','NoiDung','TrangThai','CauTraLoi','MaSV'];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
