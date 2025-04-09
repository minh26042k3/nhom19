<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoiThat extends Model
{ 
    protected $table = 'noi_that';
    protected $primaryKey = 'MaNT';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['MaNT', 'TenNT', 'MaPhong'];
    public function phong()
    {
        return $this->belongsTo(Phong::class, 'MaPhong', 'MaPhong');
    }

}
