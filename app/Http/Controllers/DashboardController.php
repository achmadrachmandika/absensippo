<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\absenMasuk;
use App\Models\resume; // Import model User dari direktori Models

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
         // Ambil semua data pengguna dari model User, diurutkan berdasarkan pembuatan terbaru
         $users = User::whereNotIn('id', [1])
         ->orderBy('created_at', 'desc')
         ->get();


        // Kirim data pengguna ke view 'admin.dashboard'
        return view('admin.dashboard', compact('users'));
    }

    public function daftarResume()
    {
         // Ambil semua data pengguna dari model User, diurutkan berdasarkan pembuatan terbaru
        $resumes = resume::orderBy('created_at', 'desc')->get();

        return view('admin.daftar-resume', compact('resumes'));
    }

    public function rekapHarian()
    {
         // Ambil semua data pengguna dari model User, diurutkan berdasarkan pembuatan terbaru
        $users = User::all();
        $todayDate = Carbon::now()->toDateString();

        foreach ($users as $user) {
            $absenMasuk = AbsenMasuk::where('nim', $user->student_id)
                            ->whereDate('tanggal', $todayDate)
                            ->first();

    if (!$absenMasuk) {
        // Jika tidak ada rekaman absensi untuk pengguna ini pada tanggal ini
        absenMasuk::create([
            'user_id' => $user->id,
            'nama' => $user->name,
            'email' => $user->email,
            'nim' => $user->student_id,
            'sekolah' => $user->school,
            'status' => "Alpha",
            'tanggal' => $todayDate,
            'jam' => null,
            'longitude' => null,
            'latitude' => null,
            'keterangan' => null,
        ]);
    }
    
        // return view('admin.daftar-resume', compact('resumes'));
        }
        return redirect()->route('admin.absenmasuk');
    }
}
