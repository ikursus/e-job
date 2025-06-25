@extends('admin.induk')

@push('styles')
<style>
    .form-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        overflow: hidden;
    }
    .form-card:hover {
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    .card-header-gradient {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        padding: 1.5rem;
        border: none;
    }
    .card-header-gradient h5 {
        font-weight: 600;
        margin: 0;
    }
    .form-floating {
        position: relative;
        margin-bottom: 1.5rem;
    }
    .form-floating > .form-control,
    .form-floating > .form-select {
        height: calc(3.5rem + 2px);
        line-height: 1.25;
        border: 2px solid #e9ecef;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    .form-floating > .form-control:focus,
    .form-floating > .form-select:focus {
        border-color: #f5576c;
        box-shadow: 0 0 0 0.2rem rgba(245, 87, 108, 0.25);
        transform: translateY(-2px);
    }
    .form-floating > label {
        padding: 1rem 0.75rem;
        color: #6c757d;
        font-weight: 500;
    }
    .btn-gradient {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border: none;
        border-radius: 10px;
        padding: 0.75rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(245, 87, 108, 0.3);
    }
    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(245, 87, 108, 0.4);
    }
    .btn-secondary-custom {
        background: #6c757d;
        border: none;
        border-radius: 10px;
        padding: 0.75rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-secondary-custom:hover {
        background: #5a6268;
        transform: translateY(-2px);
    }
    .page-header {
        margin-bottom: 2rem;
    }
    .page-title {
        color: #2c3e50;
        font-weight: 700;
        margin-bottom: 0.5rem;
        position: relative;
        padding-bottom: 0.5rem;
    }
    .page-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #f093fb, #f5576c);
        border-radius: 2px;
    }
    .breadcrumb-custom {
        background: none;
        padding: 0;
        margin: 0;
    }
    .breadcrumb-custom .breadcrumb-item {
        color: #6c757d;
    }
    .breadcrumb-custom .breadcrumb-item.active {
        color: #f5576c;
        font-weight: 600;
    }
    .fade-in {
        animation: fadeInUp 0.6s ease-out;
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
    .input-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        z-index: 5;
    }
    .password-toggle {
        cursor: pointer;
        transition: color 0.3s ease;
    }
    .password-toggle:hover {
        color: #f5576c;
    }
    .user-info-card {
        background: linear-gradient(135deg, rgba(240, 147, 251, 0.1) 0%, rgba(245, 87, 108, 0.1) 100%);
        border: 1px solid rgba(245, 87, 108, 0.2);
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1 class="page-title"><i class="fas fa-user-edit me-2"></i>Kemaskini Pengguna</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home me-1"></i>Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Pengguna</a></li>
                <li class="breadcrumb-item active">Kemaskini</li>
            </ol>
        </nav>
    </div>

    @include('alerts')
    
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- User Info Card -->
            <div class="user-info-card fade-in" style="animation-delay: 0.1s">
                <div class="d-flex align-items-center">
                    <div class="avatar-lg bg-gradient rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <i class="fas fa-user text-white fa-2x"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">{{ $user->name }}</h5>
                        <p class="text-muted mb-0"><i class="fas fa-envelope me-1"></i>{{ $user->email }}</p>
                        <small class="text-muted"><i class="fas fa-calendar me-1"></i>Daftar: {{ $user->created_at }}</small>
                    </div>
                </div>
            </div>
            
            <div class="card form-card fade-in" style="animation-delay: 0.2s">
                <div class="card-header-gradient">
                    <h5><i class="fas fa-user-edit me-2"></i>Kemaskini Maklumat Pengguna</h5>
                    <small class="opacity-75">Ubah maklumat pengguna mengikut keperluan</small>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" id="userEditForm">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" placeholder="Nama Penuh" 
                                           value="{{ old('name', $user->name) }}" required>
                                    <label for="name"><i class="fas fa-user me-2"></i>Nama Penuh</label>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" placeholder="Alamat Email" 
                                           value="{{ old('email', $user->email) }}" required>
                                    <label for="email"><i class="fas fa-envelope me-2"></i>Alamat Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" placeholder="Nombor Telefon" 
                                           value="{{ old('phone', $user->phone) }}">
                                    <label for="phone"><i class="fas fa-phone me-2"></i>Nombor Telefon</label>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                        <option value="aktif" {{ old('status', $user->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="tidak aktif" {{ old('status', $user->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                    <label for="status"><i class="fas fa-toggle-on me-2"></i>Status Pengguna</label>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating position-relative">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="password" name="password" placeholder="Kata Laluan Baru">
                                    <label for="password"><i class="fas fa-lock me-2"></i>Kata Laluan Baru</label>
                                    <i class="fas fa-eye input-icon password-toggle" onclick="togglePassword('password')"></i>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating position-relative">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                                           id="password_confirmation" name="password_confirmation" 
                                           placeholder="Sahkan Kata Laluan">
                                    <label for="password_confirmation"><i class="fas fa-lock me-2"></i>Sahkan Kata Laluan</label>
                                    <i class="fas fa-eye input-icon password-toggle" onclick="togglePassword('password_confirmation')"></i>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="alert alert-warning border-0" style="background: linear-gradient(135deg, rgba(255, 193, 7, 0.1) 0%, rgba(255, 152, 0, 0.1) 100%); border-radius: 10px;">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Nota:</strong> Biarkan medan kata laluan kosong jika tidak mahu mengubah kata laluan. Jika mengubah, kata laluan mestilah sekurang-kurangnya 8 aksara.
                        </div>
                </div>
                <div class="card-footer bg-white border-0 p-4">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary-custom">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-gradient text-white">
                            <i class="fas fa-save me-2"></i>Kemaskini Pengguna
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const icon = field.nextElementSibling.nextElementSibling;
    
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        field.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Form validation
document.getElementById('userEditForm').addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('password_confirmation').value;
    
    // Only validate if password is being changed
    if (password || confirmPassword) {
        if (password !== confirmPassword) {
            e.preventDefault();
            alert('Kata laluan dan pengesahan kata laluan tidak sepadan!');
            return false;
        }
        
        if (password.length < 8) {
            e.preventDefault();
            alert('Kata laluan mestilah sekurang-kurangnya 8 aksara!');
            return false;
        }
    }
});
</script>
@endpush
