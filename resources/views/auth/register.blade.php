@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card">
                <div class="card-header">{{ __('Registrasi') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Nama Lengkap') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Alamat E-mail') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Jenis Kelamin') }}</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_male"
                                        value="male" {{ old('gender')=='male' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="gender_male">Laki - Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_female"
                                        value="female" {{ old('gender')=='female' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="gender_female">Perempuan</label>
                                </div>
                            </div>
                            @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="student_id" class="form-label">{{ __('NIM / NISN') }}</label>
                            <input id="student_id" type="text"
                                class="form-control @error('student_id') is-invalid @enderror" name="student_id"
                                value="{{ old('student_id') }}" required autocomplete="student_id" autofocus>
                            @error('student_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="school" class="form-label">{{ __('Asal Sekolah / Universitas') }}</label>
                            <input id="school" type="text" class="form-control @error('school') is-invalid @enderror"
                                name="school" value="{{ old('school') }}" required autocomplete="school">
                            @error('school')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Kata Sandi') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Konfirmasi Kata Sandi') }}</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="mb-0 row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary form-control">{{ __('Registrasi') }}</button>
                            </div>
                            <div class="col">
                                <a href="javascript:history.back()" class="btn btn-secondary form-control">Kembali</a>
                            </div>
                            
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>
@endsection