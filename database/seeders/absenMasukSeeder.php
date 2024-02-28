<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\absenMasuk;
use Carbon\Carbon;

class absenMasukSeeder extends Seeder
{
    public function run()
    {
        $user = User::find(3); // Mendapatkan user pertama dari tabel users

        $startDate = Carbon::now()->subDays(60); // Mendapatkan tanggal 60 hari yang lalu
        $endDate = Carbon::now(); // Mendapatkan tanggal hari ini

        $currentDate = $startDate->copy();
        
        while ($currentDate <= $endDate) {
            $status = 'Masuk'; // Default status adalah Masuk

            // Setiap 5x izin dan 4x sakit dari 60 hari
            if ($currentDate->day % 10 == 0) {
                $status = 'Izin';
            } elseif ($currentDate->day % 10 == 5) {
                $status = 'Sakit';
            }

            AbsenMasuk::create([
                'user_id' => $user->id,
                'nama' => $user->name,
                'email' => $user->email,
                'nim' => $user->student_id,
                'sekolah' => $user->school,
                'status' => $status,
                'tanggal' => $currentDate->format('Y-m-d'),
                'jam' => '08:00:00', // Atur jam sesuai kebutuhan
                'longitude' => '111.525196',
                'latitude' => '-7.617455',
                'keterangan' => null,
            ]);

            $currentDate->addDay(); // Tambahkan 1 hari untuk iterasi berikutnya
        }
    }
}

// class absenMasukSeeder extends Seeder
// {
//     public function run()
//     {
//         $user = User::where('id',3); // Ambil data user pertama dari tabel users, sesuaikan dengan kebutuhan Anda

//         $statuses = ['izin', 'sakit','masuk'];
        
//         for ($i = 1; $i <= 60; $i++) {
//             $tanggal = Carbon::now()->subDays(60 - $i); // Mengurangi tanggal saat ini sebanyak $i hari
            
//             // Mendapatkan status secara acak (izin atau sakit)
//             $status = $statuses[rand(0, count($statuses) - 1)];

//             // Menentukan jumlah izin dan sakit
//             $jumlah_izin = $status == 'izin' ? 5 : 0;
//             $jumlah_sakit = $status == 'sakit' ? 4 : 0;

//             for ($j = 1; $j <= $jumlah_izin + $jumlah_sakit; $j++) {
//                 $jam = rand(7, 8) . ':'.rand(00, 59). ':'.rand(00, 59); // Jam absen secara acak antara 07:00:00 - 16:00:00
//                 AbsenMasuk::create([
//                     'user_id' => $user->id,
//                     'nama' => $user->name,
//                     'email' => $user->email,
//                     'nim' => $user->student_id,
//                     'sekolah' => $user->school,
//                     'status' => $status,
//                     'tanggal' => $tanggal,
//                     'jam' => $jam,
//                     'longitude' => '111.525196',
//                     'latitude' => '-7.617455',
//                     'keterangan' => null,
//                 ]);
//             }
//         }
//     }
// }