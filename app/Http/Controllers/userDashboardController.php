<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absenMasuk;
use App\Models\absenPulang;
use App\Models\resume;
use Illuminate\Support\Facades\Auth;
use App\Upload;

class userDashboardController extends Controller
{

    public function index(){

        $user = Auth::user();

        return view('user-view.index-user',[
            'user' => $user
        ]);
    }
    public function absensiMasuk(){

        $user = Auth::user(); // Mendapatkan pengguna yang sedang diotentikasi
        $currentDate = date('Y-m-d'); // Mendapatkan tanggal saat ini dalam format 'YYYY-MM-DD'

        // Mengambil data absen masuk berdasarkan user_id dan tanggal
        $dataMasuk = absenMasuk::where('user_id', $user->id)
            ->where('tanggal', $currentDate)
            ->get();

        // Mengembalikan nilai true jika ada record absen masuk untuk pengguna saat ini pada tanggal sekarang
        $absenMasukExists = $dataMasuk->isNotEmpty();

        if($absenMasukExists){
            return redirect('/index')->with('message', 'Anda Sudah Absen Hari Ini');
        }else{
            return view('user-view.absensi-masuk-user',[
            'user' => $user
        ]);
        }
        

        
    }

    public function absensiPulang(){

        $user = Auth::user();

        return view('user-view.absensi-pulang-user',[
            'user' => $user
        ]);
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

        $user = Auth::user();

        $request->validate([
            'pdf_resume' => 'mimes:pdf|max:1024', // Maksimum 2MB
            'resume_title' => 'required',
        ]);

        $data_pulang = [
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'attendance' => $request->input('attendance_type'),
            
            // tambahkan data lainnya dari $request yang ingin Anda kirim ke view
        ];


        
        if ($request->hasFile('pdf_resume')) {
            $file = $request->file('pdf_resume');
            $name = time();
            $ext = $file->getClientOriginalExtension();
            $newName = 'Laporan '.$request->input('resume_title') . ' ' . $user->name . ' ' . $name . '.' . $ext;

            $size = $file->getSize();

            $filePath = $file->storeAs('uploads', $newName, 'public'); 

            
            

            $data_resume = [
                'resume_title' => $request->input('resume_title'),
                'text_resume' => $request->input('text_resume'),
                'pdf_resume' => $filePath,
                'ukuran_file' => $size,
            ];

            
            return view('user-view.map-pulang-user',[
                'data_pulang' => $data_pulang,
                'data_resume' => $data_resume
            ])->with('message','Upload File Diterima');
        } else {

            $data_resume = [
                'resume_title' => $request->input('resume_title'),
                'text_resume' => $request->input('text_resume'),
                'pdf_resume' => null,
                'ukuran_file' => null,
            ];
            return view('user-view.map-pulang-user',[
                'data_pulang' => $data_pulang,
                'data_resume' => $data_resume
            ])->with('message','Upload File Gagal');
        }
        
        

    
        
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

        resume::create([
            'user_id'=> $user->id,
            'nama' => $user->name,
            'sekolah' => $user->school,
            'judul' =>$request->input('resume_title'),
            'keterangan' =>$request->input('text_resume'),
            'path' =>$request->input('pdf_resume'),
            'ukuran_file' =>$request->input('ukuran_file'),
        ]);
        
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

        $user = Auth::user();

        $user_studentID = $user->student_id;

        

        $absenMasuk = absenMasuk::where('nim', $user_studentID)->get();


        $absenPulang = absenPulang::where('nim', $user_studentID)->get();

        return  view('user-view.riwayat-user',[
            'masuks' => $absenMasuk,
            'pulangs' => $absenPulang
        ]);
    }

}
