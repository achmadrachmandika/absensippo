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
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari.." title="Type in a name">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Sekolah / Universitas</th>
                                    <th>Email</th>
                                    <th>Rekapitulasi Kehadiran</th> <!-- Menambahkan kolom Action -->
                                    <th>Action</th> <!-- Menambahkan kolom Action -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td> <!-- Mengakses nama user -->
                                    <td>{{ $user->student_id }}</td> <!-- Mengakses NIM user -->
                                    <td>{{ $user->school }}</td> <!-- Mengakses sekolah user -->
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        <!-- Mengarahkan ke halaman detail dengan menambahkan user_id sebagai parameter -->
                                        <a class="btn btn-info"
                                            href="{{ route('admin.absensi-masuk.show', $user->id) }}">Rekapitulasi</a>
                                    </td>
                                    <td>
                                        <!-- Form untuk metode DELETE -->
                                      <form id="deleteForm{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <!-- Tombol Delete -->
                                        <button type="submit" class="btn btn-danger" {{ $user->role === 'admin' ? 'disabled' : '' }}>Delete</button>
                                    </form>
                                    </td>
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

<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.querySelector(".table"); // Menggunakan class "table" sebagai selector
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            // Menggunakan seluruh kolom dalam setiap baris untuk pencarian
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break; // Hentikan loop jika ditemukan kecocokan
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }
</script>



@endsection

{{-- @push('scripts')
<script>
    // Fungsi untuk menampilkan pop-up konfirmasi
    function confirmDelete() {
        return confirm("Apakah Anda yakin ingin menghapus akun ini?");
    }
</script> --}}
{{-- @endpush --}}