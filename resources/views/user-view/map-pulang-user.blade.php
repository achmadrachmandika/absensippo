<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ABSENSI MAGANG DIVISI PPA</title>
    <link rel="stylesheet" href="{{asset('asset/css/user-view.css')}}">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src='https://api.mapbox.com/mapbox-gl-js/v3.1.2/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v3.1.2/mapbox-gl.css' rel='stylesheet' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

@extends('layouts.app')

@section('content')
<body class="body">
    <div class="container text-center">
        <div class="row">
            <div class="col" style="height:20vw">
                <div class="card" style="width: 100%;heigth:100%">
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset('asset/images/logo-inka.png')}}" class="card-img-top" style="padding:10px" alt="logo-inka" >
                        </div>
                        <div class="col-9"></div>
                    </div>
                    
                    <div class="card-body text-center">
                        <h1 class="card-title">Absensi Pulang</h1>
                      <div class="row" style="margin-top:2vw">
                        <div class="col"></div>
                        <div class="col">
                            <div class="card-body text-center map" id='map'></div>
                        </div>
                        <div class="col"></div>
                      </div>
                      <div class="card-info">
                        <h3 class="question">Apa Lokasi Anda Sudah Benar?</h3>
                        {{-- <p>longitude : {{$data_pulang['longitude']}}</p>   
                        <p>latitude : {{$data_pulang['latitude']}}</p> --}}
                        <div class="row question" style="display: flex">                            
                            <div class="col-2"></div>
                            <div class="col-1">
                                <svg class="icon-location" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#2fa5ee" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                            </div>
                            <div class="col-3">
                                <label>: Lokasi Anda</label>
                            </div>
                            <div class="col-1">
                                <svg class="icon-location" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff0000" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>                                
                            </div>
                            <div class="col-3">
                                <label>: PT Industri Kereta Api</label>
                            </div>
                            <div class="col-2"></div>
                                
                        </div>
                      </div>
                        <div class="card-form" style="margin:20px">
                            <form action="{{ url('/kirim-absensi-pulang') }}" method="post" enctype="multipart/form-data" id="attendanceForm">
                                @csrf
                                <input type="hidden" name="attendance_type" id="attendanceTypeInput" value="{{$data_pulang['attendance']}}">
                                <input type="hidden" name="latitude" id="latitudeInput" value="{{$data_pulang['latitude']}}">
                                <input type="hidden" name="longitude" id="longitudeInput" value="{{$data_pulang['longitude']}}">
                                <input type="hidden" id="current_date" name="current_date">
                                <input type="hidden" id="current_time" name="current_time">
                                <input type="hidden" name="resume_title" id="resume_titleInput" value="{{$data_resume['resume_title']}}">
                                <input type="hidden" name="text_resume" id="text_resumeInput" value="{{$data_resume['text_resume']}}">
                                <input type="hidden" name="pdf_resume" id="pdf_resumeInput" value="{{$data_resume['pdf_resume']}}">
                                <input type="hidden" name="ukuran_file" id="ukuran_fileInput" value="{{$data_resume['ukuran_file']}}">
                                <div class="row">
                                    <div class="col">
                                        <input class="btn btn-secondary form-control" type="submit" value="Benar (Lanjutkan)" id="submitButton">
                                    </div>
                                </div>
                                </form>
                                <div class="row">
                                    <div class="col">
                                        <button onclick="window.location.href='{{ url('/absensi-pulang') }}'" class="btn btn-light form-control"><label for="">Kembali ke Halaman Sebelumnya</label></button>
                                    </div>
                                </div>
                                </div>
                            
                            
                            </div>
                        </form>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    
</html>

