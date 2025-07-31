@extends('pengguna.induk')

@section('page-title', 'Profil Pengguna - Langkah 2')

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
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
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
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
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
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .submit-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
    }
    .progress-bar {
        height: 8px;
        border-radius: 4px;
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        transition: width 0.3s ease;
    }
    .file-upload-area {
        border: 2px dashed #dee2e6;
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .file-upload-area:hover {
        border-color: #28a745;
        background-color: #f8f9fa;
    }
    .file-upload-area.dragover {
        border-color: #28a745;
        background-color: #e8f5e8;
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
                    <li class="breadcrumb-item active">Langkah 2</li>
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
                    <span class="text-muted">2 dari 3</span>
                </div>
                <div class="progress" style="height: 8px;">
                    <div class="progress-bar" role="progressbar" style="width: 66.67%" aria-valuenow="66.67" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('profile.step1') }}" class="btn btn-outline-primary back-button">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali ke Langkah 1
                </a>
            </div>

            <!-- Profile Form Card -->
            <div class="user-card profile-form-card">
                <!-- Form Header -->
                <div class="form-header">
                    <div class="step-badge">
                        Langkah 2 dari 3
                    </div>
                    <h2 class="mb-0">Maklumat Tambahan</h2>
                    <p class="mb-0 mt-2">Sila lengkapkan maklumat tambahan dan dokumen</p>
                </div>

                <!-- Form Content -->
                <div class="form-content">
                    <form method="POST" action="{{ route('profile.step2store') }}" id="profileStep2Form" enctype="multipart/form-data">
                        @csrf

                        <!-- Date of Birth Field -->
                        <div class="form-group">
                            <label for="date_of_birth" class="form-label">
                                <i class="bi bi-calendar"></i>
                                Tarikh Lahir <span class="text-danger">*</span>
                            </label>
                            <input type="date"
                                   class="form-control @error('date_of_birth') is-invalid @enderror"
                                   id="date_of_birth"
                                   name="date_of_birth"
                                   value="{{ old('date_of_birth', $step2['date_of_birth'] ?? '') }}"
                                   required>
                            @error('date_of_birth')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Gender Field -->
                        <div class="form-group">
                            <label for="gender" class="form-label">
                                <i class="bi bi-person-badge"></i>
                                Jantina <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('gender') is-invalid @enderror"
                                    id="gender"
                                    name="gender"
                                    required>
                                <option value="">Pilih Jantina</option>
                                <option value="male" {{ old('gender', $step2['gender'] ?? '') == 'male' ? 'selected' : '' }}>Lelaki</option>
                                <option value="female" {{ old('gender', $step2['gender'] ?? '') == 'female' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- IC Number Field -->
                        <div class="form-group">
                            <label for="ic_number" class="form-label">
                                <i class="bi bi-card-text"></i>
                                Nombor Kad Pengenalan <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   class="form-control @error('ic_number') is-invalid @enderror"
                                   id="ic_number"
                                   name="ic_number"
                                   value="{{ old('ic_number', $step2['ic_number'] ?? '') }}"
                                   placeholder="XXXXXX-XX-XXXX"
                                   maxlength="14"
                                   required>
                            @error('ic_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Education Level Field -->
                        <div class="form-group">
                            <label for="education_level" class="form-label">
                                <i class="bi bi-mortarboard"></i>
                                Tahap Pendidikan <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('education_level') is-invalid @enderror"
                                    id="education_level"
                                    name="education_level"
                                    required>
                                <option value="">Pilih Tahap Pendidikan</option>
                                <option value="spm" {{ old('education_level', $step2['education_level'] ?? '') == 'spm' ? 'selected' : '' }}>SPM</option>
                                <option value="stpm" {{ old('education_level', $step2['education_level'] ?? '') == 'stpm' ? 'selected' : '' }}>STPM</option>
                                <option value="diploma" {{ old('education_level', $step2['education_level'] ?? '') == 'diploma' ? 'selected' : '' }}>Diploma</option>
                                <option value="degree" {{ old('education_level', $step2['education_level'] ?? '') == 'degree' ? 'selected' : '' }}>Ijazah Sarjana Muda</option>
                                <option value="master" {{ old('education_level', $step2['education_level'] ?? '') == 'master' ? 'selected' : '' }}>Ijazah Sarjana</option>
                                <option value="phd" {{ old('education_level', $step2['education_level'] ?? '') == 'phd' ? 'selected' : '' }}>PhD</option>
                            </select>
                            @error('education_level')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Profile Photo Upload -->
                        <div class="form-group">
                            <label for="profile_photo" class="form-label">
                                <i class="bi bi-camera"></i>
                                Gambar Profil
                            </label>
                            <div class="file-upload-area" onclick="document.getElementById('profile_photo').click()">
                                <i class="bi bi-cloud-upload fs-1 text-muted mb-3"></i>
                                <p class="mb-2">Klik untuk memuat naik gambar profil</p>
                                <p class="text-muted small">Format yang diterima: JPG, PNG, GIF (Maksimum 2MB)</p>
                                <input type="file"
                                       class="d-none @error('profile_photo') is-invalid @enderror"
                                       id="profile_photo"
                                       name="profile_photo"
                                       accept="image/*">
                            </div>
                            <div id="photo-preview" class="mt-3" style="display: none;">
                                <img id="preview-image" src="" alt="Preview" class="img-thumbnail" style="max-width: 200px;">
                                <button type="button" class="btn btn-sm btn-danger ms-2" onclick="removePhoto()">Buang</button>
                            </div>
                            @error('profile_photo')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Resume Upload -->
                        <div class="form-group">
                            <label for="resume" class="form-label">
                                <i class="bi bi-file-earmark-pdf"></i>
                                Resume/CV
                            </label>
                            <div class="file-upload-area" onclick="document.getElementById('resume').click()">
                                <i class="bi bi-file-earmark-arrow-up fs-1 text-muted mb-3"></i>
                                <p class="mb-2">Klik untuk memuat naik resume/CV</p>
                                <p class="text-muted small">Format yang diterima: PDF, DOC, DOCX (Maksimum 5MB)</p>
                                <input type="file"
                                       class="d-none @error('resume') is-invalid @enderror"
                                       id="resume"
                                       name="resume"
                                       accept=".pdf,.doc,.docx">
                            </div>
                            <div id="resume-preview" class="mt-3" style="display: none;">
                                <div class="alert alert-success">
                                    <i class="bi bi-check-circle me-2"></i>
                                    <span id="resume-name"></span>
                                    <button type="button" class="btn btn-sm btn-danger ms-2" onclick="removeResume()">Buang</button>
                                </div>
                            </div>
                            @error('resume')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Form Info -->
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Nota:</strong> Maklumat ini akan membantu kami memahami latar belakang anda dengan lebih baik. Dokumen yang dimuat naik akan disimpan dengan selamat.
                        </div>
                    </form>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="text-center mt-4">
                <div class="btn-group" role="group">
                    <a href="{{ route('profile.step1') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-2"></i>
                        Kembali
                    </a>
                    <button type="submit" form="profileStep2Form" class="btn btn-success submit-button">
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
// IC Number formatting
document.getElementById('ic_number').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 6) {
        value = value.substring(0, 6) + '-' + value.substring(6, 8) + '-' + value.substring(8, 12);
    } else if (value.length > 2) {
        value = value.substring(0, 6) + (value.length > 6 ? '-' + value.substring(6) : '');
    }
    e.target.value = value;
});

