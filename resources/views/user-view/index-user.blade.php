@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/asset/css/user-view.css">
<div class="container">
    <div class="text-center">
        @if (session('message'))
        <div class="alert-con">
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <label>{{ session('message') }}</label>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col">
                <img src="{{ asset('asset/images/logo-inka.png')}}" class="card-img-index"
                    style="padding:10px; width:50%" alt="logo-inka">
            </div>
        </div>
        <div class="row">
            <div class="col" style="margin-bottom:20px">
                <h1 class="h1-index"> Absensi Magang Departemen PPA</h1>
            </div>
        </div>
        <div class="index-menu">
            <a class="text-center" href="{{url('/absensi-masuk')}}">
                <div class="card card-index">
                    <svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#373435"
                            d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                    </svg>
                    <h2>Absensi Masuk</h2>
                </div>
            </a>
            <a class="text-center" href="{{url('/absensi-pulang')}}">
                <div class="card card-index">
                    <svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#373435"
                            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                    </svg>
                    <h2>Absensi Pulang</h2>
                </div>
            </a>
            <a class="text-center" href="{{url('/riwayat')}}">
                <div class="card card-index">
                    <svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#373534"
                            d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z" />
                    </svg>
                    <h2>Riwayat Absensi</h2>
                </div>
            </a>
        </div>
    </div>
</div>
</body>

</html>
@endsection

