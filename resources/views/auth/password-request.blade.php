@extends('auth.induk')

@section('title', 'Password Reset Request')

@section('content-title')
Permintaan Reset Kata Laluan
@endsection

@section('content')
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" class="form-control" required autofocus>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Hantar Reset Link</button>
    </div>
</form>
@endsection