<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\resume; // Import model User dari direktori Models

class DashboardController extends Controller
{
    public function index()
    {
         // Ambil semua data pengguna dari model User, diurutkan berdasarkan pembuatan terbaru
    $users = User::orderBy('created_at', 'desc')->get();


        // Kirim data pengguna ke view 'admin.dashboard'
        return view('admin.dashboard', compact('users'));
    }

    public function daftarResume()
    {
         // Ambil semua data pengguna dari model User, diurutkan berdasarkan pembuatan terbaru
        $resumes = resume::orderBy('created_at', 'desc')->get();

        return view('admin.daftar-resume', compact('resumes'));
    }
}
