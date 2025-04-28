<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    protected $table = 'phong';
    protected $fillable = ['MaPhong','GiaPhong','TrangThai','Tang','SoLuongMax'];
    protected $primaryKey = 'MaPhong';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}