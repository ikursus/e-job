@extends('admin.induk')

@section('content')
<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem 0;
        margin-bottom: 2rem;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        animation: fadeInDown 0.8s ease-out;
    }
    
    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .breadcrumb-custom {
        background: rgba(255,255,255,0.1);
        border-radius: 25px;
        padding: 0.5rem 1rem;
        margin-top: 1rem;
    }
    
    .breadcrumb-custom .breadcrumb-item a {
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .breadcrumb-custom .breadcrumb-item a:hover {
        color: white;
    }
    
    .breadcrumb-custom .breadcrumb-item.active {
        color: white;
        font-weight: 600;
    }
    
    .info-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        animation: fadeInUp 0.8s ease-out;
    }
    
    .form-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        border: none;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out;
        animation-delay: 0.2s;
        animation-fill-mode: both;
    }
    
    .form-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        margin: 0;
        border-radius: 0;
    }
    
    .form-header h5 {
        margin: 0;
        font-weight: 600;
        font-size: 1.25rem;
    }
    
    .form-body {
        padding: 2rem;
    }
    
    .form-floating {
        margin-bottom: 1.5rem;
    }
    
    .form-floating > .form-control {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 1rem 0.75rem;
        height: auto;
        transition: all 0.3s ease;
        background: #f8f9fa;
    }
    
    .form-floating > .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        background: white;
        transform: translateY(-2px);
    }
    
    .form-floating > label {
        color: #6c757d;
        font-weight: 500;
    }
    
    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
        color: #667eea;
        font-weight: 600;
    }
    
    .btn-submit {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 12px;
        padding: 0.75rem 2rem;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
    
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        color: white;
    }
    
    .btn-cancel {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        border: none;
        border-radius: 12px;
        padding: 0.75rem 2rem;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(108, 117, 125, 0.4);
    }
    
    .btn-cancel:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(108, 117, 125, 0.6);
        color: white;
    }
    
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .fade-in {
        animation: fadeInUp 0.8s ease-out;
    }
    
    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }
        
        .form-body {
            padding: 1.5rem;
        }
    }
</style>

<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header fade-in">
        <div class="container">
            <h1 class="page-title"><i class="bi bi-pencil-square me-2"></i>Kemaskini Jawatan</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bi bi-house me-1"></i>Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.jawatan.index') }}"><i class="bi bi-briefcase me-1"></i>Jawatan</a></li>
                    <li class="breadcrumb-item active">Kemaskini</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        @include('alerts')
        
        <!-- Jawatan Info Card -->
        <div class="info-card fade-in">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="mb-1"><i class="bi bi-briefcase me-2"></i>{{ $jawatan->title }}</h4>
                    <p class="mb-0 opacity-75">ID: {{ $jawatan->id }} | Dibuat: {{ $jawatan->created_at }}</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <span class="badge bg-light text-dark px-3 py-2 rounded-pill">
                        <i class="bi bi-people me-1"></i>Kuota: {{ $jawatan->quota }}
                    </span>
                </div>
            </div>
        </div>
        
        <!-- Form Card -->
        <div class="card form-card fade-in">
            <div class="form-header">
                <h5><i class="bi bi-pencil-square me-2"></i>Kemaskini Maklumat Jawatan</h5>
                <small class="opacity-75">Sila kemaskini maklumat yang diperlukan</small>
            </div>
            
            <div class="form-body">
                <form method="POST" action="{{ route('admin.jawatan.update', $jawatan->id) }}" id="jawatanForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Tajuk Jawatan" value="{{ old('title', $jawatan->title) }}" required>
                                <label for="title"><i class="bi bi-briefcase me-2"></i>Tajuk Jawatan</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="quota" name="quota" placeholder="Kuota" min="1" value="{{ old('quota', $jawatan->quota) }}" required>
                                <label for="quota"><i class="bi bi-people me-2"></i>Kuota</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-floating">
                        <textarea class="form-control" id="description" name="description" placeholder="Deskripsi" style="height: 120px" required>{{ old('description', $jawatan->description) }}</textarea>
                        <label for="description"><i class="bi bi-card-text me-2"></i>Deskripsi</label>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="date_from" name="date_from" value="{{ old('date_from', $jawatan->date_from) }}" required>
                                <label for="date_from"><i class="bi bi-calendar-event me-2"></i>Tarikh Mula</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="date_till" name="date_till" value="{{ old('date_till', $jawatan->date_till) }}" required>
                                <label for="date_till"><i class="bi bi-calendar-x me-2"></i>Tarikh Tamat</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-floating">
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="open" {{ old('status', $jawatan->status) == 'open' ? 'selected' : '' }}>Buka</option>
                            <option value="closed" {{ old('status', $jawatan->status) == 'closed' ? 'selected' : '' }}>Tutup</option>
                        </select>
                        <label for="status"><i class="bi bi-toggle-on me-2"></i>Status</label>
                    </div>
                    
                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-submit">
                            <i class="bi bi-check-lg me-2"></i>Kemaskini Jawatan
                        </button>
                        <a href="{{ route('admin.jawatan.index') }}" class="btn btn-cancel">
                            <i class="bi bi-x-lg me-2"></i>Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Form validation
document.getElementById('jawatanForm').addEventListener('submit', function(e) {
    const dateFrom = new Date(document.getElementById('date_from').value);
    const dateTill = new Date(document.getElementById('date_till').value);
    
    if (dateTill <= dateFrom) {
        e.preventDefault();
        alert('Tarikh tamat mesti selepas tarikh mula!');
        return false;
    }
});

// Auto-resize textarea
document.getElementById('description').addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});
</script>
@endsection
