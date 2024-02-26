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
}
