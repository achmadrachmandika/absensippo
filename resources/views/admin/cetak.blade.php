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
</head>

<body>
    <h2 style="text-align: center;">Detail Absensi {{ $user->name }} PPO Bulan {{
        \Carbon\Carbon::now()->translatedFormat('F Y') }}</h2>

    @if ($absenMasuk->isNotEmpty())
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jumlah Kehadiran</th>
                <th>Jumlah Izin</th>
                <th>Jumlah Sakit</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->name }} </td>
                <td>{{ $jumlah_masuk }} hari</td>
                <td>{{ $jumlah_izin }} hari</td>
                <td>{{ $jumlah_sakit }} hari</td>
            </tr>
        </tbody>
    </table>
    @else
    <p>Data absensi tidak ditemukan.</p>
    @endif
</body>

</html>