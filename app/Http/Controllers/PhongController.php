<?php

namespace App\Http\Controllers;

use App\Models\Phong;
use Illuminate\Http\Request;

class PhongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Phong::all(); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([  
            'MaPhong' => 'required|string|max:10' ,
            'SoLuongMax' =>'required|int' 
        ]);  

        $phong = Phong::create($request->all());  
        return response()->json($phong, 201); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $MaPhong)
    {
        return Phong::findOrFail($MaPhong);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $MaPhong)
    {
        $request->validate([  
            'MaPhong' => 'nullable|string|max:10' ,
            'SoLuongMax' =>'required|int' 
        ]);  

        $phong = Phong::findOrFail($MaPhong);  
        $phong->update($request->all());  
        return response()->json($phong, 200);  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $MaPhong)
    {
        $phong = Phong::where('MaPhong', $MaPhong)->first();
    
        if ($phong) {
            $phong->delete(); // Xóa sinh viên
            return response()->json(['message' => 'Xóa thành công']);
        }
    
        return response()->json(['message' => 'Không tìm thấy Phòng'], 404);
    }
}
