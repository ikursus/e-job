@extends('auth.induk')

@section('title')
Daftar - E-JobDemo
@endsection

@section('content-title')
Cipta Akaun Baru
@endsection

@section('content-subtitle')
Sertai ribuan pencari kerja dan majikan di platform kami
@endsection

@section('content')
<form method="POST" action="{{ route('register.store') }}">
    @csrf
    
    <div class="mb-3">
        <label for="name" class="form-label">
            <i class="bi bi-person me-2"></i>Nama Penuh
        </label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" 
               value="{{ old('name') }}" required autofocus placeholder="Masukkan nama penuh anda">
            @error('name')
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                </div>
            @enderror
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">
            <i class="bi bi-telephone me-2"></i>Nombor Telefon
        </label>
        <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
            value="{{ old('phone') }}" required placeholder="Masukkan nombor telefon anda">
            @error('phone')
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                </div>
            @enderror
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">
            <i class="bi bi-envelope me-2"></i>Alamat Emel
        </label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" 
               value="{{ old('email') }}" required placeholder="Masukkan alamat emel aktif">
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
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" 
               required placeholder="Minimum 8 aksara">
        @error('password')
            <div class="invalid-feedback">
                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">
            <i class="bi bi-shield-check me-2"></i>Sahkan Kata Laluan
        </label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" 
               required placeholder="Ulang kata laluan yang sama">
    </div>
    
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="terms" required>
            <label class="form-check-label" for="terms">
                Saya bersetuju dengan <a href="#" class="auth-link">Terma & Syarat</a> dan <a href="#" class="auth-link">Dasar Privasi</a>
            </label>
        </div>
    </div>
    
    <div class="d-grid mb-4">
        <button type="submit" class="btn btn-custom btn-primary-custom">
            <i class="bi bi-person-plus me-2"></i>Cipta Akaun
        </button>
    </div>
    
    <div class="text-center">
        <p class="mb-0">Sudah mempunyai akaun? 
            <a href="{{ route('login') }}" class="auth-link">
                <i class="bi bi-box-arrow-in-right me-1"></i>Masuk sekarang
            </a>
        </p>
    </div>
</form>
@endsection