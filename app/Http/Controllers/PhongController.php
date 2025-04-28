<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\NoiThat;
use App\Models\Phong;
use App\Models\SinhVien;
use Illuminate\Http\Request;

class PhongController extends Controller
{
    public function hienthiphong()
    {
        return Phong::orderByRaw('Tang ASC')
        ->orderByRaw('MaPhong ASC')
        ->get();
    }

    public function themphong(Request $request)
    {
        $phong = Phong::where('MaPhong',$request->MaPhong)->first();
        if($phong){
            return response()->json([],404);
        }
        $request['TrangThai'] = $request->SoLuongMax;
        Phong::create($request->all());  
        return response()->json($phong, 200); 
    }

    public function timphong(string $MaPhong)
    {
        $phong = Phong::where('MaPhong','like',"%$MaPhong%")
        ->orderByRaw('MaPhong ASC')
        ->get();
        if($phong){
            return response()->json($phong,200);
        }
        return response()->json([],404);
    }

    public function suaphong (Request $request, string $MaPhong)
    {
        $phong = Phong::where("MaPhong",$MaPhong)->first();
        $maphongold = $MaPhong;
        if($phong){
            if($maphongold != $request->MaPhong && $request->has('MaPhong')){
                SinhVien::where('MaPhong', $maphongold)->update(['MaPhong'=>$request->MaPhong]);
                NoiThat::where('MaPhong', $maphongold)->update(['MaPhong'=>$request->MaPhong]);
                HoaDon::where('MaPhong',$maphongold)->update(['MaPhong'=>$request->MaPhong]);
            }
            $phong->update($request->all());
            return response()->json([],200);
        }
        return response()->json([], 404);  
    }

    public function xoaphong(string $MaPhong)
    {
        $phong = Phong::where('MaPhong', $MaPhong)->first();
    
        if ($phong) {
            $phong->delete(); 
            return response()->json([],200);
        }
        return response()->json([], 404);
    }
}
