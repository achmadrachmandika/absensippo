<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\User;
use App\Models\AbsenMasuk;



class CetakController extends Controller
{
    /**
     * Generate PDF for user details.
     */
    public function cetak($id)
    {
        // Mendapatkan data user berdasarkan ID
        $user = User::findOrFail($id);

        // Mendapatkan data absensi pengguna
        $absenMasuk = AbsenMasuk::where('user_id', $id)->get();

        // Menghitung jumlah kehadiran, izin, dan sakit
        $jumlah_masuk = $absenMasuk->where('status', 'Masuk')->count();
        $jumlah_izin = $absenMasuk->where('status', 'Izin')->count();
        $jumlah_sakit = $absenMasuk->where('status', 'Sakit')->count();
        $jumlah_alpha = $absenMasuk->where('status', 'Alpha')->count();

        // Membuat PDF dari tampilan Blade
        $pdf = PDF::loadView('admin.cetak', compact('user', 'absenMasuk', 'jumlah_masuk', 'jumlah_izin', 'jumlah_sakit', 'jumlah_alpha'));

        // Mengatur nama file PDF yang akan dihasilkan
        $filename = 'absensi_' . $user->name . '.pdf';

        // Mengirimkan file PDF untuk ditampilkan atau diunduh
        return $pdf->download($filename);
    }

     public function preview($id)
    {
        // Mendapatkan data user berdasarkan ID
        $user = User::findOrFail($id);

        // Mendapatkan data absensi masuk berdasarkan user ID
        $absenMasuk = AbsenMasuk::where('user_id', $id)->get();

        // Menghitung jumlah kehadiran, izin, dan sakit
        $jumlah_masuk = $absenMasuk->where('status', 'Masuk')->count();
        $jumlah_izin = $absenMasuk->where('status', 'Izin')->count();
        $jumlah_sakit = $absenMasuk->where('status', 'Sakit')->count();
        $jumlah_alpha = $absenMasuk->where('status', 'Alpha')->count();

        // Mengembalikan view preview dengan data yang diperlukan
        return view('admin.preview', compact('user', 'absenMasuk', 'jumlah_masuk', 'jumlah_izin', 'jumlah_sakit', 'jumlah_alpha'));
    }

}
