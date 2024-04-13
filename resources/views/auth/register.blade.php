@extends('layouts.guest')

@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('Register') }}</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="{{ __('Name') }}" required autocomplete="name" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('name')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="{{ __('Email') }}" required autocomplete="email" value="{{ old('email') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                    placeholder="{{ __('Alamat') }}" required autocomplete="alamat" value="{{ old('alamat') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fa fa-map-pin"></span>
                    </div>
                </div>
                @error('alamat')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="text" name="nomor_sim" class="form-control @error('nomor_sim') is-invalid @enderror"
                    placeholder="{{ __('Nomor SIM') }}" required autocomplete="nomor_sim" value="{{ old('nomor_sim') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('nomor_sim')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="text" name="tel" class="form-control @error('tel') is-invalid @enderror"
                    placeholder="{{ __('Nomor Telepon') }}" required autocomplete="tel" value="{{ old('tel') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('tel')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="{{ __('Password') }}" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
