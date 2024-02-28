@extends('layouts.admin')

@section('content')

<style>
    * {
      box-sizing: border-box;
    }
    
    #myInput {
      background-image: url('/css/searchicon.png');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
    }
    
    #myTable {
      border-collapse: collapse;
      width: 100%;
      border: 1px solid #ddd;
      font-size: 18px;
    }
    
    #myTable th, #myTable td {
      text-align: left;
      padding: 12px;
    }
    
    #myTable tr {
      border-bottom: 1px solid #ddd;
    }
    
    #myTable tr.header, #myTable tr:hover {
      background-color: #f1f1f1;
    }
</style>

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
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari Nama.." title="Type in a name">
                    <div class="table-responsive">

                      <!-- Tambahkan tombol import di atas tabel -->
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <form action="{{ route('admin.absenmasuk.import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                          </form>
                        </div>
                      </div>

                      <div style="max-height:700px">
                        <table id="myTable" class="table table-striped">
                            <thead class="bg-secondary text-white">
                                <tr>
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
</div>
<script>
  function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0]; // Mengambil elemen kedua (kolom kedua) untuk pencarian berdasarkan nama
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
</script>
@endsection