<script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoic2F0cmlpYWRhZmZhIiwiYSI6ImNsaDA5Z3lsYzBkOXozbHBxMmtzaTE0djUifQ.GvxtJBL6YN8PIrh5t2pT9g';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        style: 'mapbox://styles/mapbox/streets-v12', // style URL
        center: [{{$data_pulang['longitude']}},{{$data_pulang['latitude']}}], // starting position [lng, lat]
        //center: [111.523258, -7.617921], //starting position [lng, lat]     INI KOORDINAT INKA (NANTI DIGANTI KOORDINAT KITA)
        zoom: 15, // starting zoom

    });
    // Inisialisasi marker
const marker = new mapboxgl.Marker({ color: "#FF0000" })
    .setLngLat([111.525480, -7.617241]) // Jangan Diganti
    .addTo(map);

    const markerUser = new mapboxgl.Marker()
    .setLngLat([{{$data_pulang['longitude']}}, {{$data_pulang['latitude']}}])
    .addTo(map);

 
</script>

<script>
// Lokasi yang diizinkan (contoh: latitude dan longitude)
const allowedLatitude = -7.617455; 
const allowedLongitude = 111.525196; //jangan lupa ganti ke koordinat inka (ini masih di sby) koor inka -7.617455, 111.525196


const allowedRadius = 500; // Dalam meter

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(checkLocation);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function checkLocation(position) {
    const userLatitude = {{$data_pulang['latitude']}};
    const userLongitude = {{$data_pulang['longitude']}};

    // const userLatitude = -7.618021975130887;
    // const userLongitude = 111.52503753344273;
    

    // koordinat depan masjid -7.617921, 111.523258

    // koordinat pintu utara -7.615991, 111.524723
    // koordinat inka timur laut -7.616119, 111.530044

    //koordinat inka tenggara 7.618010, 111.529635

    //koordinat inka tengah 7.617136, 111.527414

    //koordinat kantor ppa -7.618021975130887, 111.52503753344273

    // Hitung jarak antara lokasi pengguna dan lokasi yang diizinkan
    const distance = calculateDistance(userLatitude, userLongitude, allowedLatitude, allowedLongitude);

    // Periksa apakah jaraknya berada dalam radius yang diizinkan
    if (distance <= allowedRadius) {
    //Periksa apakah jenis kehadiran adalah "masuk", "izin", "sakit", atau "alpha"
    if ("{{$data_pulang['attendance']}}" === "Pulang") {
        console.log("masuk dan berada di area");
        
        document.getElementById('submitButton').disabled = false;
        alert("Lokasi diizinkan. Anda berada dalam radius yang diizinkan.");
        } 
    } 

    else {
    console.log("no");
    //Periksa apakah jenis kehadiran adalah "masuk"
    if ("{{$data_pulang['attendance']}}" === "Pulang") {
        console.log("masuk tetapi tidak berada di area");
        document.getElementById('submitButton').disabled = true;
        alert("Lokasi tidak diizinkan. Anda berada di luar radius yang diizinkan.");
    }
    }
}


function calculateDistance(lat1, lon1, lat2, lon2) {
    const R = 6371e3; // Radius bumi dalam meter
    const φ1 = toRadians(lat1);
    const φ2 = toRadians(lat2);
    const Δφ = toRadians(lat2 - lat1);
    const Δλ = toRadians(lon2 - lon1);

    const a = Math.sin(Δφ/2) * Math.sin(Δφ/2) +
              Math.cos(φ1) * Math.cos(φ2) *
              Math.sin(Δλ/2) * Math.sin(Δλ/2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

    const distance = R * c;
    return distance;
}

function toRadians(degrees) {
    return degrees * Math.PI / 180;
}

getLocation(); // Meminta lokasi pengguna saat halaman dimuat
</script>

<script>
    // Mengisi nilai input hidden dengan tanggal dan jam saat ini
    var currentDate = new Date().toISOString().slice(0, 10); // Format: YYYY-MM-DD
    var currentTime = new Date().toTimeString().slice(0, 8); // Format: HH:MM:SS

    console.log(currentDate)
    console.log(currentTime)
    document.getElementById("current_date").value = currentDate;
    document.getElementById("current_time").value = currentTime;

    
</script>

@endsection