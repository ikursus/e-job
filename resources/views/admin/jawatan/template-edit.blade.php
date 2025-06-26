@extends('admin.induk')

@push('styles')
<style>
    .info-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        animation: fadeInUp 0.8s ease-out;
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="page-header-standard">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-title-standard">Edit Jawatan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-standard">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/jawatan') }}">Jawatan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Info Card -->
<div class="info-card">
    <div class="d-flex align-items-center">
        <div class="me-3">
            <i class="bi bi-info-circle" style="font-size: 2rem;"></i>
        </div>
        <div>
            <h5 class="mb-1">Edit Maklumat Jawatan</h5>
            <p class="mb-0 opacity-75">Kemaskini maklumat jawatan yang diperlukan. Pastikan semua maklumat adalah tepat dan terkini.</p>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="admin-form-card">
    <div class="admin-form-header">
        <h5><i class="bi bi-pencil-square me-2"></i>Kemaskini Maklumat Jawatan</h5>
    </div>
    <div class="admin-form-body">
        <form action="{{ url('/admin/jawatan/1') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="admin-form-floating">
                <input type="text" class="form-control" id="nama_jawatan" name="nama_jawatan" placeholder="Nama Jawatan" value="Pengaturcara Web" required>
                <label for="nama_jawatan">Nama Jawatan</label>
            </div>
            
            <div class="admin-form-floating">
                <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Jawatan" style="height: 120px" required>Membangunkan dan menyelenggara aplikasi web menggunakan teknologi terkini.</textarea>
                <label for="deskripsi">Deskripsi Jawatan</label>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="admin-form-floating">
                        <select class="form-select" id="kategori" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Pentadbiran">Pentadbiran</option>
                            <option value="Teknikal" selected>Teknikal</option>
                            <option value="Pengurusan">Pengurusan</option>
                            <option value="Operasi">Operasi</option>
                        </select>
                        <label for="kategori">Kategori</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="admin-form-floating">
                        <select class="form-select" id="tahap" name="tahap" required>
                            <option value="">Pilih Tahap</option>
                            <option value="Pemula">Pemula</option>
                            <option value="Pertengahan" selected>Pertengahan</option>
                            <option value="Kanan">Kanan</option>
                            <option value="Eksekutif">Eksekutif</option>
                        </select>
                        <label for="tahap">Tahap Jawatan</label>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="admin-form-floating">
                        <input type="number" class="form-control" id="gaji_min" name="gaji_min" placeholder="Gaji Minimum" value="3000" required>
                        <label for="gaji_min">Gaji Minimum (RM)</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="admin-form-floating">
                        <input type="number" class="form-control" id="gaji_max" name="gaji_max" placeholder="Gaji Maximum" value="5000" required>
                        <label for="gaji_max">Gaji Maximum (RM)</label>
                    </div>
                </div>
            </div>
            
            <div class="admin-form-floating">
                <textarea class="form-control" id="keperluan" name="keperluan" placeholder="Keperluan Jawatan" style="height: 100px" required>Diploma/Ijazah dalam bidang Sains Komputer atau berkaitan. Pengalaman minimum 2 tahun.</textarea>
                <label for="keperluan">Keperluan Jawatan</label>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="admin-form-floating">
                        <select class="form-select" id="status" name="status" required>
                            <option value="1" selected>Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        <label for="status">Status</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="admin-form-floating">
                        <input type="date" class="form-control" id="tarikh_tutup" name="tarikh_tutup" value="2024-12-31" required>
                        <label for="tarikh_tutup">Tarikh Tutup Permohonan</label>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between pt-3">
                <a href="{{ url('/admin/jawatan') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
                <button type="submit" class="btn admin-btn-gradient">
                    <i class="bi bi-check-circle me-2"></i>Kemaskini Jawatan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
