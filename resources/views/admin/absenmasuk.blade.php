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
                    <div class="row">
                      <div class="col">
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari Nama.." title="Type in a name">
                      </div>
                      <div class="col">
                        <div class="btn btn-secondary form-control" onclick="window.location.href = '/admin/rekapHarian'">Tutup Absen Hari Ini</div>
                      </div>
                    </div>
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
                        <table id="tabel-data-masuk" class="table table-striped table-bordered" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>Nama</th>
                                  <th>NIM / NISN</th>
                                  <th>Asal Sekolah / Universitas</th>
                                  <th>Tanggal</th>
                                  <th>Jam Masuk</th>
                                  <th>Jam Pulang</th>                                
                                  <th>Status</th>
                                  <th>Keterangan</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($masuks as $index => $masuk)
                                  <tr>
                                      <td>{{$masuk->nama}}</td>
                                      <td>{{$masuk->nim}}</td>
                                      <td>{{$masuk->sekolah}}</td>
                                      <td>{{$masuk->tanggal}}</td>
                                      <td>{{$masuk->jam}}</td>
                                      @php
                                          $pulang = $pulangs->where('nim', $masuk->nim)->where('tanggal', $masuk->tanggal)->first();
                                      @endphp
                                      <td>
                                          @if($pulang)
                                              {{$pulang->jam}}
                                          @else
                                              -
                                          @endif
                                      </td>
                                      
                                      @if($masuk->status == 'Masuk')
                                          <td><p style="font-weight:bold;color:green">{{$masuk->status}}</p></td>
                                      @elseif($masuk->status == 'Izin' || $masuk->status == 'Sakit')
                                          <td><p style="font-weight:bold;color:grey">{{$masuk->status}}</p></td>
                                      @elseif($masuk->status == 'Alpha')
                                          <td><p style="font-weight:bold;color:red">{{$masuk->status}}</p></td>
                                      @elseif($masuk->status == 'Sedang Masuk')
                                      <td><p style="font-weight:bold;color:rgb(90, 90, 226)">{{$masuk->status}}</p></td>
                                      @endif
                                      <td>{{$masuk->keterangan}}</td>
                                      <td><a href="{{url('admin/cekMapMasuk/'.$masuk->id)}}" class="btn btn-secondary">Cek Maps</a></td>
                                  </tr>
                              @endforeach
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
