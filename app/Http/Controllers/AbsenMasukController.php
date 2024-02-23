<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsenMasukController extends Controller
{
        public function index()
    {
        return view('/admin/absenmasuk');
    }
}
