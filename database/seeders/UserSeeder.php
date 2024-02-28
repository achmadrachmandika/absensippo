<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'gender' => 'female',
            'role' => 'admin',
            'student_id' => '1',
            'school' => 'inka',
            'email' => 'admin@role.test',
            'password' => bcrypt('12345')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'gender' => 'male',
            'role' => 'user',
            'student_id' => '2',
            'school' => 'polinema',
            'email' => 'user@role.test',
            'password' => bcrypt('12345')
        ]);

        $user->assignRole('user');

        $user = User::create([
            'name' => 'Satria Daffa',
            'gender' => 'male',
            'role' => 'user',
            'student_id' => '210535614853',
            'school' => 'Universitas Negeri Malang',
            'email' => 'satriiadaffa@gmail.com',
            'password' => bcrypt('12345')
        ]);

        $user->assignRole('user');
    }

      public static function getDataIds()
{
    // Array untuk menyimpan ID pengguna yang ditambahkan
    $userIds = [];

    // Ambil semua data pengguna yang telah ditambahkan
    $users = User::all();

    // Loop melalui setiap pengguna dan tambahkan ID-nya ke dalam array
    foreach ($users as $user) {
        $userIds[] = $user->id;
    }

    // Kembalikan array ID pengguna
    return $userIds;
}

}
