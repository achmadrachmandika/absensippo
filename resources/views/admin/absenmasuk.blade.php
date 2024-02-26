@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
          <div class="card-header text-center">
            <div class="card-header text-center">
                <h2 class="font-weight-bold" style="opacity: 0.5; font-family: 'Open Sans', sans-serif;">ABSEN MAGANG MASUK</h2>
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
                                    <th>Nim</th>
                                    <th>Sekolah / Universitas</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Alamat</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($masuks as $masuk)
                                <tr>
                                    <td>{{$masuk->id}}</td>
                                    <td>{{$masuk->nama}}</td>
                                    <td>{{$masuk->nim}}</td>
                                    <td>{{$masuk->sekolah}}</td>
                                    <td>{{$masuk->status}}</td>
                                    <td>{{$masuk->tanggal}}</td>
                                    <td>{{$masuk->jam}}</td>
                                    <td>{{$masuk->longitude}}, {{$masuk->latitude}}</td>
                                    <td>{{$masuk->keterangan}}</td>
                                </tr>
                                @endforeach
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
