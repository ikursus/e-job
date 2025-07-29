@extends('admin.induk')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="mb-4">
        <h1 class="h3 mb-3"><i class="fas fa-user-plus me-2"></i>Tambah Pengguna Baru</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home me-1"></i>Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Pengguna</a></li>
                <li class="breadcrumb-item active">Tambah Baru</li>
            </ol>
        </nav>
    </div>

    @include('alerts')
    
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i>Daftar Maklumat Pengguna</h5>
                    <small>Sila isi semua maklumat yang diperlukan</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}" method="POST" id="userForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label"><i class="fas fa-user me-2"></i>Nama Penuh</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" placeholder="Nama Penuh" 
                                           value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label"><i class="fas fa-envelope me-2"></i>Alamat Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" placeholder="Alamat Email" 
                                           value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label"><i class="fas fa-phone me-2"></i>Nombor Telefon</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" placeholder="Nombor Telefon" 
                                           value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label"><i class="fas fa-toggle-on me-2"></i>Status Pengguna</label>
                                    <select class="form-select @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                        <option value="">Pilih Status</option>
                                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="tidak aktif" {{ old('status') == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label"><i class="fas fa-lock me-2"></i>Kata Laluan</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                               id="password" name="password" placeholder="Kata Laluan" required>
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                                            <i class="fas fa-eye" id="password-icon"></i>
                                        </button>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label"><i class="fas fa-lock me-2"></i>Sahkan Kata Laluan</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                                               id="password_confirmation" name="password_confirmation" 
                                               placeholder="Sahkan Kata Laluan" required>
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_confirmation')">
                                            <i class="fas fa-eye" id="password_confirmation-icon"></i>
                                        </button>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label"><i class="fas fa-user-tie me-2"></i>Role</label>
                                    <select 
                                        class="form-select @error('role') is-invalid @enderror"                                             
                                        id="role" 
                                        name="role[]" 
                                        multiple
                                        size="5"
                                        required
                                    >
                                        <option value="">-- Pilih Role --</option>
                                        @foreach($senaraiRoles as $role)
                                            <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Nota:</strong> Kata laluan mestilah sekurang-kurangnya 8 aksara dan mengandungi huruf besar, huruf kecil, dan nombor.
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" form="userForm" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Daftar Pengguna
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const icon = document.getElementById(fieldId + '-icon');
    
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
document.getElementById('userForm').addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('password_confirmation').value;
    
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
});
</script>
@endpush
