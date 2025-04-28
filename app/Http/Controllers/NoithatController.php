<?php

namespace App\Http\Controllers;

use App\Models\NoiThat;
use App\Models\BaoTri;
use App\Models\ChiTietBaoTri;
use App\Models\Phong;
use Illuminate\Http\Request;

class NoithatController extends Controller
{
    public function index()
    {
        return response()->json(NoiThat::all());
    }

    public function show($MaNT)
    {
        $noithat = NoiThat::where('MaNT', 'Like', "%$MaNT%")->get();
        if (!$noithat) {
            return response()->json([], 404);
        }
        return response()->json($noithat);
    }

    public function store(Request $request)
    {
        $noithat = NoiThat::where('MaNT',$request->MaNT)->first();
        $phong = Phong::where('MaPhong', $request->MaPhong)->first();
        if ($phong && !$noithat) {
                    NoiThat::create($request->all());
                    return response()->json([], 200);
            }
            return response()->json([], 404);
        }


    public function update(Request $request, string $id)
    {
        $noithat = NoiThat::where('MaNT',$id)->first();
        $phong = Phong::where('MaPhong', $request->MaPhong)->first();
        if ($phong && $noithat) {
            $maold = $id;
            if($maold != $request->MaNT){
                ChiTietBaoTri::where('MaNT',$maold)->update(['MaNT'=>$request->MaNT]);
            }
                    $noithat->update($request->all());
                    return response()->json([], 200);
            }
            return response()->json([], 404);
        }


    public function destroy(string $id)
    {
       $noithat = NoiThat::where('MaNT',$id)->first();
      if ($noithat){
            ChiTietBaoTri::where('MaNT',$id)->delete();
            $noithat->delete();
            return response()->json([],200);
       }
       return response()->json([],404);
    }
}