// Profile photo preview
document.getElementById('profile_photo').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        if (file.size > 2 * 1024 * 1024) {
            alert('Saiz fail terlalu besar. Maksimum 2MB.');
            e.target.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
            document.getElementById('photo-preview').style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});

// Resume preview
document.getElementById('resume').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        if (file.size > 5 * 1024 * 1024) {
            alert('Saiz fail terlalu besar. Maksimum 5MB.');
            e.target.value = '';
            return;
        }

        document.getElementById('resume-name').textContent = file.name;
        document.getElementById('resume-preview').style.display = 'block';
    }
});

// Remove photo
function removePhoto() {
    document.getElementById('profile_photo').value = '';
    document.getElementById('photo-preview').style.display = 'none';
}

// Remove resume
function removeResume() {
    document.getElementById('resume').value = '';
    document.getElementById('resume-preview').style.display = 'none';
}

// Form validation
document.getElementById('profileStep2Form').addEventListener('submit', function(e) {
    let isValid = true;
    const requiredFields = ['date_of_birth', 'gender', 'ic_number', 'education_level'];

    requiredFields.forEach(function(fieldName) {
        const field = document.getElementById(fieldName);
        const value = field.value.trim();

        // Remove previous error styling
        field.classList.remove('is-invalid');

        if (!value) {
            field.classList.add('is-invalid');
            isValid = false;
        }

        // IC validation
        if (fieldName === 'ic_number' && value) {
            const icRegex = /^\d{6}-\d{2}-\d{4}$/;
            if (!icRegex.test(value)) {
                field.classList.add('is-invalid');
                isValid = false;
            }
        }

        // Age validation (must be at least 18)
        if (fieldName === 'date_of_birth' && value) {
            const birthDate = new Date(value);
            const today = new Date();
            const age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();

            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            if (age < 18) {
                field.classList.add('is-invalid');
                isValid = false;
                alert('Umur mestilah sekurang-kurangnya 18 tahun.');
            }
        }
    });

    if (!isValid) {
        e.preventDefault();
        alert('Sila lengkapkan semua medan yang diperlukan dengan betul.');
    }
});

// Drag and drop functionality
const uploadAreas = document.querySelectorAll('.file-upload-area');

uploadAreas.forEach(area => {
    area.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('dragover');
    });

    area.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('dragover');
    });

    area.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('dragover');

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            const input = this.querySelector('input[type="file"]');
            input.files = files;
            input.dispatchEvent(new Event('change'));
        }
    });
});
</script>
@endpush
