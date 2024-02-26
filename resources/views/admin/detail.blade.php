@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="font-weight-bold" style="opacity: 0.5; font-family: 'Open Sans', sans-serif;">Detail Absensi Pengguna</h2>
                </div>
                <div class="card-body">
                    @if ($absenMasuk)
                    <div>
                        <canvas id="absensiChart"></canvas>
                    </div>
                    @else
                    <p>Data absensi tidak ditemukan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('absensiChart').getContext('2d');
        var absensiChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Masuk', 'Izin', 'Sakit'],
                datasets: [{
                    label: 'Jumlah',
                    data: [{{ $absenMasuk->jumlah_masuk ?? 0 }}, {{ $absenMasuk->jumlah_izin ?? 0 }}, {{ $absenMasuk->jumlah_sakit ?? 0 }}],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

@endsection
