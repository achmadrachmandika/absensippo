<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absenPulang;

class AbsenKeluarController extends Controller
{
    public function index()
    {
        $absenPulang = AbsenPulang::orderBy('created_at', 'desc')->get();
    return view('/admin/absenkeluar', [
        'pulangs' => $absenPulang
    ]);
    }

    public function cekMapPulang($id)
    {   
        $data = absenPulang::where('id', $id)->first(); //cari dimana id = $id

        return view('/admin/mapAbsenPulang',[
            'data' => $data
        ]);
    }
}
