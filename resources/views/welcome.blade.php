@extends('layouts.induk')

@section('title', 'E-JobDemo - Platform Tawaran Kerja Terbaik')

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        color: white;
        position: relative;
        overflow: hidden;
        padding-top: 80px;
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
        border-radius: 20px;
        padding: 15px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        backdrop-filter: blur(10px);
    }
    
    .hero-image {
        position: relative;
        z-index: 2;
    }
    
    .hero-image img {
        border-radius: 20px;
        box-shadow: 0 25px 50px rgba(0,0,0,0.2);
    }
    
    .stats-section {
        background: linear-gradient(45deg, #f8f9fa, #e9ecef);
        position: relative;
    }
    
    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: none;
        height: 100%;
    }
    
    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    
    .stat-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 2rem;
        color: white;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1a202c;
        margin-bottom: 0.5rem;
    }
    
    .job-card {
        background: white;
        border-radius: 20px;
        padding: 1.5rem;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border: none;
        height: 100%;
    }
    
    .job-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    }
    
    .company-logo {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: white;
        font-size: 1.5rem;
    }
    
    .job-badge {
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    
    .category-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 2rem;
        text-align: center;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        display: block;
        height: 100%;
        border: none;
    }
    
    .category-card:hover {
        transform: scale(1.05) translateY(-5px);
        color: white;
        text-decoration: none;
        box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
    }
    
    .category-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.9;
    }
    
    .process-step {
        text-align: center;
        position: relative;
    }
    
    .process-icon {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2.5rem;
        color: white;
        position: relative;
    }
    
    .process-number {
        position: absolute;
        top: -10px;
        right: -10px;
        width: 35px;
        height: 35px;
        background: #fbbf24;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: white;
        font-size: 1rem;
    }
    
    .testimonial-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        text-align: center;
        height: 100%;
        border: none;
    }
    
    .testimonial-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin: 0 auto 1rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
    }
    
    .cta-section {
        background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="%23ffffff" opacity="0.1"/></svg>') repeat;
        z-index: 1;
    }
    
    .cta-content {
        position: relative;
        z-index: 2;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section id="home" class="hero-section">
    <div class="container hero-content">
        <div class="row align-items-center">
            <div class="col-lg-6 fade-in">
                <h1 class="display-4 fw-bold mb-4">Cari Kerja Impian Anda</h1>
                <p class="lead mb-4">Platform tawaran kerja terbaik di Malaysia. Temui ribuan peluang kerja dari syarikat-syarikat terkemuka dan bina kerjaya cemerlang anda.</p>
                
                <!-- Search Box -->
                <div class="search-box mb-4">
                    <form class="row g-3" id="jobSearchForm">
                        <div class="col-md-5">
                            <input type="text" class="form-control border-0" placeholder="Cari jawatan, syarikat..." name="search">
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0" name="location">
                                <option value="">Pilih Lokasi</option>
                                <option value="kuala-lumpur">Kuala Lumpur</option>
                                <option value="selangor">Selangor</option>
                                <option value="penang">Penang</option>
                                <option value="johor">Johor</option>
                                <option value="perak">Perak</option>
                                <option value="sabah">Sabah</option>
                                <option value="sarawak">Sarawak</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary w-100 btn-custom" type="submit">
                                <i class="bi bi-search me-2"></i>Cari Kerja
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="d-flex flex-wrap gap-3">
                    <a href="#jobs" class="btn btn-light btn-custom">
                        <i class="bi bi-eye me-2"></i>Lihat Kerja Terkini
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-custom">
                        <i class="bi bi-person-plus me-2"></i>Daftar Sekarang
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center hero-image fade-in">
                <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Job Portal" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section section-padding">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 fade-in">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="bi bi-briefcase-fill"></i>
                    </div>
                    <div class="stat-number">5,000+</div>
                    <p class="text-muted mb-0">Tawaran Kerja Aktif</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 fade-in">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="bi bi-building"></i>
                    </div>
                    <div class="stat-number">1,200+</div>
                    <p class="text-muted mb-0">Syarikat Terdaftar</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 fade-in">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="stat-number">50,000+</div>
                    <p class="text-muted mb-0">Pengguna Aktif</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 fade-in">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div class="stat-number">98%</div>
                    <p class="text-muted mb-0">Kadar Kejayaan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Jobs Section -->
<section id="jobs" class="section-padding">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <h2 class="section-title">Kerja Terkini</h2>
            <p class="section-subtitle">Peluang kerja terbaik dari syarikat-syarikat terkemuka menanti anda</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 fade-in">
                <div class="job-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="company-logo bg-primary">
                            TS
                        </div>
                        <span class="job-badge bg-success text-white">Penuh Masa</span>
                    </div>
                    <h5 class="fw-bold mb-2">Pembangun Web Senior</h5>
                    <p class="text-muted mb-2">
                        <i class="bi bi-building me-2"></i>Tech Solutions Sdn Bhd
                    </p>
                    <p class="text-muted mb-3">
                        <i class="bi bi-geo-alt me-2"></i>Kuala Lumpur
                    </p>
                    <p class="mb-3">Mencari pembangun web berpengalaman untuk projek-projek menarik menggunakan teknologi terkini...</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-primary fs-5">RM 5,000 - RM 8,000</span>
                        <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4 fade-in">
                <div class="job-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="company-logo bg-success">
                            MP
                        </div>
                        <span class="job-badge bg-info text-white">Separuh Masa</span>
                    </div>
                    <h5 class="fw-bold mb-2">Pengurus Pemasaran Digital</h5>
                    <p class="text-muted mb-2">
                        <i class="bi bi-building me-2"></i>Marketing Pro Agency
                    </p>
                    <p class="text-muted mb-3">
                        <i class="bi bi-geo-alt me-2"></i>Selangor
                    </p>
                    <p class="mb-3">Peluang menarik untuk menguruskan kempen pemasaran digital dan strategi media sosial...</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-primary fs-5">RM 4,000 - RM 6,500</span>
                        <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4 fade-in">
                <div class="job-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="company-logo bg-danger">
                            CS
                        </div>
                        <span class="job-badge bg-warning text-dark">Kontrak</span>
                    </div>
                    <h5 class="fw-bold mb-2">Pereka Grafik</h5>
                    <p class="text-muted mb-2">
                        <i class="bi bi-building me-2"></i>Creative Studio
                    </p>
                    <p class="text-muted mb-3">
                        <i class="bi bi-geo-alt me-2"></i>Penang
                    </p>
                    <p class="mb-3">Sertai pasukan kreatif kami untuk menghasilkan karya visual yang menakjubkan dan inovatif...</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-primary fs-5">RM 3,500 - RM 5,000</span>
                        <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
                    
        <div class="text-center mt-5 fade-in">
            <a href="#" class="btn btn-primary btn-custom btn-lg">
                <i class="bi bi-eye me-2"></i>Lihat Semua Kerja
            </a>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section id="categories" class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <h2 class="section-title">Kategori Kerja Popular</h2>
            <p class="section-subtitle">Pilih bidang yang sesuai dengan minat dan kemahiran anda</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 fade-in">
                <a href="#" class="category-card">
                    <div class="category-icon">
                        <i class="bi bi-code-slash"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Teknologi IT</h5>
                    <p class="mb-0">250+ Kerja Tersedia</p>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-3 fade-in">
                <a href="#" class="category-card">
                    <div class="category-icon">
                        <i class="bi bi-megaphone"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Pemasaran</h5>
                    <p class="mb-0">180+ Kerja Tersedia</p>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-3 fade-in">
                <a href="#" class="category-card">
                    <div class="category-icon">
                        <i class="bi bi-calculator"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Kewangan</h5>
                    <p class="mb-0">120+ Kerja Tersedia</p>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-3 fade-in">
                <a href="#" class="category-card">
                    <div class="category-icon">
                        <i class="bi bi-palette"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Kreatif & Seni</h5>
                    <p class="mb-0">95+ Kerja Tersedia</p>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-3 fade-in">
                <a href="#" class="category-card">
                    <div class="category-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Kesihatan</h5>
                    <p class="mb-0">85+ Kerja Tersedia</p>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-3 fade-in">
                <a href="#" class="category-card">
                    <div class="category-icon">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Pendidikan</h5>
                    <p class="mb-0">75+ Kerja Tersedia</p>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-3 fade-in">
                <a href="#" class="category-card">
                    <div class="category-icon">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Logistik</h5>
                    <p class="mb-0">65+ Kerja Tersedia</p>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-3 fade-in">
                <a href="#" class="category-card">
                    <div class="category-icon">
                        <i class="bi bi-shop"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Runcit</h5>
                    <p class="mb-0">55+ Kerja Tersedia</p>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section id="about" class="section-padding">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <h2 class="section-title">Bagaimana Ia Berfungsi</h2>
            <p class="section-subtitle">Tiga langkah mudah untuk mendapat kerja impian anda</p>
        </div>
        
        <div class="row g-5">
            <div class="col-md-4 fade-in">
                <div class="process-step">
                    <div class="process-icon bg-primary">
                        <i class="bi bi-person-plus"></i>
                        <div class="process-number">1</div>
                    </div>
                    <h4 class="fw-bold mb-3">Daftar Akaun</h4>
                    <p class="text-muted">Buat akaun percuma dan lengkapkan profil anda dengan maklumat yang diperlukan. Proses pendaftaran hanya mengambil masa beberapa minit sahaja.</p>
                </div>
            </div>
            
            <div class="col-md-4 fade-in">
                <div class="process-step">
                    <div class="process-icon bg-success">
                        <i class="bi bi-search"></i>
                        <div class="process-number">2</div>
                    </div>
                    <h4 class="fw-bold mb-3">Cari Kerja</h4>
                    <p class="text-muted">Gunakan carian canggih kami untuk mencari kerja yang sesuai dengan kemahiran, pengalaman dan lokasi pilihan anda.</p>
                </div>
            </div>
            
            <div class="col-md-4 fade-in">
                <div class="process-step">
                    <div class="process-icon bg-info">
                        <i class="bi bi-send"></i>
                        <div class="process-number">3</div>
                    </div>
                    <h4 class="fw-bold mb-3">Mohon Kerja</h4>
                    <p class="text-muted">Hantar permohonan anda dengan mudah dan tunggu respons dari majikan. Kami akan memberitahu anda tentang status permohonan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <h2 class="section-title">Apa Kata Pengguna Kami</h2>
            <p class="section-subtitle">Dengar pengalaman mereka yang telah berjaya mendapat kerja melalui platform kami</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 fade-in">
                <div class="testimonial-card">
                    <div class="testimonial-avatar">
                        <i class="bi bi-person"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Ahmad Rahman</h5>
                    <p class="text-muted mb-3">"Platform yang sangat mudah digunakan. Dalam masa 2 minggu, saya telah mendapat kerja impian saya sebagai pembangun web. Terima kasih E-JobDemo!"</p>
                    <div class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4 fade-in">
                <div class="testimonial-card">
                    <div class="testimonial-avatar">
                        <i class="bi bi-person"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Siti Nurhaliza</h5>
                    <p class="text-muted mb-3">"Sebagai fresh graduate, saya risau untuk mencari kerja. Tetapi dengan E-JobDemo, proses carian kerja menjadi lebih mudah dan berkesan."</p>
                    <div class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4 fade-in">
                <div class="testimonial-card">
                    <div class="testimonial-avatar">
                        <i class="bi bi-person"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Raj Kumar</h5>
                    <p class="text-muted mb-3">"Interface yang bersih dan carian yang tepat. Saya berjaya menukar kerjaya dengan bantuan platform ini. Highly recommended!"</p>
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
</section>

<!-- CTA Section -->
<section class="cta-section section-padding">
    <div class="container cta-content">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 fade-in">
                <h2 class="display-5 fw-bold mb-4">Mulakan Perjalanan Kerjaya Anda Hari Ini</h2>
                <p class="lead mb-4">Sertai ribuan pencari kerja yang telah mempercayai E-JobDemo untuk mencari peluang kerjaya terbaik. Daftar sekarang dan temui kerja impian anda!</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
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
@endsection

@push('scripts')
<script>
    // Job search form enhancement
    document.getElementById('jobSearchForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const searchTerm = this.querySelector('input[name="search"]').value;
        const location = this.querySelector('select[name="location"]').value;
        
        if (searchTerm.trim() === '') {
            alert('Sila masukkan kata kunci pencarian');
            return;
        }
        
        // Here you would typically redirect to search results page
        console.log('Searching for:', searchTerm, 'in', location);
        alert(`Mencari "${searchTerm}" ${location ? 'di ' + location : 'di semua lokasi'}`);
    });
    
    // Add loading animation to job application buttons
    document.querySelectorAll('.job-card .btn').forEach(button => {
        button.addEventListener('click', function(e) {
            if (this.getAttribute('href') === '#') {
                e.preventDefault();
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Memuat...';
                this.disabled = true;
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                    alert('Fungsi ini akan tersedia tidak lama lagi!');
                }, 1000);
            }
        });
    });
</script>
@endpush

