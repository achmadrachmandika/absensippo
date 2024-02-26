@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
          <div class="card-header text-center">
            <div class="card-header text-center">
                <h2 class="font-weight-bold" style="opacity: 0.5; font-family: 'Open Sans', sans-serif;">ABSEN MASUK MAGANG</h2>
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
                                    <th>Sekolah / Universitas</th>
                                    <th>Status</th>
                                    <th>Waktu</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($masuks as $masuk)
                                <tr>
                                    <td>{{$masuk->id}}</td>
                                    <td>{{$masuk->nama}}</td>
                                    <td>{{$masuk->sekolah}}</td>
                                    <td>{{$masuk->status}}</td>
                                    <td>{{$masuk->tanggal}} {{$masuk->jam}}</td>
                                    <td>{{$masuk->keterangan}}</td>
                                    <td><a href="{{url('admin/cekMapMasuk/'.$masuk->id)}}" class="btn btn-secondary">Cek Maps</a></td>
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
