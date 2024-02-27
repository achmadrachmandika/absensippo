<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbsenMasuk;
use App\Imports\MasukImport;
use Maatwebsite\Excel\Facades\Excel;



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
        // Mendapatkan data user berdasarkan user_id
        $user = \App\Models\User::findOrFail($user_id);

        // Menampilkan detail data dengan menemukan/berdasarkan user_id
        $absenMasuk = AbsenMasuk::where('user_id', $user_id)->get(); 

        // Debugging: Tampilkan data absensi untuk memeriksa apakah data sudah tersedia
        // dd($absenMasuk);

        // Inisialisasi jumlah kehadiran, izin, dan sakit
        $jumlah_masuk = 0;
        $jumlah_izin = 0;
        $jumlah_sakit = 0;

        // Loop melalui setiap entri absensi untuk menghitung jumlah kehadiran, izin, dan sakit
        foreach ($absenMasuk as $absen) {
            if ($absen->status === 'Masuk') {
                $jumlah_masuk++;
            } elseif ($absen->status === 'Izin') {
                $jumlah_izin++;
            } elseif ($absen->status === 'Sakit') {
                $jumlah_sakit++;
            }
        }

        return view('admin.detail', compact('absenMasuk', 'user', 'jumlah_masuk', 'jumlah_izin', 'jumlah_sakit'));
    }

    public function cetak($id)
    {
        // Mendapatkan data user berdasarkan ID
        $user = \App\Models\User::findOrFail($id);

        // Mendapatkan data absensi pengguna
        // Saya asumsikan Anda memiliki metode untuk mendapatkan data absensi pengguna di sini

        // Inisialisasi jumlah kehadiran, izin, dan sakit
        $jumlah_masuk = 0;
        $jumlah_izin = 0;
        $jumlah_sakit = 0;

        // Membuat PDF dari tampilan Blade
        $pdf = PDF::loadView('admin.cetak', compact('user', 'jumlah_masuk', 'jumlah_izin', 'jumlah_sakit'));

        // Mengatur nama file PDF yang akan dihasilkan
        $filename = 'absensi_' . $user->name . '.pdf';

        // Mengirimkan file PDF untuk ditampilkan atau diunduh
        return $pdf->download($filename);
    }

    public function cekMapMasuk($id)
    {   
        $data = AbsenMasuk::findOrFail($id); // Mendapatkan data absen masuk berdasarkan ID

        return view('admin.mapAbsenMasuk', [
            'data' => $data
        ]);
    }

public function import(Request $request)
{
    try {
        // Validasi file yang diunggah
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        // Mendapatkan file Excel yang diunggah
        $file = $request->file('file');

        // Baca file Excel dan lakukan impor menggunakan class import MasukImport
        Excel::import(new MasukImport, $file);

        // Redirect atau kembalikan respon yang sesuai
        return redirect()->route('admin.absensi-masuk.index')->with('success', 'Data imported successfully.');
    } catch (ValidationException $e) {
        return back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        // Handle error lainnya
        dd($e->getMessage());
    }

}
}
