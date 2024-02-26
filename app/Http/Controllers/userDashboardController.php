<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absenMasuk;
use App\Models\absenPulang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class userDashboardController extends Controller
{

    public function index(){

        $user = Auth::user();

        return view('user-view.index-user',[
            'user' => $user
        ]);
    }
    public function absensiMasuk(){

        $user = Auth::user();

        return view('user-view.absensi-masuk-user',[
            'user' => $user
        ]);
    }

    public function absensiPulang(){

        return view('user-view.absensi-pulang-user');
    }


    public function cekMapMasuk(Request $request) {
        
        
        $data = [
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'attendance' => $request->input('attendance_type'),
            
            // tambahkan data lainnya dari $request yang ingin Anda kirim ke view
        ];

    
        return view('user-view.map-masuk-user',[
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

    
        return view('user-view.map-pulang-user',[
            'data' => $data
        ]);
    }

    public function kirimAbsensiMasuk(Request $request, ) {

        $user = Auth::user();

        absenMasuk::create([
            'user_id'=> $user->id,
            'nama' => $user->name,
            'email' => $user->email,
            'nim' => $user->student_id,
            'sekolah' => $user->school,
            'status' => $request->input('attendance_type'),
            'tanggal' => $request->input('current_date'),
            'jam' => $request->input('current_time'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'keterangan' => $request->input('information'),
        ]);
        return redirect('/index')->with('message','Absen masuk telah berhasil ditambahkan!');
    }

    public function kirimAbsensiPulang(Request $request) {

        $user = Auth::user();
        
        absenPulang::create([
            'user_id'=> $user->id,
            'nama' => $user->name,
            'email' => $user->email,
            'nim' => $user->student_id,
            'sekolah' => $user->school,
            'status' => $request->input('attendance_type'),
            'tanggal' => $request->input('current_date'),
            'jam' => $request->input('current_time'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
        ]);
        return redirect('/index')->with('message','Absen pulang telah berhasil ditambahkan!');
    }

    public function riwayat() {

        $absenMasuk = absenMasuk::all();

        $absenPulang = absenPulang::all();

        return  view('user-view.riwayat-user',[
            'masuks' => $absenMasuk,
            'pulangs' => $absenPulang
        ]);
    }

}
