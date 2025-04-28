<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use Illuminate\Http\Request;

class HoaDonController extends Controller
{
    // Thêm hóa đơn mới
    public function store(Request $request)
    {

        $tongTien = $request['Tien_Dien'] + $request['TienNuoc'] + $request['Tien_Phat'];

        // Cập nhật trạng thái tự động
        $request['TrangThai'] = $request['TienDaTra'] >= $tongTien ? 'Đã đóng' : 'Chưa đóng';

        $hoaDon = HoaDon::create($request);

        return response()->json([
            'message' => 'Thêm hóa đơn thành công',
            'data' => $hoaDon
        ], 201);
    }

    // Sửa hóa đơn
    public function update(Request $request, $id)
    {
        $hoaDon = HoaDon::findOrFail($id);
        $hoaDon->update($request->all());
        return response()->json([],200200);
    }

    // Xóa hóa đơn
    public function destroy($id)
    {
        $hoaDon = HoaDon::findOrFail($id);
        $hoaDon->delete();

        return response()->json([
          
        ],200);
    }

    // Tìm kiếm hóa đơn
    public function index(Request $request)
    {
        $query = HoaDon::query();

        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $query->where('GhiChu', 'LIKE', "%$keyword%")
                ->orWhere('TrangThai', 'LIKE', "%$keyword%");
        }

        if ($request->has('MaPhong')) {
            $MaPhong = $request->input('MaPhong');
            $query->where('MaPhong', 'LIKE', "%$MaPhong%");
        }

        if ($request->has('NgayLap')) {
            $NgayLap = $request->input('NgayLap');
            $query->where('NgayLap', 'LIKE', "%$NgayLap%");
        }

        return response()->json($query->get());
    }

    // Lấy thông tin hóa đơn theo ID
    public function show($id)
    {
        $hoaDon = HoaDon::findOrFail($id);

        return response()->json($hoaDon);
    }
}
