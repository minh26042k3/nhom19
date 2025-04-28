<?php

namespace App\Http\Controllers;
use App\Models\BaoTri;
use App\Models\ChiTietBaoTri;
use App\Models\NoiThat;

use Illuminate\Http\Request;
class BaotriController extends Controller
{
    public function index()
    {
        return response()->json(BaoTri::all());
    }

    public function show($SoHieuBT)
    {
        $ds = BaoTri::where('SoHieuBT', 'like', "%$SoHieuBT%")->get();
        if ($ds) {
            return response()->json($ds);
        }
        return response()->json([], 404);
    }

    public function store(Request $request)
    {
        $soHieuBT = BaoTri::where('SoHieuBT',$request->SoHieuBT)->first();
       
        if ($soHieuBT ) {
            return response()->json([], 404);
        }
        BaoTri::create($request->only(['SoHieuBT', 'GhiChu', 'PhiBT','NgayBaoTri']));
        return response()->json([], 200);
    }

    public function update(Request $request, string $SoHieuBT)
    {
        $bt = BaoTri::find($SoHieuBT);
        if (!$bt) {
            return response()->json([], 404);
        }
        $bt->update($request->all());
        return response()->json([], 200);
    }

    public function destroy(string $SoHieuBT)
    {
        if (!BaoTri::find($SoHieuBT)) {
            return response()->json([], 404);
        }
        BaoTri::destroy($SoHieuBT);
        ChiTietBaoTri::where('SoHieuBT',$SoHieuBT)->delete();
        return response()->json([], 200);
    }
}
