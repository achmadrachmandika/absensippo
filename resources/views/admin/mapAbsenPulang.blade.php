@extends('layouts.admin')

@section('content')

<script src='https://api.mapbox.com/mapbox-gl-js/v3.1.2/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v3.1.2/mapbox-gl.css' rel='stylesheet' />

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
          <div class="card-header text-center">
            <div class="card-header text-center">
                <h2 class="font-weight-bold" style="opacity: 0.5; font-family: 'Open Sans', sans-serif;">ABSEN PULANG MAGANG</h2>
            </div>
        </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card-body text-center map" style="width:100%; height:30vh" id='map'></div>
                        </div>
                      </div>
                    <div class="row question" style="display: flex;margin-top:10px !important">
                            <div class="col-2"></div>
                            <div class="col-1">
                                <svg class="icon-location" style="width:1.2vw;"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#2fa5ee" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                            </div>
                            <div class="col-3">
                                <label>: Lokasi {{$data->nama}}</label>
                            </div>
                            <div class="col-1">
                                <svg class="icon-location" style="width:1.2vw;"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff0000" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>                                
                            </div>
                            <div class="col-3">
                                <label>: PT Industri Kereta Api</label>
                            </div>
                            <div class="col-2"></div>
                                
                    </div>

                    <div class="row question" style="display: flex;margin-top:10px !important">
                        <div class="col">
                            <label for="">Waktu Absen Masuk</label>
                            <input class="form-control" type="text" value="{{$data->tanggal}} {{$data->jam}}" aria-label="readonly input example" readonly>
                            <br>
                            <label for="">Kehadiran</label>
                            <input class="form-control" type="text" value="{{$data->status}}" aria-label="readonly input example" readonly>
                            <br>
                            <label for="">Keterangan</label>
                            <input class="form-control" type="text" value="{{$data->keterangan}}" aria-label="readonly input example" readonly>
                            <br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button onclick="window.location.href='{{ url('/admin/absenmasuk') }}'" class="btn btn-secondary form-control"><label>Kembali</label></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoic2F0cmlpYWRhZmZhIiwiYSI6ImNsaDA5Z3lsYzBkOXozbHBxMmtzaTE0djUifQ.GvxtJBL6YN8PIrh5t2pT9g';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        style: 'mapbox://styles/mapbox/streets-v12', // style URL
        center: [{{$data['longitude']}},{{$data['latitude']}}], // starting position [lng, lat]
        //center: [111.523258, -7.617921], //starting position [lng, lat]     INI KOORDINAT INKA (NANTI DIGANTI KOORDINAT KITA)
        zoom: 15, // starting zoom

    });
    // Inisialisasi marker
const marker = new mapboxgl.Marker({ color: "#FF0000" })
    .setLngLat([111.525480, -7.617241]) // Jangan Diganti
    .addTo(map);

    const markerUser = new mapboxgl.Marker()
    .setLngLat([{{$data['longitude']}}, {{$data['latitude']}}])
    .addTo(map);

 
</script>
@endsection
