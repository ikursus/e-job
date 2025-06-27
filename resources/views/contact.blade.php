@extends('layouts.induk')

@section('title', 'Hubungi Kami - E-JobDemo')

@push('styles')
<style>
    .contact-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 120px 0 80px;
        position: relative;
        overflow: hidden;
    }
    
    .contact-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.2);
        z-index: 1;
    }
    
    .contact-hero-content {
        position: relative;
        z-index: 2;
    }
    
    .contact-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        border: none;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.15);
    }
    
    .contact-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        color: white;
    }
    
    .form-control {
        border-radius: 15px;
        border: 2px solid #e9ecef;
        padding: 15px 20px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }
    
    .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.75rem;
    }
    
    .contact-form {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }
    
    .map-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        height: 400px;
    }
    
    .office-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        border: none;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .office-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.12);
    }
    
    .office-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        margin-bottom: 1rem;
    }
    
    .faq-item {
        background: white;
        border-radius: 15px;
        margin-bottom: 1rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border: none;
    }
    
    .faq-header {
        background: none;
        border: none;
        padding: 1.5rem;
        width: 100%;
        text-align: left;
        font-weight: 600;
        color: #495057;
        transition: all 0.3s ease;
    }
    
    .faq-header:hover {
        color: #667eea;
    }
    
    .faq-body {
        padding: 0 1.5rem 1.5rem;
        color: #6c757d;
    }
    
    .social-links a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        text-decoration: none;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        margin: 0 0.5rem;
    }
    
    .social-links a:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        color: white;
    }
</style>
@endpush

@section('content')
<!-- Contact Hero Section -->
<section class="contact-hero">
    <div class="container contact-hero-content">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 fade-in">
                <h1 class="display-4 fw-bold mb-4">Hubungi Kami</h1>
                <p class="lead mb-0">Kami sentiasa bersedia untuk membantu anda. Jangan teragak-agak untuk menghubungi kami jika anda mempunyai sebarang pertanyaan atau memerlukan bantuan.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
