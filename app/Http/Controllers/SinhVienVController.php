<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use Illuminate\Http\Request;

class SinhVienVController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         
        return SinhVien::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)  
    {  
        $request->validate([  
            'MaSV' => 'required|string|max:10',  
            'TenSV' => 'required|string|max:30',  
            'NgaySinh' => 'required|date',  
            'SDT' => 'required|string|max:10',  
            'DiaChi' => 'nullable|string|max:50',  
            'MaPhong' => 'nullable|string|max:10',  
        ]);  

        $sinhVien = SinhVien::create($request->all());  
        return response()->json($sinhVien, 201);  
    }  

    /**
     * Display the specified resource.
     */
    public function show($MaSV)  
    {  
        return SinhVien::findOrFail($MaSV);  
    }  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $MaSV)  
    {  
        $request->validate([  
            'MaSV' => 'nullable|string|max:10',  
            'TenSV' => 'nullable|string|max:30',  
            'NgaySinh' => 'nullable|date',  
            'SDT' => 'nullable|string|max:10',  
            'DiaChi' => 'nullable|string|max:50',  
            'MaPhong' => 'nullable|string|max:10',  
        ]);  

        $sinhVien = SinhVien::findOrFail($MaSV);  
        $sinhVien->update($request->all());  
        return response()->json($sinhVien, 200);  
    }  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($MaSV)
    {
        $sinhVien = SinhVien::where('MaSV', $MaSV)->first();
    
        if ($sinhVien) {
            $sinhVien->delete(); // Xóa sinh viên
            return response()->json(['message' => 'Xóa thành công']);
        }
    
        return response()->json(['message' => 'Không tìm thấy sinh viên'], 404);
    }
     
}
