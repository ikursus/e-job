<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Authentication - E-JobDemo')</title>
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary-color: #64748b;
            --success-color: #059669;
            --info-color: #0891b2;
            --warning-color: #d97706;
            --danger-color: #dc2626;
            --light-color: #f8fafc;
            --dark-color: #0f172a;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(45deg, #f8f9fa, #e9ecef);
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--dark-color);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        /* Navigation Styles */
        .navbar-custom {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.75rem;
            color: #ffffff !important;
            text-decoration: none;
        }
        
        .navbar-brand:hover {
            color: var(--primary-color) !important;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
            border-radius: 8px;
        }
        
        .nav-link:hover {
            color: var(--primary-color) !important;
            background-color: rgba(37, 99, 235, 0.1);
        }
        
        .nav-link.active {
            color: var(--primary-color) !important;
            background-color: rgba(37, 99, 235, 0.15);
        }
        
        /* Auth Container Styles */
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
        }
        
        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: var(--shadow-xl);
            padding: 3rem;
            width: 100%;
            max-width: 450px;
            transition: all 0.3s ease;
        }
        
        .auth-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
        }
        
        .auth-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-color);
            text-align: center;
            margin-bottom: 0.5rem;
        }
        
        .auth-subtitle {
            color: var(--secondary-color);
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1rem;
        }
        
        /* Form Styles */
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #ffffff;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            background-color: #ffffff;
        }
        
        .form-control.is-invalid {
            border-color: var(--danger-color);
        }
        
        .invalid-feedback {
            color: var(--danger-color);
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        
        /* Button Styles */
        .btn-custom {
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            text-transform: none;
            letter-spacing: 0.025em;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
            width: 100%;
            font-size: 1rem;
        }
        
        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        
        .btn-custom:active {
            transform: translateY(0);
        }
        
        .btn-primary-custom {
            background: var(--gradient-primary);
            color: white;
        }
        
        .btn-outline-custom {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }
        
        .btn-outline-custom:hover {
            background: var(--primary-color);
            color: white;
        }
        
        /* Link Styles */
        .auth-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .auth-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        /* Footer Styles */
        .footer-custom {
            background: var(--dark-color);
            color: rgba(255, 255, 255, 0.8);
            padding: 2rem 0 1rem;
            margin-top: auto;
        }
        
        .footer-custom h6 {
            color: white;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .footer-custom a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-custom a:hover {
            color: var(--primary-color);
        }
        
        /* Animation Classes */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s ease forwards;
        }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .auth-card {
                padding: 2rem;
                margin: 1rem;
            }
            
            .auth-title {
                font-size: 1.75rem;
            }
        }
    </style>
    
    @stack('custom-css')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="bi bi-briefcase-fill me-2"></i>E-JobDemo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Hubungi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="auth-container">
        <div class="auth-card fade-in">
            <div class="text-center mb-4">
                <i class="bi bi-briefcase-fill text-primary" style="font-size: 3rem;"></i>
            </div>
            
            <h2 class="auth-title">
                @yield('content-title', 'Authentication')
            </h2>
            
            <p class="auth-subtitle">
                @yield('content-subtitle', 'Selamat datang ke platform tawaran kerja terbaik')
            </p>

            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-custom">
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6><i class="bi bi-briefcase-fill me-2"></i>E-JobDemo</h6>
                    <p class="mb-1">Platform carian kerja dan pengurusan permohonan secara atas talian.</p>
                    <small>&copy; {{ date('Y') }} E-JobDemo. Hak Cipta Terpelihara.</small>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6>Navigasi Pantas</h6>
                    <ul class="list-unstyled">
                        <li><a href="/">Utama</a></li>
                        <li><a href="{{ route('login') }}">Masuk</a></li>
                        <li><a href="{{ route('register') }}">Daftar</a></li>
                        <li><a href="{{ route('contact') }}">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6>Sokongan</h6>
                    <p class="mb-1">Data pengguna dilindungi dan tidak akan dikongsi tanpa kebenaran.</p>
                    <div class="d-flex gap-3 justify-content-center justify-content-md-start">
                        <a href="#"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#"><i class="bi bi-twitter fs-5"></i></a>
                        <a href="#"><i class="bi bi-linkedin fs-5"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Add fade-in animation on page load
        document.addEventListener('DOMContentLoaded', function() {
            const fadeElements = document.querySelectorAll('.fade-in');
            fadeElements.forEach((el, index) => {
                setTimeout(() => {
                    el.style.animationDelay = `${index * 0.1}s`;
                }, 100);
            });
        });
    </script>
    
    @stack('custom-js')
</body>
</html>