<section class="section-padding">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-3 fade-in">
                <div class="contact-card text-center">
                    <div class="contact-icon bg-primary">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Alamat Pejabat</h5>
                    <p class="text-muted mb-0">Level 15, Menara KLCC<br>Kuala Lumpur City Centre<br>50088 Kuala Lumpur</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 fade-in">
                <div class="contact-card text-center">
                    <div class="contact-icon bg-success">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Telefon</h5>
                    <p class="text-muted mb-2">Talian Utama:<br><strong>+60 3-2161 2345</strong></p>
                    <p class="text-muted mb-0">Sokongan Teknikal:<br><strong>+60 3-2161 2346</strong></p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 fade-in">
                <div class="contact-card text-center">
                    <div class="contact-icon bg-info">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <h5 class="fw-bold mb-3">E-mel</h5>
                    <p class="text-muted mb-2">Pertanyaan Umum:<br><strong>info@ejobdemo.com</strong></p>
                    <p class="text-muted mb-0">Sokongan:<br><strong>support@ejobdemo.com</strong></p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 fade-in">
                <div class="contact-card text-center">
                    <div class="contact-icon bg-warning">
                        <i class="bi bi-clock-fill"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Waktu Operasi</h5>
                    <p class="text-muted mb-2">Isnin - Jumaat:<br><strong>9:00 AM - 6:00 PM</strong></p>
                    <p class="text-muted mb-0">Sabtu:<br><strong>9:00 AM - 1:00 PM</strong></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Map Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8 fade-in">
                <div class="contact-form">
                    <h3 class="fw-bold mb-4">Hantar Mesej Kepada Kami</h3>
                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">Nama Pertama *</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Nama Akhir *</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Alamat E-mel *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Nombor Telefon</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="col-12">
                                <label for="subject" class="form-label">Subjek *</label>
                                <select class="form-select form-control" id="subject" name="subject" required>
                                    <option value="">Pilih Subjek</option>
                                    <option value="general">Pertanyaan Umum</option>
                                    <option value="technical">Sokongan Teknikal</option>
                                    <option value="partnership">Kerjasama Perniagaan</option>
                                    <option value="feedback">Maklum Balas</option>
                                    <option value="other">Lain-lain</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label">Mesej *</label>
                                <textarea class="form-control" id="message" name="message" rows="6" placeholder="Tulis mesej anda di sini..." required></textarea>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="privacy" name="privacy" required>
                                    <label class="form-check-label" for="privacy">
                                        Saya bersetuju dengan <a href="#" class="text-primary">Dasar Privasi</a> dan <a href="#" class="text-primary">Terma Perkhidmatan</a> *
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-custom btn-lg">
                                    <i class="bi bi-send me-2"></i>Hantar Mesej
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-4 fade-in">
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.8158!2d101.7137!3d3.1578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc37d8a8b6b265%3A0x73f5a0c8b7b6b265!2sPetronas%20Twin%20Towers!5e0!3m2!1sen!2smy!4v1635123456789!5m2!1sen!2smy" 
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                
                <div class="mt-4">
                    <h5 class="fw-bold mb-3">Ikuti Kami</h5>
                    <div class="social-links">
                        <a href="#" title="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" title="Twitter">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" title="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" title="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="#" title="YouTube">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Office Locations Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <h2 class="section-title">Lokasi Pejabat Kami</h2>
            <p class="section-subtitle">Kami mempunyai pejabat di beberapa lokasi strategik untuk melayani anda dengan lebih baik</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 fade-in">
                <div class="office-card">
                    <div class="office-icon bg-primary">
                        <i class="bi bi-building"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Pejabat Utama - Kuala Lumpur</h5>
                    <p class="text-muted mb-2">
                        <i class="bi bi-geo-alt me-2"></i>
                        Level 15, Menara KLCC<br>
                        Kuala Lumpur City Centre<br>
                        50088 Kuala Lumpur
                    </p>
                    <p class="text-muted mb-2">
                        <i class="bi bi-telephone me-2"></i>
                        +60 3-2161 2345
                    </p>
                    <p class="text-muted">
                        <i class="bi bi-envelope me-2"></i>
                        kl@ejobdemo.com
                    </p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4 fade-in">
                <div class="office-card">
                    <div class="office-icon bg-success">
                        <i class="bi bi-building"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Cawangan Penang</h5>
                    <p class="text-muted mb-2">
                        <i class="bi bi-geo-alt me-2"></i>
                        Level 8, Komtar Tower<br>
                        Jalan Penang<br>
                        10000 George Town, Penang
                    </p>
                    <p class="text-muted mb-2">
                        <i class="bi bi-telephone me-2"></i>
                        +60 4-261 2345
                    </p>
                    <p class="text-muted">
                        <i class="bi bi-envelope me-2"></i>
                        penang@ejobdemo.com
                    </p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4 fade-in">
                <div class="office-card">
                    <div class="office-icon bg-info">
                        <i class="bi bi-building"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Cawangan Johor Bahru</h5>
                    <p class="text-muted mb-2">
                        <i class="bi bi-geo-alt me-2"></i>
                        Level 12, Menara Ansar<br>
                        Jalan Trus<br>
                        80000 Johor Bahru, Johor
                    </p>
                    <p class="text-muted mb-2">
                        <i class="bi bi-telephone me-2"></i>
                        +60 7-221 2345
                    </p>
                    <p class="text-muted">
                        <i class="bi bi-envelope me-2"></i>
                        johor@ejobdemo.com
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <h2 class="section-title">Soalan Lazim</h2>
            <p class="section-subtitle">Jawapan kepada soalan-soalan yang kerap ditanya</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8 fade-in">
                <div class="faq-item">
                    <button class="faq-header" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        <i class="bi bi-plus-circle me-2"></i>
                        Bagaimana cara untuk mendaftar akaun di E-JobDemo?
                    </button>
                    <div id="faq1" class="collapse">
                        <div class="faq-body">
                            Anda boleh mendaftar akaun dengan mengklik butang "Daftar" di bahagian atas laman web. Isi maklumat yang diperlukan dan ikuti arahan yang diberikan. Proses pendaftaran adalah percuma dan hanya mengambil masa beberapa minit sahaja.
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-header" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        <i class="bi bi-plus-circle me-2"></i>
                        Adakah perkhidmatan E-JobDemo percuma untuk pencari kerja?
                    </button>
                    <div id="faq2" class="collapse">
                        <div class="faq-body">
                            Ya, semua perkhidmatan asas E-JobDemo adalah percuma untuk pencari kerja. Anda boleh mencari kerja, memohon jawatan, dan menggunakan semua ciri utama tanpa sebarang bayaran.
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-header" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        <i class="bi bi-plus-circle me-2"></i>
                        Bagaimana cara untuk mengemaskini profil saya?
                    </button>
                    <div id="faq3" class="collapse">
                        <div class="faq-body">
                            Setelah log masuk ke akaun anda, klik pada nama anda di bahagian atas kanan dan pilih "Profil Saya". Di sana anda boleh mengemaskini semua maklumat peribadi, pengalaman kerja, kemahiran, dan lain-lain.
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-header" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                        <i class="bi bi-plus-circle me-2"></i>
                        Berapa lama masa yang diperlukan untuk mendapat respons dari majikan?
                    </button>
                    <div id="faq4" class="collapse">
                        <div class="faq-body">
                            Masa respons bergantung kepada majikan masing-masing. Secara purata, majikan akan memberikan respons dalam tempoh 3-7 hari bekerja. Kami akan menghantar notifikasi kepada anda sebaik sahaja terdapat kemaskini status permohonan.
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-header" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                        <i class="bi bi-plus-circle me-2"></i>
                        Bagaimana jika saya lupa kata laluan akaun saya?
                    </button>
                    <div id="faq5" class="collapse">
                        <div class="faq-body">
                            Klik pada pautan "Lupa Kata Laluan" di halaman log masuk. Masukkan alamat e-mel anda dan kami akan menghantar arahan untuk menetapkan semula kata laluan ke e-mel anda.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection