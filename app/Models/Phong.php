<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    protected $table = 'phong';
    protected $fillable = ['MaPhong','SoLuongMax'];
    public $incrementing = false;
    protected $primaryKey = 'MaPhong';
    protected $keyType = 'string';
    public $timestamps = false;
}