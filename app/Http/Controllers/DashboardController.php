<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import model User dari direktori Models

class DashboardController extends Controller
{
    public function index()
    {
         // Ambil semua data pengguna dari model User, diurutkan berdasarkan pembuatan terbaru
    $users = User::orderBy('created_at', 'desc')->get();


        // Kirim data pengguna ke view 'admin.dashboard'
        return view('admin.dashboard', compact('users'));
    }
}
