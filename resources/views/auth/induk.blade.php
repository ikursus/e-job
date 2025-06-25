<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Authentication')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('custom-css')
</head>
<body class="bg-light">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6f42c1; box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,.075); margin-bottom: 1.5rem;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">E-JobDemo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navigation Bar -->
    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="w-100" style="max-width: 400px;">

            <h2 class="text-center mb-4">
                @yield('content-title', 'Authentication')
            </h2>

            <div class="card shadow-sm">
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer mt-auto py-3 w-100 shadow-sm" style="background-color: #6f42c1;">
        <div class="container">
            <div class="row text-center text-md-start">
                <!-- Column 1: Maklumat Sistem -->
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="fw-bold text-white">{{ config('app.name') }}</h6>
                    <p class="mb-1 text-white-50">Platform carian kerja dan pengurusan permohonan secara atas talian.</p>
                    <small class="text-white-50">&copy; {{ date('Y') }} E-JobDemo</small>
                </div>
                <!-- Column 2: Navigasi -->
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="fw-bold text-white">Navigasi</h6>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-decoration-none text-white-50">Home</a></li>
                        <li><a href="{{ route('login') }}" class="text-decoration-none text-white-50">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-decoration-none text-white-50">Register</a></li>
                        <li><a href="{{ route('contact') }}" class="text-decoration-none text-white-50">Contact</a></li>
                    </ul>
                </div>
                <!-- Column 3: Terma Ringkas -->
                <div class="col-md-4">
                    <h6 class="fw-bold text-white">Terma Ringkas</h6>
                    <p class="mb-1 text-white-50">Penggunaan laman ini tertakluk kepada terma & syarat. Data pengguna dilindungi dan tidak akan dikongsi tanpa kebenaran.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('custom-js')
</body>
</html>