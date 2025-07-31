@extends('pengguna.induk')

@section('page-title', 'Profil Pengguna - Ringkasan')

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
        background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
        color: white;
        padding: 2rem;
        text-align: center;
    }
    .form-content {
        padding: 2rem;
        line-height: 1.8;
    }
    .step-badge {
        background-color: rgba(255,255,255,0.2);
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.875rem;
        margin-bottom: 1rem;
    }
    .summary-section {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        border-left: 4px solid #17a2b8;
    }
    .summary-section h4 {
        color: #17a2b8;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px solid #dee2e6;
    }
    .info-row:last-child {
        border-bottom: none;
    }
    .info-label {
        font-weight: 600;
        color: #495057;
        display: flex;
        align-items: center;
    }
    .info-label i {
        margin-right: 0.5rem;
        color: #6c757d;
        width: 20px;
    }
    .info-value {
        color: #212529;
        text-align: right;
        max-width: 60%;
        word-wrap: break-word;
    }
    .completion-message {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px;
        text-align: center;
        margin-bottom: 2rem;
    }
    .action-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }
    .btn-submit {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        color: white;
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
        color: white;
    }
    .back-button {
        transition: all 0.3s ease;
    }
    .back-button:hover {
        transform: translateX(-5px);
    }
    .file-info {
        background: #e3f2fd;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-size: 0.875rem;
        color: #1976d2;
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
                    <li class="breadcrumb-item active">Ringkasan</li>
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
                    <span class="text-muted">Selesai</span>
                </div>
                <div class="progress" style="height: 8px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <!-- Completion Message -->
            <div class="completion-message">
                <i class="bi bi-check-circle-fill fs-1 mb-3"></i>
                <h3>Profil Lengkap!</h3>
                <p class="mb-0">Sila semak semula maklumat anda sebelum menyimpan profil.</p>
            </div>

            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('profile.step3') }}" class="btn btn-outline-primary back-button">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali ke Langkah 3
                </a>
            </div>

            <!-- Profile Summary Card -->
            <div class="user-card profile-form-card">
                <!-- Form Header -->
                <div class="form-header">
                    <div class="step-badge">
                        Ringkasan Profil
                    </div>
                    <h2 class="mb-0">Semakan Akhir</h2>
                    <p class="mb-0 mt-2">Sila semak semula maklumat profil anda</p>
                </div>

                <!-- Form Content -->
                <div class="form-content">
                    @if($step1)
                    <!-- Step 1: Maklumat Asas -->
                    <div class="summary-section">
                        <h4><i class="bi bi-person-circle me-2"></i>Maklumat Asas</h4>

                        <div class="info-row">
                            <div class="info-label">
                                <i class="bi bi-person"></i>
                                Nama Penuh
                            </div>
                            <div class="info-value">{{ $step1['name'] }}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">
                                <i class="bi bi-envelope"></i>
                                Emel
                            </div>
                            <div class="info-value">{{ $step1['email'] }}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">
                                <i class="bi bi-telephone"></i>
                                Telefon
                            </div>
                            <div class="info-value">{{ $step1['phone'] }}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">
                                <i class="bi bi-geo-alt"></i>
                                Alamat
                            </div>
                            <div class="info-value">{{ $step1['address'] }}</div>
                        </div>
                    </div>
                    @endif

                    @if($step2)
                    <!-- Step 2: Maklumat Tambahan -->
                    <div class="summary-section">
                        <h4><i class="bi bi-info-circle me-2"></i>Maklumat Tambahan</h4>

                        <div class="info-row">
                            <div class="info-label">
                                <i class="bi bi-calendar"></i>
                                Tarikh Lahir
                            </div>
                            <div class="info-value">{{ date('d/m/Y', strtotime($step2['date_of_birth'])) }}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">
                                <i class="bi bi-person-badge"></i>
                                Jantina
                            </div>
                            <div class="info-value">{{ $step2['gender'] == 'male' ? 'Lelaki' : 'Perempuan' }}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">
                                <i class="bi bi-card-text"></i>
                                No. Kad Pengenalan
                            </div>
                            <div class="info-value">{{ $step2['ic_number'] }}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">
                                <i class="bi bi-mortarboard"></i>
                                Tahap Pendidikan
                            </div>
                            <div class="info-value">{{ $step2['education_level'] }}</div>
                        </div>

                        @if(isset($step2['profile_photo']))
                        <div class="info-row">
                            <div class="info-label">
                                <i class="bi bi-image"></i>
                                Gambar Profil
                            </div>
                            <div class="info-value">
                                <span class="file-info">
                                    <i class="bi bi-check-circle me-1"></i>
                                    Dimuat naik
                                </span>
                            </div>
                        </div>
                        @endif

                        @if(isset($step2['resume']))
                        <div class="info-row">
                            <div class="info-label">
                                <i class="bi bi-file-earmark-pdf"></i>
                                Resume
                            </div>
                            <div class="info-value">
                                <span class="file-info">
                                    <i class="bi bi-check-circle me-1"></i>
                                    Dimuat naik
                                </span>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    @if($step3)
                    <!-- Step 3: Pengalaman Kerja -->
                    <div class="summary-section">
                        <h4><i class="bi bi-building me-2"></i>Pengalaman Kerja</h4>

                        <div class="info-row">
                            <div class="info-label">
                                <i class="bi bi-building"></i>
                                Syarikat
                            </div>
                            <div class="info-value">{{ $step3['company'] }}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">
                                <i class="bi bi-briefcase"></i>
                                Jawatan
                            </div>
                            <div class="info-value">{{ $step3['position'] }}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">
                                <i class="bi bi-calendar-check"></i>
                                Tarikh Mula
                            </div>
                            <div class="info-value">{{ date('d/m/Y', strtotime($step3['start_date'])) }}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">
                                <i class="bi bi-calendar-x"></i>
                                Tarikh Tamat
                            </div>
                            <div class="info-value">{{ date('d/m/Y', strtotime($step3['end_date'])) }}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">
                                <i class="bi bi-file-text"></i>
                                Deskripsi
                            </div>
                            <div class="info-value">{{ $step3['description'] }}</div>
                        </div>
                    </div>
                    @endif

                    <!-- Warning Message -->
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <strong>Penting:</strong> Sila pastikan semua maklumat adalah tepat sebelum menyimpan. Anda boleh kembali ke langkah sebelumnya untuk membuat perubahan.
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="text-center mt-4">
                <div class="action-buttons">
                    <a href="{{ route('dashboard.pengguna') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-2"></i>
                        Batal
                    </a>
                    <form method="POST" action="" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-submit">
                            <i class="bi bi-check-circle me-2"></i>
                            Simpan Profil
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Confirmation before saving
document.querySelector('form[action*="profile.save"]').addEventListener('submit', function(e) {
    if (!confirm('Adakah anda pasti untuk menyimpan profil ini? Maklumat akan disimpan secara kekal.')) {
        e.preventDefault();
    }
});
</script>
@endpush
