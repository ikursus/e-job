@extends('pengguna.induk')

@section('page-title', 'Profil Pengguna - Langkah 3')

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
        background: linear-gradient(135deg, #fd7e14 0%, #e83e8c 100%);
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
    .form-control, .form-select {
        border-radius: 8px;
        border: 2px solid #e9ecef;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    .form-control:focus, .form-select:focus {
        border-color: #fd7e14;
        box-shadow: 0 0 0 0.2rem rgba(253, 126, 20, 0.25);
    }
    .form-control.is-invalid, .form-select.is-invalid {
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
        background: linear-gradient(135deg, #fd7e14 0%, #e83e8c 100%);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .submit-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(253, 126, 20, 0.4);
    }
    .progress-bar {
        height: 8px;
        border-radius: 4px;
        background: linear-gradient(135deg, #fd7e14 0%, #e83e8c 100%);
        transition: width 0.3s ease;
    }
    .experience-card {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        background: #f8f9fa;
        transition: all 0.3s ease;
    }
    .experience-card:hover {
        border-color: #fd7e14;
        background: #fff;
    }
    .add-experience-btn {
        border: 2px dashed #dee2e6;
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        background: transparent;
        transition: all 0.3s ease;
        cursor: pointer;
        width: 100%;
    }
    .add-experience-btn:hover {
        border-color: #fd7e14;
        background: #fff5f0;
    }
    .remove-experience {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.875rem;
    }
    .experience-header {
        background: linear-gradient(135deg, #fd7e14 0%, #e83e8c 100%);
        color: white;
        padding: 0.75rem 1rem;
        margin: -1.5rem -1.5rem 1.5rem -1.5rem;
        border-radius: 10px 10px 0 0;
        font-weight: 600;
    }
    .completion-message {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 1.5rem;
        border-radius: 12px;
        text-align: center;
        margin-bottom: 2rem;
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
                    <li class="breadcrumb-item active">Langkah 3</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Content Section -->
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <!-- Progress Bar -->
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-muted">Kemajuan</span>
                    <span class="text-muted">3 dari 3</span>
                </div>
                <div class="progress" style="height: 8px;">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <!-- Completion Message -->
            <div class="completion-message">
                <i class="bi bi-check-circle fs-1 mb-3"></i>
                <h4>Langkah Terakhir!</h4>
                <p class="mb-0">Sila lengkapkan maklumat pengalaman kerja anda untuk melengkapkan profil.</p>
            </div>

            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('profile.step2') }}" class="btn btn-outline-primary back-button">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali ke Langkah 2
                </a>
            </div>

            <!-- Profile Form Card -->
            <div class="user-card profile-form-card">
                <!-- Form Header -->
                <div class="form-header">
                    <div class="step-badge">
                        Langkah 3 dari 3
                    </div>
                    <h2 class="mb-0">Pengalaman Kerja</h2>
                    <p class="mb-0 mt-2">Sila lengkapkan maklumat pengalaman kerja anda</p>
                </div>

                <!-- Form Content -->
                <div class="form-content">
                    <form method="POST" action="{{ route('profile.step3store') }}" id="profileStep3Form">
                        @csrf

                        <!-- Experience Container -->
                        <div id="experienceContainer">
                            <!-- Initial Experience Form -->
                            <div class="experience-card position-relative" data-index="0">
                                <div class="experience-header">
                                    <i class="bi bi-briefcase me-2"></i>
                                    Pengalaman Kerja #1
                                </div>

                                <div class="row">
                                    <!-- Company Field -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company" class="form-label">
                                                <i class="bi bi-building"></i>
                                                Nama Syarikat <span class="text-danger">*</span>
                                            </label>
                                            <input type="text"
                                                   class="form-control @error('experiences.0.company') is-invalid @enderror"
                                                   id="company"
                                                   name="company"
                                                   value="{{ old('experiences.0.company') }}"
                                                   placeholder="Masukkan nama syarikat"
                                                   required>
                                            @error('experiences.0.company')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Position Field -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="position" class="form-label">
                                                <i class="bi bi-person-badge"></i>
                                                Jawatan <span class="text-danger">*</span>
                                            </label>
                                            <input type="text"
                                                   class="form-control @error('experiences.0.position') is-invalid @enderror"
                                                   id="position"
                                                   name="position"
                                                   value="{{ old('experiences.0.position') }}"
                                                   placeholder="Masukkan jawatan"
                                                   required>
                                            @error('experiences.0.position')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Start Date Field -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start_date" class="form-label">
                                                <i class="bi bi-calendar-check"></i>
                                                Tarikh Mula <span class="text-danger">*</span>
                                            </label>
                                            <input type="date"
                                                   class="form-control @error('experiences.0.start_date') is-invalid @enderror"
                                                   id="start_date"
                                                   name="start_date"
                                                   value="{{ old('experiences.0.start_date') }}"
                                                   required>
                                            @error('experiences.0.start_date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- End Date Field -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_date" class="form-label">
                                                <i class="bi bi-calendar-x"></i>
                                                Tarikh Tamat <span class="text-danger">*</span>
                                            </label>
                                            <input type="date"
                                                   class="form-control @error('experiences.0.end_date') is-invalid @enderror"
                                                   id="end_date"
                                                   name="end_date"
                                                   value="{{ old('experiences.0.end_date') }}"
                                                   required>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" id="current_job" onchange="toggleEndDate(0)">
                                                <label class="form-check-label" for="current_job">
                                                    Masih bekerja di sini
                                                </label>
                                            </div>
                                            @error('experiences.0.end_date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Description -->
                                <div class="form-group">
                                    <label for="description" class="form-label">
                                        <i class="bi bi-file-text"></i>
                                        Deskripsi Kerja
                                    </label>
                                    <textarea class="form-control"
                                              id="description"
                                              name="description"
                                              rows="3"
                                              placeholder="Terangkan tugas dan tanggungjawab anda (pilihan)">{{ old('experiences.0.description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Add More Experience Button -->
                        <button type="button" class="add-experience-btn" onclick="addExperience()">
                            <i class="bi bi-plus-circle fs-1 text-muted mb-2"></i>
                            <p class="mb-0 text-muted">Tambah Pengalaman Kerja Lain</p>
                        </button>

                        <!-- Form Info -->
                        <div class="alert alert-info mt-4">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Nota:</strong> Sila masukkan sekurang-kurangnya satu pengalaman kerja. Anda boleh menambah lebih banyak pengalaman kerja jika ada.
                        </div>
                    </form>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="text-center mt-4">
                <div class="btn-group" role="group">
                    <a href="{{ route('profile.step2') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-2"></i>
                        Kembali
                    </a>
                    <button type="submit" form="profileStep3Form" class="btn btn-warning submit-button">
                        <i class="bi bi-check-circle me-2"></i>
                        Selesai
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
