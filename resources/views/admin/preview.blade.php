<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Absensi</title>
    <style>
        /* Gaya CSS khusus untuk cetak */
        @page {
            margin: 0;
        }

        body {
            margin: 1.25cm;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <h2 style="text-align: center;">Detail Absensi {{ $user->name }} PPO Bulan {{
            \Carbon\Carbon::now()->translatedFormat('F Y') }}</h2>
    
        @if ($absenMasuk->isNotEmpty())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jumlah Kehadiran</th>
                    <th>Jumlah Izin</th>
                    <th>Jumlah Sakit</th>
                    <th>Jumlah Alpha</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->name }} </td>
                    <td>{{ $jumlah_masuk }} hari</td>
                    <td>{{ $jumlah_izin }} hari</td>
                    <td>{{ $jumlah_sakit }} hari</td>
                    <td>{{ $jumlah_alpha }} hari</td>
                </tr>
            </tbody>
        </table>
        <br>

    
        <table id="myTable" class="table table-striped">
            <thead class="bg-secondary text-white">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Sekolah / Universitas</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Keterangan</th>
                    <th>Lokasi Absen</th>
    
                </tr>
            </thead>
            <tbody>
                @foreach($absenMasuk as $masuk)
                <tr>
                    <td>{{$masuk->id}}</td>
                    <td>{{$masuk->nama}}</td>
                    <td>{{$masuk->sekolah}}</td>
                    <td>{{$masuk->status}}</td>
                    <td>{{$masuk->tanggal}}</td>
                    <td>{{$masuk->jam}}</td>
                    <td>{{$masuk->keterangan}}</td>
                    <td>{{$masuk->longitude}}, {{$masuk->latitude}}</td>
                </tr>
                @endforeach
                <!-- Data absensi lainnya bisa ditambahkan di sini -->
            </tbody>
        </table>
        @else
        <p>Data absensi tidak ditemukan.</p>
        @endif
    
    
        <!-- Tombol Kembali -->
        <button class="btn btn-secondary form-control"onclick="window.history.back()" style="margin: 20px 0px;">Kembali</button>

    </div>

</body>

</html>