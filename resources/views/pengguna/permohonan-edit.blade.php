@extends('pengguna.induk')

@section('page-title', 'Edit Permohonan')

@push('styles')
<style>
    .user-card {
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border: none;
        overflow: hidden;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .btn-gradient {
        background: linear-gradient(45deg, #007bff, #0056b3);
        border: none;
        color: white;
    }
    .btn-gradient:hover {
        background: linear-gradient(45deg, #0056b3, #004085);
        color: white;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="user-page-header text-center">
        <div class="container">
            <h1 class="user-page-title">Edit Permohonan</h1>
            <nav class="user-breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.pengguna') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('permohonan.index') }}">Permohonan</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Content Section -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="user-card">
                <div class="card-header bg-transparent border-0 pb-0">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-pencil-square me-2 text-primary"></i>
                        Edit Permohonan
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Maklumat Jawatan (Read-only) -->
                    <div class="mb-4">
                        <h6 class="fw-bold text-primary mb-3">Maklumat Jawatan</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nama Jawatan</label>
                                    <input type="text" class="form-control" value="{{ $permohonan->jawatan->title ?? 'N/A' }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Status Permohonan</label>
                                    <input type="text" class="form-control" value="{{ ucfirst($permohonan->status) }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi Jawatan</label>
                            <textarea class="form-control" rows="3" readonly>{{ $permohonan->jawatan->description ?? 'N/A' }}</textarea>
                        </div>
                    </div>

                    <hr>

                    <!-- Form Edit -->
                    <form action="{{ route('permohonan.update', $permohonan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <h6 class="fw-bold text-primary mb-3">Edit Catatan Permohonan</h6>
                        
                        <div class="mb-4">
                            <label for="catatan" class="form-label fw-bold">
                                Catatan Tambahan 
                                <small class="text-muted">(Opsional)</small>
                            </label>
                            <textarea 
                                class="form-control @error('catatan') is-invalid @enderror" 
                                id="catatan" 
                                name="catatan" 
                                rows="5" 
                                placeholder="Masukkan catatan tambahan untuk permohonan anda..."
                                maxlength="1000">{{ old('catatan', $permohonan->catatan) }}</textarea>
                            <div class="form-text">
                                <small class="text-muted">
                                    <span id="charCount">{{ strlen($permohonan->catatan ?? '') }}</span>/1000 aksara
                                </small>
                            </div>
                            @error('catatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('permohonan.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-gradient">
                                <i class="bi bi-check-circle me-2"></i>Kemaskini Permohonan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const catatanTextarea = document.getElementById('catatan');
    const charCount = document.getElementById('charCount');
    
    // Update character count
    catatanTextarea.addEventListener('input', function() {
        const currentLength = this.value.length;
        charCount.textContent = currentLength;
        
        // Change color based on character count
        if (currentLength > 900) {
            charCount.style.color = '#dc3545'; // Red
        } else if (currentLength > 800) {
            charCount.style.color = '#ffc107'; // Yellow
        } else {
            charCount.style.color = '#6c757d'; // Default gray
        }
    });
});
</script>
@endpush