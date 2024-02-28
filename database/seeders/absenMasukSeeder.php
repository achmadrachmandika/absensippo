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
