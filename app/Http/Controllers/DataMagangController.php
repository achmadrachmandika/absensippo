<?php

namespace App\Http\Controllers;

use App\Models\DataMagang;
use Illuminate\Http\Request;

class DataMagangController extends Controller
{
    public function index()
    {
        $dataMagangs = DataMagang::paginate(5);
        return view('admin.data_magang.index', compact('dataMagangs'));
    }

    public function create()
    {
        return view('admin.data_magang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'no_handphone' => 'required',
            'password' => 'required', // Tambahkan validasi untuk password
        ]);

        DataMagang::create($request->all());
        return redirect()->route('admin.data_magang.index')->with('success', 'Data Magang Berhasil Ditambahkan');
    }

    public function show($nip)
    {
        $dataMagang = DataMagang::find($nip);
        return view('admin.data_magang.detail', compact('dataMagang'));
    }

    public function edit($nip)
    {
        $dataMagang = DataMagang::find($nip);
        return view('admin.data_magang.edit', compact('dataMagang'));
    }

    public function update(Request $request, $nip)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_handphone' => 'required',
            'password' => 'required', // Tambahkan validasi untuk password
        ]);

        DataMagang::find($nip)->update($request->all());
        return redirect()->route('admin.data_magang.index')->with('success', 'Data Magang Berhasil Diupdate');
    }

    public function destroy($nip)
    {
        DataMagang::find($nip)->delete();
        return redirect()->route('admin.data_magang.index')->with('success', 'Data Magang Berhasil Dihapus');
    }
}
