@extends('auth.induk')

@section('title')
Reset Kata Laluan - E-JobDemo
@endsection

@section('content-title')
Lupa Kata Laluan?
@endsection

@section('content-subtitle')
Masukkan alamat emel anda dan kami akan hantar pautan untuk reset kata laluan
@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        <i class="bi bi-check-circle me-2"></i>{{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    
    <div class="mb-4">
        <label for="email" class="form-label">
            <i class="bi bi-envelope me-2"></i>Alamat Emel
        </label>
        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
               value="{{ old('email') }}" required autofocus placeholder="Masukkan alamat emel akaun anda">
        @error('email')
            <div class="invalid-feedback">
                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="d-grid mb-4">
        <button type="submit" class="btn btn-custom btn-primary-custom">
            <i class="bi bi-send me-2"></i>Hantar Pautan Reset
        </button>
    </div>
    
    <div class="text-center">
        <p class="mb-0">Ingat kata laluan anda? 
            <a href="{{ route('login') }}" class="auth-link">
                <i class="bi bi-arrow-left me-1"></i>Kembali ke halaman masuk
            </a>
        </p>
    </div>
</form>
@endsection