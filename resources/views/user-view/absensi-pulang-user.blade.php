<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ABSENSI MAGANG DIVISI PPA</title>
    <link rel="stylesheet" href="{{asset('asset/css/user-view.css')}}">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="body">
    <div class="container text-center">
        <div class="row">
            <div class="col" style="height:20vw">
                <div class="card" style="width: 100%;heigth:100%">
                    <div class="row row-top">
                        <div class="col-3">
                            <img src="{{ asset('asset/images/logo-inka.png')}}" class="card-img-top" style="padding:10px" alt="logo-inka" >
                        </div>
                        <div class="col-5"></div>
                        <div class="col-4">
                            <div class="group-time">
                                <h3 class="currentDate" id="currentDate"></h3>
                                <div id="time"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <h1 class="card-title">Absensi Pulang</h1>
                        <img class="profile-picture" src="{{ asset('asset/images/man.png')}}" alt="profile">
                      <div class="card-info">
                        <h3 class="greeting">Halo {{$user->name}}, Silahkan kirim laporan harian sebelum pulang</h3>
                      </div>
                        <div class="card-form">
                            <form action="{{ url('/cek-map-pulang') }}" method="post" enctype="multipart/form-data" id="attendanceForm">
                                @csrf
                                <input type="hidden" name="attendance_type" id="attendanceTypeInput" value="">
                                <input type="hidden" name="latitude" id="latitudeInput">
                                <input type="hidden" name="longitude" id="longitudeInput">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-8">
                                        <br>
                                        <input type="text" class="form-control" name="resume_title" placeholder="Judul Laporan" id="resume_title" value="{{ old('resume_title') }}">
                                        @error('resume_title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <br>
                                        <textarea name="text_resume" id="text_resume" class="form-control" placeholder="Keterangan">{{ old('text_resume') }}</textarea>
                                        <br>
                                        <input type="file" name="pdf_resume" id="pdf_resume" class="form-control">
                                        @error('pdf_resume')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-8">
                                        <div class="row"  style="border:1px solid #0000">
                                            <input onclick="setAttendanceTypeAndSubmit('Pulang')" class="btn btn-secondary form-control" type="button" value="Pulang">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                            
                            </div>
                        </form>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    

    <script>
        function setAttendanceTypeAndSubmit(type) {
            document.getElementById('attendanceTypeInput').value = type;
            getLocationAndSubmit();
        }
        
        function getLocationAndSubmit() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById('latitudeInput').value = position.coords.latitude;
                    document.getElementById('longitudeInput').value = position.coords.longitude;
                    document.getElementById('attendanceForm').submit();
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
        </script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dateElement = document.getElementById("currentDate");

        var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        var currentDate = new Date();
        var dayOfWeek = days[currentDate.getDay()];
        var dayOfMonth = currentDate.getDate();
        var month = months[currentDate.getMonth()];
        var year = currentDate.getFullYear();

        dateElement.innerHTML = "<h3 class='currentDate'>" + dayOfWeek + ", " + dayOfMonth + " " + month + " " + year + "</h3>";
    });
</script>

<script>
    function updateTime() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        // Formatting to have leading zeros if needed
        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        var timeString = hours + ':' + minutes + ':' + seconds;
        document.getElementById('time').innerText = timeString;
    }
    updateTime(); // Initial call to display the time immediately
    setInterval(updateTime, 1000); // Update the time every second
</script>
</body>
</html>

