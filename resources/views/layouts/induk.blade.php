<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'E-JobDemo - Platform Tawaran Kerja Terbaik')</title>
    
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
            background-color: #ffffff;
        }
        
        /* Navigation Styles */
        .navbar-custom {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            padding: 1rem 0;
        }
        
        .navbar-custom.scrolled {
            background: rgba(15, 23, 42, 0.98);
            padding: 0.5rem 0;
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
        
        /* Card Styles */
        .card-custom {
            border: none;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .card-custom:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }
        
        /* Section Styles */
        .section-padding {
            padding: 5rem 0;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }
        
        .section-subtitle {
            font-size: 1.25rem;
            color: var(--secondary-color);
            margin-bottom: 3rem;
        }
        
        /* Footer Styles */
        .footer-custom {
            background: var(--dark-color);
            color: rgba(255, 255, 255, 0.8);
            padding: 3rem 0 1rem;
        }
        
        .footer-custom h5 {
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
        
        /* Utility Classes */
        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .bg-gradient-primary {
            background: var(--gradient-primary);
        }
        
        .bg-gradient-secondary {
            background: var(--gradient-secondary);
        }
        
        /* Animation Classes */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }
            
            .section-subtitle {
                font-size: 1.1rem;
            }
            
            .btn-custom {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-custom" id="mainNavbar">
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
                        <a class="nav-link" href="#jobs">Kerja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#categories">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Hubungi</a>
                    </li>
                    @guest
                        <li class="nav-item ms-2">
                            <a class="nav-link btn btn-outline-light btn-custom" href="{{ route('login') }}">Masuk</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link btn btn-light btn-custom" href="{{ route('register') }}">Daftar</a>
                        </li>
                    @else
                        <li class="nav-item dropdown ms-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-briefcase me-2"></i>Permohonan Saya</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right me-2"></i>Log Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5><i class="bi bi-briefcase-fill me-2"></i>E-JobDemo</h5>
                    <p class="mb-3">Platform tawaran kerja terbaik di Malaysia. Menghubungkan pencari kerja dengan majikan terkemuka untuk membina kerjaya yang cemerlang.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-decoration-none">
                            <i class="bi bi-facebook fs-5"></i>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <i class="bi bi-twitter fs-5"></i>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <i class="bi bi-linkedin fs-5"></i>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <i class="bi bi-instagram fs-5"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Pautan Pantas</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/">Utama</a></li>
                        <li class="mb-2"><a href="#">Cari Kerja</a></li>
                        <li class="mb-2"><a href="#">Syarikat</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Kategori</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Teknologi IT</a></li>
                        <li class="mb-2"><a href="#">Pemasaran</a></li>
                        <li class="mb-2"><a href="#">Kewangan</a></li>
                        <li class="mb-2"><a href="#">Kesihatan</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Sokongan</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Pusat Bantuan</a></li>
                        <li class="mb-2"><a href="#">Syarat & Terma</a></li>
                        <li class="mb-2"><a href="#">Dasar Privasi</a></li>
                        <li class="mb-2"><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Newsletter</h5>
                    <p class="small mb-3">Dapatkan kemas kini terkini tentang peluang kerja</p>
                    <form class="newsletter-form">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Emel anda" required>
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-send"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; {{ date('Y') }} E-JobDemo. Hak Cipta Terpelihara.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">Dibina dengan <i class="bi bi-heart-fill text-danger"></i> di Malaysia</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.pageYOffset > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.fade-in').forEach(el => {
                observer.observe(el);
            });
        });

        // Newsletter subscription
        document.querySelector('.newsletter-form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            
            if (email.trim() === '') {
                alert('Sila masukkan alamat emel');
                return;
            }
            
            // Here you would typically send the email to your backend
            alert('Terima kasih! Anda telah berjaya melanggan newsletter kami.');
            this.querySelector('input[type="email"]').value = '';
        });
    </script>
    
    @stack('scripts')
</body>
</html>