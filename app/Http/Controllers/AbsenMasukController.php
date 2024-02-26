<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absenMasuk;

class AbsenMasukController extends Controller
{
    public function index()
    {   
        $absenMasuk = AbsenMasuk::orderBy('created_at', 'desc')->get(); // Mengurutkan berdasarkan waktu paling akhir
        return view('admin.absenmasuk', [
            'masuks' => $absenMasuk
        ]);
    }

    public function show($user_id)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan user_id
        $absenMasuk = AbsenMasuk::where('user_id', $user_id)->first(); // Ubah cara pencarian
        return view('admin.detail', compact('absenMasuk')); // Ubah path view ke direktori yang benar
    }
}
