<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ABSENSI MAGANG DIVISI PPA</title>
    <link rel="stylesheet" href="{{asset('asset/css/user-view.css')}}">
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
</head>
<body class="body">
    <div class="container text-center">
        <div class="row">
            <div class="col col-logo" style="margin:10px; height:6vh">
                <img src="{{ asset('asset/images/logo-inka.png')}}" class="card-img-riwayat" style="height:100%" alt="logo-inka" >
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card card-riwayat" >
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="font-weight-bold">Riwayat Absensi Masuk</h3>
                        </div>
                    </div>
                    <div class="card-body table-card-body">
                        <table id="tabel-data-masuk" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Pulang</th>                                
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($masuks as $index => $masuk)
                                    <tr>
                                        <td>{{$masuk->tanggal}}</td>
                                        <td>{{$masuk->jam}}</td>
                                        @php
                                            $pulang = $pulangs->where('tanggal', $masuk->tanggal)->first();
                                        @endphp
                                        <td>
                                            @if($pulang)
                                                {{$pulang->jam}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{$masuk->status}}</td>
                                        <td>{{$masuk->keterangan}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <br>
                          <br>
                          <div class="row">
                            <div class="col">
                                <button onclick="window.location.href='{{ url('/index') }}'" class="btn btn-secondary form-control"><label>Kembali</label></button>
                            </div>
                        </div>
            </div>


</body>

<script>
    $(document).ready(function(){
            $('#tabel-data-masuk').DataTable({
                "order": [[ 3, "desc" ]] // Urutkan berdasarkan kolom tanggal descending
            });
            $('#tabel-data-pulang').DataTable({
                "order": [[ 3, "desc" ]] // Urutkan berdasarkan kolom tanggal descending
            });
        });
</script>


</html>








