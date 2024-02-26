
@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="font-weight-bold" style="opacity: 0.5; font-family: 'Open Sans', sans-serif;">Data
                        Peserta Magang</h2>
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
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Sekolah / Universitas</th>
                                    <th>Rekapitulasi Kehadiran</th> <!-- Menambahkan kolom Action -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td> <!-- Mengakses nama user -->
                                    <td>{{ $user->student_id }}</td> <!-- Mengakses NIM user -->
                                    <td>{{ $user->school }}</td> <!-- Mengakses sekolah user -->
                                    <td class="text-center">
                                        <!-- Mengarahkan ke halaman detail dengan menambahkan user_id sebagai parameter -->
                                        <a class="btn btn-info" href="{{ route('admin.absensi-masuk.show', $user->id) }}">Show</a>
                                    </td>
                                    {{-- <td>
                                        <!-- Mengarahkan ke halaman detail dengan menambahkan user_id sebagai parameter -->
                                        <a class="btn btn-info"
                                            href="{{ route('absensi-user.show', $user->user_id) }}">Show</a>
                                    </td> --}}
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