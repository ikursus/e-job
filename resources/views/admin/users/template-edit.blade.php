@extends('admin.induk')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="mb-4">
        <h1 class="h3 mb-3"><i class="fas fa-user-edit me-2"></i>Kemaskini Pengguna</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
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
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-user text-white fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">{{ $user->name }}</h5>
                            <p class="text-muted mb-0"><i class="fas fa-envelope me-1"></i>{{ $user->email }}</p>
                            <small class="text-muted"><i class="fas fa-calendar me-1"></i>Daftar: {{ $user->created_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0"><i class="fas fa-user-edit me-2"></i>Kemaskini Maklumat Pengguna</h5>
                    <small>Ubah maklumat pengguna mengikut keperluan</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" id="userEditForm">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label"><i class="fas fa-user me-2"></i>Nama Penuh</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" placeholder="Nama Penuh" 
                                           value="{{ old('name', $user->name) }}" required>
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
                                           value="{{ old('email', $user->email) }}" required>
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
                                           value="{{ old('phone', $user->phone) }}">
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
                                        <option value="aktif" {{ old('status', $user->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="tidak aktif" {{ old('status', $user->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
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
                                            <option value="{{ $role->name }}" {{ in_array($role->name, old('role', $user->roles->pluck('name')->toArray())) ? 'selected' : '' }}>
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
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label"><i class="fas fa-lock me-2"></i>Kata Laluan Baru</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                               id="password" name="password" placeholder="Kata Laluan Baru">
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
                                               placeholder="Sahkan Kata Laluan">
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
                        
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Nota:</strong> Biarkan medan kata laluan kosong jika tidak mahu mengubah kata laluan. Jika mengubah, kata laluan mestilah sekurang-kurangnya 8 aksara.
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" form="userEditForm" class="btn btn-warning">
                            <i class="fas fa-save me-2"></i>Kemaskini Pengguna
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
