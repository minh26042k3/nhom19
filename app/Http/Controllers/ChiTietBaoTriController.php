<?php

namespace App\Http\Controllers;

use App\Models\BaoTri;
use App\Models\ChiTietBaoTri;
use App\Models\NoiThat;
use Illuminate\Http\Request;

class ChiTietBaoTriController extends Controller
{
    public function index()
    {
        return response()->json(ChiTietBaoTri::all());
    }

    public function show($MaNT, $SoHieuBT)
    {
        $ds = ChiTietBaoTri::where('MaNT', 'like', "%$MaNT%")
        ->orWhere('SoHieuBT', 'like', "%$SoHieuBT%")
        ->get();
        if ($ds->isEmpty()) {
            return response()->json([], 404);
        }

        return response()->json($ds);
    }
    
  
}
