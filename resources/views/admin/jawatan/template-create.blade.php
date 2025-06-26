@extends('admin.induk')

@push('styles')
<style>
    .info-alert {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        border: 1px solid rgba(102, 126, 234, 0.2);
        border-radius: 12px;
        color: #667eea;
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="page-header-standard">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-title-standard">Tambah Jawatan Baru</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-standard">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/jawatan') }}">Jawatan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Info Alert -->
<div class="alert info-alert" role="alert">
    <i class="bi bi-info-circle me-2"></i>
    <strong>Maklumat:</strong> Sila isi semua maklumat yang diperlukan untuk menambah jawatan baru.
</div>

<!-- Form Card -->
<div class="admin-form-card">
    <div class="admin-form-header">
        <h5><i class="bi bi-plus-circle me-2"></i>Maklumat Jawatan</h5>
    </div>
    <div class="admin-form-body">
        <form action="{{ url('/admin/jawatan') }}" method="POST">
            @csrf
            
            <div class="admin-form-floating">
                <input type="text" class="form-control" id="nama_jawatan" name="nama_jawatan" placeholder="Nama Jawatan" required>
                <label for="nama_jawatan">Nama Jawatan</label>
            </div>
            
            <div class="admin-form-floating">
                <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Jawatan" style="height: 120px" required></textarea>
                <label for="deskripsi">Deskripsi Jawatan</label>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="admin-form-floating">
                        <select class="form-select" id="kategori" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Pentadbiran">Pentadbiran</option>
                            <option value="Teknikal">Teknikal</option>
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
                            <option value="Pertengahan">Pertengahan</option>
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
                        <input type="number" class="form-control" id="gaji_min" name="gaji_min" placeholder="Gaji Minimum" required>
                        <label for="gaji_min">Gaji Minimum (RM)</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="admin-form-floating">
                        <input type="number" class="form-control" id="gaji_max" name="gaji_max" placeholder="Gaji Maximum" required>
                        <label for="gaji_max">Gaji Maximum (RM)</label>
                    </div>
                </div>
            </div>
            
            <div class="admin-form-floating">
                <textarea class="form-control" id="keperluan" name="keperluan" placeholder="Keperluan Jawatan" style="height: 100px" required></textarea>
                <label for="keperluan">Keperluan Jawatan</label>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="admin-form-floating">
                        <select class="form-select" id="status" name="status" required>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        <label for="status">Status</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="admin-form-floating">
                        <input type="date" class="form-control" id="tarikh_tutup" name="tarikh_tutup" required>
                        <label for="tarikh_tutup">Tarikh Tutup Permohonan</label>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between pt-3">
                <a href="{{ url('/admin/jawatan') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
                <button type="submit" class="btn admin-btn-gradient">
                    <i class="bi bi-check-circle me-2"></i>Simpan Jawatan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
