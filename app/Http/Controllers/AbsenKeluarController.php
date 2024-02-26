<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absenPulang;

class AbsenKeluarController extends Controller
{
    public function index()
    {
        $absenPulang = absenPulang::all();
        return view('/admin/absenkeluar',[
            'pulangs' => $absenPulang
        ]);
    }
}
