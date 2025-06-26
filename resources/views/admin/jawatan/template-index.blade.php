@extends('admin.induk')

@push('styles')
<style>
    .stats-icon.primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .stats-icon.success {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    
    .stats-icon.info {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }
    
    .stats-icon.warning {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }
    
    .table-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border: none;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out;
        animation-delay: 0.4s;
        animation-fill-mode: both;
    }
    
    .table-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        margin: 0;
        border-radius: 0;
    }
    
    .table-header h5 {
        margin: 0;
        font-weight: 600;
        font-size: 1.25rem;
    }
    
    .table-responsive {
        border-radius: 0;
    }
    
    .table {
        margin: 0;
    }
    
    .table thead th {
        background: #f8f9fa;
        border: none;
        font-weight: 600;
        color: #495057;
        padding: 1rem;
    }
    
    .table tbody tr {
        transition: all 0.2s ease;
    }
    
    .table tbody tr:hover {
        background-color: #f8f9fa;
        transform: scale(1.01);
    }
    
    .table tbody td {
        padding: 1rem;
        border-color: #e9ecef;
        vertical-align: middle;
    }
    
    .badge-status {
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-weight: 500;
        font-size: 0.875rem;
    }
    
    .badge-aktif {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        color: white;
    }
    
    .badge-tidak-aktif {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }
    
    .btn-action {
        border: none;
        border-radius: 8px;
        padding: 0.5rem 1rem;
        font-weight: 500;
        transition: all 0.3s ease;
        margin: 0 0.25rem;
    }
    
    .btn-edit {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
    }
    
    .btn-edit:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 15px rgba(79, 172, 254, 0.4);
        color: white;
    }
    
    .btn-delete {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }
    
    .btn-delete:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 15px rgba(240, 147, 251, 0.4);
        color: white;
    }
</style>
@endpush

@section('content')

<!-- Page Header -->
<div class="page-header-standard">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-title-standard">Pengurusan Jawatan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-standard">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jawatan</li>
                    </ol>
                </nav>
            </div>
            <div class="col-auto">
                <a href="{{ url('/admin/jawatan/create') }}" class="btn admin-btn-gradient">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Jawatan
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="admin-stats-card">
            <div class="d-flex align-items-center">
                <div class="admin-stats-icon stats-icon primary">
                    <i class="bi bi-briefcase-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="admin-stats-number">25</div>
                    <div class="admin-stats-label">Total Jawatan</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="admin-stats-card">
            <div class="d-flex align-items-center">
                <div class="admin-stats-icon stats-icon success">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="admin-stats-number">18</div>
                    <div class="admin-stats-label">Jawatan Aktif</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="admin-stats-card">
            <div class="d-flex align-items-center">
                <div class="admin-stats-icon stats-icon info">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="admin-stats-number">142</div>
                    <div class="admin-stats-label">Permohonan</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="admin-stats-card">
            <div class="d-flex align-items-center">
                <div class="admin-stats-icon stats-icon warning">
                    <i class="bi bi-clock-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="admin-stats-number">7</div>
                    <div class="admin-stats-label">Menunggu</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jawatan Table -->
<div class="card table-card">
    <div class="table-header">
        <h5><i class="bi bi-list-ul me-2"></i>Senarai Jawatan</h5>
        <small class="opacity-75">Kelola dan pantau semua jawatan sistem</small>
    </div>
    
    @if(isset($senaraiJawatan) && count($senaraiJawatan) > 0)
        <div class="table-responsive">
            <table id="jawatanTable" class="table">
                <thead>
                    <tr>
                        <th><i class="bi bi-hash me-1"></i>Bil</th>
                        <th><i class="bi bi-briefcase me-1"></i>Nama Jawatan</th>
                        <th><i class="bi bi-card-text me-1"></i>Deskripsi</th>
                        <th><i class="bi bi-people me-1"></i>Kuota</th>
                        <th><i class="bi bi-calendar me-1"></i>Tarikh</th>
                        <th><i class="bi bi-toggle-on me-1"></i>Status</th>
                        <th><i class="bi bi-gear me-1"></i>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($senaraiJawatan as $jawatan)
                        <tr>
                            <td>
                                <span class="fw-bold text-primary">{{ $loop->iteration }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-gradient rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                        <i class="bi bi-briefcase text-white"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">{{ $jawatan->title }}</div>
                                        <small class="text-muted">ID: {{ $jawatan->id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-truncate d-inline-block" style="max-width: 200px;" title="{{ $jawatan->description }}">
                                    {{ Str::limit($jawatan->description, 50) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-info text-white px-3 py-2 rounded-pill">
                                    <i class="bi bi-people me-1"></i>{{ $jawatan->quota }}
                                </span>
                            </td>
                            <td>
                                <div>
                                    <small class="text-muted">Mula:</small> {{ date('d/m/Y', strtotime($jawatan->date_from)) }}<br>
                                    <small class="text-muted">Tamat:</small> {{ date('d/m/Y', strtotime($jawatan->date_till)) }}
                                </div>
                            </td>
                            <td>
                                @if($jawatan->status == 'open')
                                    <span class="badge-status badge-aktif">
                                        <i class="bi bi-check-circle me-1"></i>Buka
                                    </span>
                                @else
                                    <span class="badge-status badge-tidak-aktif">
                                        <i class="bi bi-x-circle me-1"></i>Tutup
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.jawatan.edit', $jawatan->id) }}" class="btn btn-sm btn-action btn-edit" title="Edit Jawatan">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.jawatan.destroy', $jawatan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Adakah anda pasti mahu memadam jawatan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-action btn-delete" title="Padam Jawatan">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty-state">
            <i class="bi bi-briefcase"></i>
            <h5>Tiada Jawatan Dijumpai</h5>
            <p>Belum ada jawatan yang didaftarkan dalam sistem.</p>
            <a href="{{ route('admin.jawatan.create') }}" class="btn btn-add text-white">
                <i class="bi bi-plus-lg me-2"></i>Tambah Jawatan Pertama
            </a>
        </div>
    @endif
</div>

@push('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#jawatanTable').DataTable({
            "language": {
                "search": "Cari:",
                "lengthMenu": "Papar _MENU_ rekod",
                "info": "Menunjukkan _START_ hingga _END_ daripada _TOTAL_ rekod",
                "infoEmpty": "Menunjukkan 0 hingga 0 daripada 0 rekod",
                "infoFiltered": "(ditapis daripada _MAX_ jumlah rekod)",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Seterusnya",
                    "previous": "Sebelumnya"
                }
            },
            "pageLength": 10,
            "responsive": true,
            "order": [[ 0, "asc" ]]
        });
    });
    
    // Enhanced delete confirmation
    function confirmDelete(jawatanTitle) {
        return confirm(`Adakah anda pasti mahu memadam jawatan "${jawatanTitle}"? Tindakan ini tidak boleh dibatalkan.`);
    }
</script>
@endpush

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<style>
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        margin: 1rem;
    }
    
    .dataTables_wrapper .dataTables_filter input {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.5rem;
    }
    
    .dataTables_wrapper .dataTables_length select {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.25rem;
    }
</style>
@endpush
@endsection
