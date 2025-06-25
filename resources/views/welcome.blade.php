<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-JobDemo - Platform Tawaran Kerja Terbaik</title>
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
            --success-color: #28a745;
            --info-color: #17a2b8;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.3);
            z-index: 1;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .search-box {
            background: white;
            border-radius: 50px;
            padding: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .stats-section {
            background: linear-gradient(45deg, #f8f9fa, #e9ecef);
        }
        
        .job-card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        
        .category-item {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 15px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            padding: 2rem;
        }
        
        .category-item:hover {
            transform: scale(1.05);
            color: white;
            text-decoration: none;
        }
        
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        
        .btn-custom {
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }
        
        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: rgba(0,0,0,0.9); backdrop-filter: blur(10px);">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="bi bi-briefcase-fill me-2"></i>E-JobDemo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Utama</a>
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
                        <a class="nav-link btn btn-outline-light btn-custom ms-2" href="{{ route('login') }}">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-light btn-custom ms-2" href="{{ route('register') }}">Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Cari Kerja Impian Anda</h1>
                    <p class="lead mb-4">Platform tawaran kerja terbaik di Malaysia. Temui ribuan peluang kerja dari syarikat-syarikat terkemuka.</p>
                    
                    <!-- Search Box -->
                    <div class="search-box mb-4">
                        <form class="row g-2">
                            <div class="col-md-5">
                                <input type="text" class="form-control border-0" placeholder="Cari jawatan...">
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0">
                                    <option>Pilih Lokasi</option>
                                    <option>Kuala Lumpur</option>
                                    <option>Selangor</option>
                                    <option>Penang</option>
                                    <option>Johor</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary w-100 btn-custom" type="submit">
                                    <i class="bi bi-search me-2"></i>Cari
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="d-flex gap-3">
                        <a href="#jobs" class="btn btn-light btn-custom">
                            <i class="bi bi-eye me-2"></i>Lihat Kerja
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-custom">
                            <i class="bi bi-person-plus me-2"></i>Daftar Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="https://via.placeholder.com/500x400/667eea/ffffff?text=Job+Portal" alt="Job Portal" class="img-fluid rounded-3 shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 mb-4">
                    <div class="card feature-card h-100 p-4">
                        <i class="bi bi-briefcase-fill text-primary" style="font-size: 3rem;"></i>
                        <h3 class="mt-3 mb-2">5,000+</h3>
                        <p class="text-muted">Tawaran Kerja</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card feature-card h-100 p-4">
                        <i class="bi bi-building text-success" style="font-size: 3rem;"></i>
                        <h3 class="mt-3 mb-2">1,200+</h3>
                        <p class="text-muted">Syarikat</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card feature-card h-100 p-4">
                        <i class="bi bi-people-fill text-info" style="font-size: 3rem;"></i>
                        <h3 class="mt-3 mb-2">50,000+</h3>
                        <p class="text-muted">Pengguna Aktif</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card feature-card h-100 p-4">
                        <i class="bi bi-check-circle-fill text-warning" style="font-size: 3rem;"></i>
                        <h3 class="mt-3 mb-2">98%</h3>
                        <p class="text-muted">Kadar Kejayaan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Jobs Section -->
    <section id="jobs" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Kerja Terkini</h2>
                <p class="lead text-muted">Peluang kerja terbaik menanti anda</p>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card job-card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <img src="https://via.placeholder.com/60x60/007bff/ffffff?text=C" alt="Company" class="rounded">
                                <span class="badge bg-success">Penuh Masa</span>
                            </div>
                            <h5 class="card-title">Pembangun Web Senior</h5>
                            <p class="text-muted mb-2">
                                <i class="bi bi-building me-2"></i>Tech Solutions Sdn Bhd
                            </p>
                            <p class="text-muted mb-3">
                                <i class="bi bi-geo-alt me-2"></i>Kuala Lumpur
                            </p>
                            <p class="card-text">Mencari pembangun web berpengalaman untuk projek-projek menarik...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">RM 5,000 - RM 8,000</span>
                                <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card job-card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <img src="https://via.placeholder.com/60x60/28a745/ffffff?text=M" alt="Company" class="rounded">
                                <span class="badge bg-info">Separuh Masa</span>
                            </div>
                            <h5 class="card-title">Pengurus Pemasaran Digital</h5>
                            <p class="text-muted mb-2">
                                <i class="bi bi-building me-2"></i>Marketing Pro Agency
                            </p>
                            <p class="text-muted mb-3">
                                <i class="bi bi-geo-alt me-2"></i>Selangor
                            </p>
                            <p class="card-text">Peluang menarik untuk menguruskan kempen pemasaran digital...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">RM 4,000 - RM 6,500</span>
                                <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card job-card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <img src="https://via.placeholder.com/60x60/dc3545/ffffff?text=D" alt="Company" class="rounded">
                                <span class="badge bg-warning">Kontrak</span>
                            </div>
                            <h5 class="card-title">Pereka Grafik</h5>
                            <p class="text-muted mb-2">
                                <i class="bi bi-building me-2"></i>Creative Studio
                            </p>
                            <p class="text-muted mb-3">
                                <i class="bi bi-geo-alt me-2"></i>Penang
                            </p>
                            <p class="card-text">Sertai pasukan kreatif kami untuk menghasilkan karya yang menakjubkan...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">RM 3,500 - RM 5,000</span>
                                <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        
            <div class="text-center mt-5">
                <a href="#" class="btn btn-primary btn-custom btn-lg">
                    <i class="bi bi-eye me-2"></i>Lihat Semua Kerja
                </a>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Kategori Kerja Popular</h2>
                <p class="lead text-muted">Pilih bidang yang sesuai dengan minat anda</p>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <a href="#" class="category-item text-center">
                        <i class="bi bi-code-slash" style="font-size: 3rem;"></i>
                        <h5 class="mt-3 mb-2">Teknologi IT</h5>
                        <p class="mb-0">250+ Kerja</p>
                    </a>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4">
                    <a href="#" class="category-item text-center">
                        <i class="bi bi-megaphone" style="font-size: 3rem;"></i>
                        <h5 class="mt-3 mb-2">Pemasaran</h5>
                        <p class="mb-0">180+ Kerja</p>
                    </a>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4">
                    <a href="#" class="category-item text-center">
                        <i class="bi bi-calculator" style="font-size: 3rem;"></i>
                        <h5 class="mt-3 mb-2">Kewangan</h5>
                        <p class="mb-0">120+ Kerja</p>
                    </a>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4">
                    <a href="#" class="category-item text-center">
                        <i class="bi bi-palette" style="font-size: 3rem;"></i>
                        <h5 class="mt-3 mb-2">Kreatif & Seni</h5>
                        <p class="mb-0">95+ Kerja</p>
                    </a>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4">
                    <a href="#" class="category-item text-center">
                        <i class="bi bi-heart-pulse" style="font-size: 3rem;"></i>
                        <h5 class="mt-3 mb-2">Kesihatan</h5>
                        <p class="mb-0">85+ Kerja</p>
                    </a>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4">
                    <a href="#" class="category-item text-center">
                        <i class="bi bi-mortarboard" style="font-size: 3rem;"></i>
                        <h5 class="mt-3 mb-2">Pendidikan</h5>
                        <p class="mb-0">75+ Kerja</p>
                    </a>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4">
                    <a href="#" class="category-item text-center">
                        <i class="bi bi-truck" style="font-size: 3rem;"></i>
                        <h5 class="mt-3 mb-2">Logistik</h5>
                        <p class="mb-0">65+ Kerja</p>
                    </a>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4">
                    <a href="#" class="category-item text-center">
                        <i class="bi bi-shop" style="font-size: 3rem;"></i>
                        <h5 class="mt-3 mb-2">Runcit</h5>
                        <p class="mb-0">55+ Kerja</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Bagaimana Ia Berfungsi</h2>
                <p class="lead text-muted">Tiga langkah mudah untuk mendapat kerja impian</p>
            </div>
            
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <div class="position-relative">
                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-person-plus text-white" style="font-size: 2rem;"></i>
                        </div>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">1</span>
                    </div>
                    <h4 class="mt-4 mb-3">Daftar Akaun</h4>
                    <p class="text-muted">Buat akaun percuma dan lengkapkan profil anda dengan maklumat yang diperlukan.</p>
                </div>
                
                <div class="col-md-4 text-center mb-4">
                    <div class="position-relative">
                        <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-search text-white" style="font-size: 2rem;"></i>
                        </div>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">2</span>
                    </div>
                    <h4 class="mt-4 mb-3">Cari Kerja</h4>
                    <p class="text-muted">Gunakan carian canggih kami untuk mencari kerja yang sesuai dengan kemahiran anda.</p>
                </div>
                
                <div class="col-md-4 text-center mb-4">
                    <div class="position-relative">
                        <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-send text-white" style="font-size: 2rem;"></i>
                        </div>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">3</span>
                    </div>
                    <h4 class="mt-4 mb-3">Mohon Kerja</h4>
                    <p class="text-muted">Hantar permohonan anda dengan mudah dan tunggu respons dari majikan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Apa Kata Pengguna Kami</h2>
                <p class="lead text-muted">Testimoni dari pengguna yang berjaya</p>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center p-4">
                            <img src="https://via.placeholder.com/80x80/007bff/ffffff?text=A" alt="User" class="rounded-circle mb-3">
                            <h5>Ahmad Rahman</h5>
                            <p class="text-muted small">Pembangun Web</p>
                            <p class="fst-italic">"Platform yang sangat membantu! Saya berjaya mendapat kerja impian dalam masa 2 minggu sahaja."</p>
                            <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center p-4">
                            <img src="https://via.placeholder.com/80x80/28a745/ffffff?text=S" alt="User" class="rounded-circle mb-3">
                            <h5>Siti Nurhaliza</h5>
                            <p class="text-muted small">Pengurus Pemasaran</p>
                            <p class="fst-italic">"Interface yang user-friendly dan banyak pilihan kerja. Sangat recommend untuk pencari kerja!"</p>
                            <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center p-4">
                            <img src="https://via.placeholder.com/80x80/dc3545/ffffff?text=L" alt="User" class="rounded-circle mb-3">
                            <h5>Lim Wei Ming</h5>
                            <p class="text-muted small">Pereka Grafik</p>
                            <p class="fst-italic">"Proses permohonan yang mudah dan pantas. Terima kasih E-JobDemo!"</p>
                            <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <h2 class="display-5 fw-bold mb-4">Tentang E-JobDemo</h2>
                    <p class="lead mb-4">Kami adalah platform tawaran kerja terkemuka di Malaysia yang menghubungkan pencari kerja dengan majikan terbaik.</p>
                    <p class="mb-4">Dengan lebih 5,000 tawaran kerja aktif dan 1,200 syarikat berdaftar, kami komited untuk membantu anda mencari peluang kerjaya yang sesuai.</p>
                    
                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-success me-3" style="font-size: 1.5rem;"></i>
                                <span>Percuma untuk pencari kerja</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-success me-3" style="font-size: 1.5rem;"></i>
                                <span>Proses permohonan mudah</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-success me-3" style="font-size: 1.5rem;"></i>
                                <span>Sokongan 24/7</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-success me-3" style="font-size: 1.5rem;"></i>
                                <span>Majikan terverifikasi</span>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('register') }}" class="btn btn-primary btn-custom btn-lg">
                        <i class="bi bi-rocket-takeoff me-2"></i>Mulakan Sekarang
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="https://via.placeholder.com/600x400/f8f9fa/6c757d?text=About+Us" alt="About Us" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container text-center text-white">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold mb-4">Sedia untuk Memulakan Kerjaya Baru?</h2>
                    <p class="lead mb-4">Sertai ribuan pencari kerja yang telah berjaya mencari peluang kerjaya melalui platform kami.</p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="{{ route('register') }}" class="btn btn-light btn-custom btn-lg">
                            <i class="bi bi-person-plus me-2"></i>Daftar Percuma
                        </a>
                        <a href="#jobs" class="btn btn-outline-light btn-custom btn-lg">
                            <i class="bi bi-search me-2"></i>Cari Kerja
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="mb-3">
                        <i class="bi bi-briefcase-fill me-2"></i>E-JobDemo
                    </h5>
                    <p class="text-light mb-3">Platform tawaran kerja terkemuka di Malaysia yang menghubungkan pencari kerja dengan peluang kerjaya terbaik.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-light">
                            <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="#" class="text-light">
                            <i class="bi bi-twitter" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="#" class="text-light">
                            <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="#" class="text-light">
                            <i class="bi bi-linkedin" style="font-size: 1.5rem;"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="mb-3">Pautan Pantas</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Cari Kerja</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Syarikat</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Kategori</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Blog</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="mb-3">Untuk Majikan</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Siarkan Kerja</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Cari Bakat</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Harga</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Sumber</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-4">
                    <h6 class="mb-3">Hubungi Kami</h6>
                    <p class="text-light mb-2">
                        <i class="bi bi-geo-alt me-2"></i>
                        Kuala Lumpur, Malaysia
                    </p>
                    <p class="text-light mb-2">
                        <i class="bi bi-envelope me-2"></i>
                        info@ejobdemo.com
                    </p>
                    <p class="text-light mb-3">
                        <i class="bi bi-phone me-2"></i>
                        +60 3-1234 5678
                    </p>
                    
                    <h6 class="mb-3">Langgan Newsletter</h6>
                    <form class="d-flex">
                        <input type="email" class="form-control me-2" placeholder="Emel anda">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-send"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2024 E-JobDemo. Hak Cipta Terpelihara.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-light text-decoration-none me-3">Dasar Privasi</a>
                    <a href="#" class="text-light text-decoration-none me-3">Terma & Syarat</a>
                    <a href="#" class="text-light text-decoration-none">Bantuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="btn btn-primary position-fixed bottom-0 end-0 m-4 rounded-circle" id="backToTop" style="width: 50px; height: 50px; display: none; z-index: 1000;">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- Bootstrap 5.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
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

        // Back to top button functionality
        const backToTopButton = document.getElementById('backToTop');
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.style.display = 'block';
            } else {
                backToTopButton.style.display = 'none';
            }
        });

        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Navbar background change on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.pageYOffset > 50) {
                navbar.style.background = 'rgba(0,0,0,0.95)';
            } else {
                navbar.style.background = 'rgba(0,0,0,0.9)';
            }
        });

        // Animation on scroll (simple fade in effect)
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.feature-card, .job-card, .category-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });

        // Search form enhancement
        document.querySelector('.search-box form').addEventListener('submit', function(e) {
            e.preventDefault();
            const searchTerm = this.querySelector('input[type="text"]').value;
            const location = this.querySelector('select').value;
            
            if (searchTerm.trim() === '') {
                alert('Sila masukkan kata kunci pencarian');
                return;
            }
            
            // Here you would typically redirect to search results page
            console.log('Searching for:', searchTerm, 'in', location);
            alert(`Mencari "${searchTerm}" di ${location}`);
        });

        // Newsletter subscription
        document.querySelector('footer form').addEventListener('submit', function(e) {
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

        // Add loading animation to buttons
        document.querySelectorAll('.btn-custom').forEach(button => {
            button.addEventListener('click', function() {
                if (this.getAttribute('href') && this.getAttribute('href').startsWith('#')) {
                    return; // Skip for anchor links
                }
                
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Memuat...';
                this.disabled = true;
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 1000);
            });
        });
    </script>
</body>
</html>

