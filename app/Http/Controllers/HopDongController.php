<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HopDong;

class HopDongController extends Controller
{
    // Lấy danh sách hợp đồng (hoặc tìm kiếm theo từ khóa)
    public function index(Request $request)
    {
        $query = HopDong::query();

        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $query->where('NoiDung', 'LIKE', "%$keyword%");
        }

        return response()->json($query->get());
    }

    // Thêm hợp đồng mới
    public function store(Request $request)
    {
       


      

        $hopDong = new HopDong();
        $hopDong->MaHD = $request['MaHD'];
        $hopDong->NoiDung = $request['NoiDung'];
        $hopDong->NgayBatDau = $request['NgayBatDau'];
        $hopDong->NgayKetThuc = $request['NgayKetThuc'];
        $hopDong->NgayLap = $request['NgayLap'];
        $hopDong->MaSV = $request['MaSV'];
        $hopDong->save();
    }

    // Cập nhật hợp đồng
    public function update(Request $request, $id)
    {
        $hopDong = HopDong::findOrFail($id);
        $hopDong->update($request);

        return response()->json([
        ],200);
    }

    // Xóa hợp đồng
    public function destroy($id)
    {
        $hopDong = HopDong::findOrFail($id);
        $hopDong->delete();

        return response()->json([
         
        ],200);
    }

    // Lấy chi tiết 1 hợp đồng
    public function show($id)
    {
        $hopDong = HopDong::findOrFail($id);

        return response()->json($hopDong);
    }
}
