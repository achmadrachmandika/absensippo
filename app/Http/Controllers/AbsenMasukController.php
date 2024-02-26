<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absenMasuk;

class AbsenMasukController extends Controller
{
        public function index()
    {   
        $absenMasuk = absenMasuk::all();
        return view('/admin/absenmasuk',[
            'masuks' => $absenMasuk
        ]);
    }

}
