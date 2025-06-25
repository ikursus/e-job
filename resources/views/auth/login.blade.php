@extends('auth.induk')

@section('title')
Halaman Login
@endsection

@section('content-title')
Log Masuk Pengguna
@endsection

@section('content')

@include('alerts')

<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" required autofocus>
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <label for="password">Kata Laluan</label>
        <input id="password" type="password" name="password" class="form-control" required>
        @error('password')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div class="mt-2">
        <a href="{{ route('password.request') }}">Lupa kata laluan?</a>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Log Masuk</button>
    </div>
</form>
@endsection

@push('custom-js')
<script>
    alert('Selamat datang ke halaman login!');
</script>
@endpush