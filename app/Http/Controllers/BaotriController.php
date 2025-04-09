<?php

namespace App\Http\Controllers;
use App\Models\BaoTri;

use Illuminate\Http\Request;

class BaotriController extends Controller
{
    public function index()
    {
        $baotri = BaoTri::all();
        return response()->json($baotri);
    }

    public function store(Request $request)
    {
        $request->validate([
            'SoHieuBT' => 'required',
            'TenLoaiBaoTri' => 'required',
            'PhiBT' => 'required|numeric'
        ]);

        $baotri = BaoTri::create($request->all());
        return response()->json($baotri, 201);
    }

    public function update(Request $request, $SoHieuBT)
    {
        $request->validate([
            'TenLoaiBaoTri' => 'required',
            'PhiBT' => 'required|numeric'
        ]);

        $baotri = BaoTri::findOrFail($SoHieuBT);
        $baotri->update($request->all());

        return response()->json($baotri);
    }

    public function destroy($SoHieuBT)
    {
        $baotri = Baotri::findOrFail($SoHieuBT);
        $baotri->delete();

        return response()->json(['message' => 'Xóa bảo trì thành công']);
    }
}
