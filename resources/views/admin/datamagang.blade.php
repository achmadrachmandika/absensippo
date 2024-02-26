@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <div class="card-header text-center">
                        <h2 class="font-weight-bold" style="opacity: 0.5; font-family: 'Open Sans', sans-serif;">Data Karyawan Magang</h2>
                    </div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Alamat</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Achmad Rachmandika</td>
                                    <td>Masuk</td>
                                    <td>23-02-204</td>
                                    <td>07.00</td>
                                    <td>-7.617411, 111.523587</td>
                                    <td>Mengerjakan Web Absensi</td>
                                </tr>
                                <!-- Data absensi lainnya bisa ditambahkan di sini -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection