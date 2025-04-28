<?php

namespace App\Http\Controllers;

use App\Models\HopDong;
use App\Models\Phong;
use App\Models\SinhVien;
use App\Models\YKien;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SinhVienVController extends Controller
{
    public function hienthisinhvien()
    {
        return SinhVien::orderBy('TenSV', 'asc')->get();
    }

    public function themsinhvien(Request $request)
    {
        $sinhvien = SinhVien::where('MaSV', $request->MaSV)->first();
        $phong = Phong::where('MaPhong',$request->MaPhong)->first();
        $slnow = SinhVien::where('MaPhong',$request->MaPhong)->count();
        if ($sinhvien) {
            return response()->json([], 404);
        }
        if(!$phong || $slnow == $phong->SoLuongMax){
            $request['MaPhong'] = 'PhongCho';
        }
        SinhVien::create($request->all());
        $phong = Phong::where('MaPhong',$request->MaPhong)->first();
        $slmax = $phong->SoLuongMax;
        $sl = SinhVien::where('MaPhong',$request->MaPhong)->count();
        $trong = $slmax - $sl;
        Phong::where('MaPhong',$request->MaPhong)->update(['trangthai'=>$trong]);
        return response()->json([], 200);
    }

    public function timsinhvien($MaSV)
    {
        $tontai = SinhVien::where('MaSV', 'like', "%$MaSV%")
        ->orderByRaw('MaSV ASC')
        ->get();
        if ($tontai->isNotEmpty()) {
            return response()->json($tontai, 200);
        }
        return response()->json([], 404);
    }


    public function suasinhvien(Request $request, $MaSV)
    {
        $sinhvien = SinhVien::where('MaSV', $MaSV)->first();
        $phong = Phong::where('MaPhong',$request->MaPhong)->first();
        $slnow = SinhVien::where('MaPhong',$request->MaPhong)->count();
        if ($sinhvien) { //xem sv chọn có tồn tại ko
            $sinhvienold = $sinhvien->MaSV; // lưu lại mã sv cũ
            
            if ($sinhvienold != $request->MaSV  && $request->has('MaSV')) {
                YKien::where('MaSV', $MaSV)->update(['MaSV' => $request->MaSV]);
                HopDong::where('MaSV', $MaSV)->update(['MaSV' => $request->MaSV]);
            }
            if(!$phong || $slnow == $phong->SoLuongMax){
                $request['MaPhong'] = 'PhongCho';
            }
            $sinhvien->update($request->all());
            $phong = Phong::where('MaPhong',$request->MaPhong)->first();
            $slmax = $phong->SoLuongMax;
            $sl = SinhVien::where('MaPhong',$request->MaPhong)->count();
            $trong = $slmax - $sl;
            Phong::where('MaPhong',$request->MaPhong)->update(['trangthai'=>$trong]);
            return response()->json([], 200);
        }
        return response()->json([], 400);
    }

    public function xoasinhvien($MaSV)
    {
        $sinhVien = SinhVien::where('MaSV', $MaSV)->first();
        $phong = Phong::where('MaPhong',$sinhVien->MaPhong)->first();
        if ($sinhVien) {
            $sinhVien->delete(); // Xóa sinh viên
            $sl = SinhVien::where('MaPhong',$phong->MaPhong)->count();
            $slmax = $phong->SoLuongMax;
            $trong = $slmax - $sl;
            Phong::where('MaPhong',$sinhVien->MaPhong)->update(['trangthai'=>$trong]);
            return response()->json([$sl,$slmax,$trong], 200);
        }
        return response()->json([], 404);
    }
}
