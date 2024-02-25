<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absenMasuk;
use App\Models\absenPulang;

class dashboardController extends Controller
{

    public function index(){

        return view('index');
    }
    public function absensiMasuk(){

        return view('absensi-masuk');
    }

    public function absensiPulang(){

        return view('absensi-pulang');
    }


    public function cekMapMasuk(Request $request) {
        
        
        $data = [
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'attendance' => $request->input('attendance_type'),
            
            // tambahkan data lainnya dari $request yang ingin Anda kirim ke view
        ];

    
        return view('map-masuk',[
            'data' => $data
        ]);
    }

    public function cekMapPulang(Request $request) {
        
        
        $data = [
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'attendance' => $request->input('attendance_type'),
            
            // tambahkan data lainnya dari $request yang ingin Anda kirim ke view
        ];

    
        return view('map-pulang',[
            'data' => $data
        ]);
    }

    public function kirimAbsensiMasuk(Request $request) {

        absenMasuk::create([
            'nama' =>null,
            'email' =>null,
            'status' => $request->input('attendance_type'),
            'tanggal' => $request->input('current_date'),
            'jam' => $request->input('current_time'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'keterangan' => $request->input('information'),
        ]);
        return redirect('/index');
    }

    public function kirimAbsensiPulang(Request $request) {
        
        absenPulang::create([
            'nama' =>null,
            'email' =>null,
            'status' => $request->input('attendance_type'),
            'tanggal' => $request->input('current_date'),
            'jam' => $request->input('current_time'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
        ]);
        return redirect('/index');
    }

    public function riwayat() {

        $absenMasuk = absenMasuk::all();

        $absenPulang = absenPulang::all();

        return  view('riwayat',[
            'masuks' => $absenMasuk,
            'pulangs' => $absenPulang
        ]);
    }

}
