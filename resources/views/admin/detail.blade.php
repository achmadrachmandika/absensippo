@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="font-weight-bold" style="opacity: 0.5; font-family: 'Open Sans', sans-serif;">
                        Detail Absensi {{ $user->name }} PPO Bulan {{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</h2>
                </div>
                <div class="card-body">
                    @if ($absenMasuk->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Kehadiran:</td>
                                    <td>{{ $jumlah_masuk }} hari</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Izin:</td>
                                    <td>{{ $jumlah_izin }} hari</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Sakit:</td>
                                    <td>{{ $jumlah_sakit }} hari</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Alpha:</td>
                                    <td>{{ $jumlah_alpha }} hari</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>Data absensi tidak ditemukan.</p>
                    @endif
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Kembali</a>
                    <a href="{{ route('admin.cetak', $user->id) }}" class="btn btn-success">Cetak PDF</a>
                    <a href="{{ route('admin.preview', $user->id) }}" class="btn btn-info">Preview</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection