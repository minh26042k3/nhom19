<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use App\Models\YKien;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class YKienController extends Controller
{
    public function hienthiykien()
    {
        return YKien::orderByRaw('TrangThai = "chưa duyệt" DESC')
            ->orderByRaw('CAST(SUBSTRING(Ma_CH,3) as UNSIGNED) ASC')
            ->get();
    }


    public function themykien(Request $request)
    {
        $max = YKien::count();
        $sinhvien = SinhVien::where('MaSV', $request->MaSV)->exists();
        if ($sinhvien) {
            for ($dem = 1; $dem <= $max + 1; $dem++) {
                $mach = "CH" . $dem;
                if (YKien::where('Ma_CH', $mach)->exists() == false) {
                    $ykien = $request->all();
                    $ykien['Ma_CH'] = $mach;
                    $ykien = YKien::create($ykien);
                    return response()->json([], 200);
                }
            }
        } else {
            return response()->json([], 404);
        }
    }

    public function timykien(string $Ma_CH)
    {
        $tontai = YKien::where('Ma_CH', 'like', "%$Ma_CH%")
            ->orderByRaw('CAST(SUBSTRING(Ma_CH,3) as UNSIGNED) ASC')
            ->get();
        if ($tontai->isNotEmpty()) {
            return response()->json($tontai, 200);
        }
        return response()->json([], 400);
    }


    public function suaykien(Request $request, string $Ma_CH)
    {
        $tontai = Ykien::where("Ma_CH", $request->Ma_CH)->first();
        if ($tontai) {
            if (trim($request->CauTraLoi) != "" || trim($request->CauTraLoi) != null || trim($request->CauTraLoi) != "null") {
                $request['TrangThai'] = "Đã duyệt";
            } else {
                $request['TrangThai'] = "Chưa duyệt";
            }
            $tontai->update($request->all());
            return response()->json([], 200);
        }
        return response()->json([], 404);
    }

    public function xoaykien(string $Ma_CH)
    {
        $tontai = Ykien::where('Ma_CH', $Ma_CH)->exists();
        if ($tontai) {
            YKien::delete();
            return response()->json([], 200);
        }
        return response()->json([], 404);
    }
}
