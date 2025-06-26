@extends('auth.induk')

@section('title')
Masuk - E-JobDemo
@endsection

@section('content-title')
Selamat Kembali!
@endsection

@section('content-subtitle')
Masuk ke akaun anda untuk meneruskan pencarian kerja
@endsection

@section('content')

@include('alerts')

<form method="POST" action="{{ route('login') }}">
    @csrf
    
    <div class="mb-3">
        <label for="email" class="form-label">
            <i class="bi bi-envelope me-2"></i>Alamat Emel
        </label>
        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
               value="{{ old('email') }}" required autofocus placeholder="Masukkan alamat emel anda">
        @error('email')
            <div class="invalid-feedback">
                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">
            <i class="bi bi-lock me-2"></i>Kata Laluan
        </label>
        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
               required placeholder="Masukkan kata laluan anda">
        @error('password')
            <div class="invalid-feedback">
                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">
                Ingat saya
            </label>
        </div>
        <a href="{{ route('password.request') }}" class="auth-link">
            <i class="bi bi-question-circle me-1"></i>Lupa kata laluan?
        </a>
    </div>
    
    <div class="d-grid mb-4">
        <button type="submit" class="btn btn-custom btn-primary-custom">
            <i class="bi bi-box-arrow-in-right me-2"></i>Masuk ke Akaun
        </button>
    </div>
    
    <div class="text-center">
        <p class="mb-0">Belum mempunyai akaun? 
            <a href="{{ route('register') }}" class="auth-link">
                <i class="bi bi-person-plus me-1"></i>Daftar sekarang
            </a>
        </p>
    </div>
</form>
@endsection