<?php

namespace App\Http\Controllers;
use App\Models\NoiThat;

use Illuminate\Http\Request;

class NoithatController extends Controller
{
    // public function index()
    // {
    //     $noithat = NoiThat::all();
    //     return response()->json($noithat);
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'MaNT' => 'required',
    //         'TenNT' => 'required',
    //         'MaPhong' => 'required'
    //     ]);

    //     $noithat = NoiThat::create($request->all());
    //     return response()->json($noithat, 201);
    // }

    // public function update(Request $request, $MaNT)
    // {
    //     $request->validate([
    //         'TenNT' => 'required',
    //         'MaPhong' => 'required'
    //     ]);

    //     $noithat = NoiThat::findOrFail($MaNT);
    //     $noithat->update($request->all());

    //     return response()->json($noithat);
    // }

    // public function destroy($MaNT)
    // {
    //     $noithat = NoiThat::findOrFail($MaNT);
    //     $noithat->delete();

    //     return response()->json(['message' => 'Xóa nội thất thành công']);
    // }
    public function index()
    {
        return response()->json(NoiThat::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaNT' => 'required|unique:noi_that',
            'TenNT' => 'required',
            'MaPhong' => 'required'
        ]);

        $noithat = NoiThat::create($request->all());
        return response()->json($noithat, 201);
    }

    public function show($MaNT)
    {
        return response()->json(NoiThat::findOrFail($MaNT));
    }

    public function update(Request $request, $MaNT)
    {
        $request->validate([
            'TenNT' => 'required',
            'MaPhong' => 'required'
        ]);

        $noithat = NoiThat::findOrFail($MaNT);
        $noithat->update($request->all());

        return response()->json($noithat);
    }

    public function destroy($MaNT)
    {
        NoiThat::findOrFail($MaNT)->delete();
        return response()->json(['message' => 'Xóa nội thất thành công']);
    }
}
