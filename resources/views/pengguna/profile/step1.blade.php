@extends('pengguna.induk')

@section('page-title', 'Profil Pengguna - Langkah 1')

@push('styles')
<style>
    .profile-form-card {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.2s ease;
    }
    .profile-form-card:hover {
        transform: translateY(-2px);
    }
    .form-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        text-align: center;
    }
    .form-content {
        padding: 2rem;
        line-height: 1.8;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
    }
    .form-label i {
        margin-right: 0.5rem;
        color: #6c757d;
        width: 20px;
    }
    .form-control {
        border-radius: 8px;
        border: 2px solid #e9ecef;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }
    .form-control.is-invalid {
        border-color: #dc3545;
    }
    .invalid-feedback {
        display: block;
        font-size: 0.875rem;
        color: #dc3545;
        margin-top: 0.25rem;
    }
    .back-button {
        transition: all 0.3s ease;
    }
    .back-button:hover {
        transform: translateX(-5px);
    }
    .step-badge {
        background-color: rgba(255,255,255,0.2);
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.875rem;
        margin-bottom: 1rem;
    }
    .submit-button {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .submit-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="user-page-header text-center">
        <div class="container">
            <h1 class="user-page-title">Profil Pengguna</h1>
            <nav class="user-breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.pengguna') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Profil</a></li>
                    <li class="breadcrumb-item active">Langkah 1</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Content Section -->
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('dashboard.pengguna') }}" class="btn btn-outline-primary back-button">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali ke Dashboard
                </a>
            </div>

            <!-- Profile Form Card -->
            <div class="user-card profile-form-card">
                <!-- Form Header -->
                <div class="form-header">
                    <div class="step-badge">
                        Langkah 1 dari 3
                    </div>
                    <h2 class="mb-0">Maklumat Asas</h2>
                    <p class="mb-0 mt-2">Sila lengkapkan maklumat asas anda</p>
                </div>

                <!-- Form Content -->
                <div class="form-content">
                    <form method="POST" action="{{ route('profile.step1store') }}" id="profileStep1Form">
                        @csrf

                        <!-- Name Field -->
                        <div class="form-group">
                            <label for="name" class="form-label">
                                <i class="bi bi-person"></i>
                                Nama Penuh <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   value="{{ old('name', auth()->user()->name ?? '') }}"
                                   placeholder="Masukkan nama penuh anda"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="form-group">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope"></i>
                                Alamat Email <span class="text-danger">*</span>
                            </label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   name="email"
                                   value="{{ old('email', auth()->user()->email ?? '') }}"
                                   placeholder="contoh@email.com"
                                   required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Phone Field -->
                        <div class="form-group">
                            <label for="phone" class="form-label">
                                <i class="bi bi-telephone"></i>
                                Nombor Telefon <span class="text-danger">*</span>
                            </label>
                            <input type="tel"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   id="phone"
                                   name="phone"
                                   value="{{ old('phone', auth()->user()->phone ?? '') }}"
                                   placeholder="01X-XXXXXXX"
                                   required>
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Address Field -->
                        <div class="form-group">
                            <label for="address" class="form-label">
                                <i class="bi bi-geo-alt"></i>
                                Alamat <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('address') is-invalid @enderror"
                                      id="address"
                                      name="address"
                                      rows="4"
                                      placeholder="Masukkan alamat lengkap anda"
                                      required>{{ old('address', $step1['address'] ?? '') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Form Info -->
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Nota:</strong> Semua medan bertanda (*) adalah wajib diisi. Maklumat ini akan digunakan untuk tujuan komunikasi dan pengesahan.
                        </div>
                    </form>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="text-center mt-4">
                <div class="btn-group" role="group">
                    <a href="{{ route('dashboard.pengguna') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-2"></i>
                        Batal
                    </a>
                    <button type="submit" form="profileStep1Form" class="btn btn-primary submit-button">
                        <i class="bi bi-arrow-right me-2"></i>
                        Seterusnya
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Form validation
document.getElementById('profileStep1Form').addEventListener('submit', function(e) {
    let isValid = true;
    const requiredFields = ['name', 'email', 'phone', 'address'];

    requiredFields.forEach(function(fieldName) {
        const field = document.getElementById(fieldName);
        const value = field.value.trim();

        // Remove previous error styling
        field.classList.remove('is-invalid');

        if (!value) {
            field.classList.add('is-invalid');
            isValid = false;
        }

        // Email validation
        if (fieldName === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                field.classList.add('is-invalid');
                isValid = false;
            }
        }

        // Phone validation (basic Malaysian format)
        if (fieldName === 'phone' && value) {
            const phoneRegex = /^01[0-9]-?[0-9]{7,8}$/;
            if (!phoneRegex.test(value.replace(/\s/g, ''))) {
                field.classList.add('is-invalid');
                isValid = false;
            }
        }
    });

    if (!isValid) {
        e.preventDefault();
        alert('Sila lengkapkan semua medan yang diperlukan dengan betul.');
    }
});

// Phone number formatting
document.getElementById('phone').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 3) {
        value = value.substring(0, 3) + '-' + value.substring(3, 11);
    }
    e.target.value = value;
});

// Auto-resize textarea
document.getElementById('address').addEventListener('input', function(e) {
    e.target.style.height = 'auto';
    e.target.style.height = e.target.scrollHeight + 'px';
});
</script>
@endpush
