@extends('auth.induk')

@section('content-title')
Pendaftaran Pengguna Baru
@endsection

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama Penuh</label>
        <input type="text" class="form-control" id="name" name="name" required autofocus placeholder="Nama penuh anda">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Emel</label>
        <input type="email" class="form-control" id="email" name="email" required placeholder="Emel aktif">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Kata Laluan</label>
        <input type="password" class="form-control" id="password" name="password" required placeholder="Kata laluan">
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Sahkan Kata Laluan</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Ulang kata laluan">
    </div>
    <div class="d-grid mb-3">
        <button type="submit" class="btn btn-gradient btn-lg">Daftar</button>
    </div>
    <div class="text-center">
        <a href="#" class="text-primary text-decoration-none">Sudah ada akaun? Log Masuk</a>
    </div>
</form>
@endsection

@section('title')
Halaman Pendaftaran
@endsection