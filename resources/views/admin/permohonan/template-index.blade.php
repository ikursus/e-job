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
    
    .badge-pending {
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        color: #8b4513;
    }
    
    .badge-approved {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        color: white;
    }
    
    .badge-rejected {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }
    
    .badge-interview {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
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
    
    .btn-view {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
    }
    
    .btn-view:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 15px rgba(79, 172, 254, 0.4);
        color: white;
    }
    
    .btn-edit {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        color: white;
    }
    
    .btn-edit:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 15px rgba(67, 233, 123, 0.4);
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
                <h1 class="page-title-standard">Pengurusan Permohonan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-standard">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Permohonan</li>
                    </ol>
                </nav>
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
                    <i class="bi bi-file-earmark-text-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="admin-stats-number">{{ isset($senaraiPermohonan) ? count($senaraiPermohonan) : 0 }}</div>
                    <div class="admin-stats-label">Total Permohonan</div>
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
                    <div class="admin-stats-number">{{ isset($senaraiPermohonan) ? $senaraiPermohonan->where('status', 'pending')->count() : 0 }}</div>
                    <div class="admin-stats-label">Menunggu</div>
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
                    <div class="admin-stats-number">{{ isset($senaraiPermohonan) ? $senaraiPermohonan->where('status', 'approved')->count() : 0 }}</div>
                    <div class="admin-stats-label">Diluluskan</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="admin-stats-card">
            <div class="d-flex align-items-center">
                <div class="admin-stats-icon stats-icon info">
                    <i class="bi bi-person-check-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="admin-stats-number">{{ isset($senaraiPermohonan) ? $senaraiPermohonan->where('status', 'interview')->count() : 0 }}</div>
                    <div class="admin-stats-label">Temuduga</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Permohonan Table -->
<div class="card table-card">
    <div class="table-header">
        <h5><i class="bi bi-list-ul me-2"></i>Senarai Permohonan</h5>
        <small class="opacity-75">Kelola dan pantau semua permohonan kerja</small>
        <a href="{{ route('admin.permohonan.export') }}" class="btn btn-dark">Export Data</a>
    </div>
    
    @if(isset($senaraiPermohonan) && count($senaraiPermohonan) > 0)
        <div class="table-responsive">
            <table id="permohonanTable" class="table">
                <thead>
                    <tr>
                        <th><i class="bi bi-hash me-1"></i>Bil</th>
                        <th><i class="bi bi-person me-1"></i>Pemohon</th>
                        <th><i class="bi bi-briefcase me-1"></i>Jawatan</th>
                        <th><i class="bi bi-envelope me-1"></i>Email</th>
                        <th><i class="bi bi-telephone me-1"></i>Telefon</th>
                        <th><i class="bi bi-calendar me-1"></i>Tarikh Mohon</th>
                        <th><i class="bi bi-toggle-on me-1"></i>Status</th>
                        <th><i class="bi bi-gear me-1"></i>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($senaraiPermohonan as $permohonan)
                        <tr>
                            <td>
                                <span class="fw-bold text-primary">{{ $loop->iteration }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-gradient rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                        <i class="bi bi-person text-white"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">{{ $permohonan->user->name ?? 'N/A' }}</div>
                                        <small class="text-muted">ID: {{ $permohonan->id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-bold">{{ $permohonan->jawatan->title ?? 'N/A' }}</div>
                                    <small class="text-muted">{{ $permohonan->jawatan->department ?? '' }}</small>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted">{{ $permohonan->user->email ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span class="text-muted">{{ $permohonan->user->phone ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <div>
                                    <small class="text-muted">{{ date('d/m/Y', strtotime($permohonan->created_at)) }}</small><br>
                                    <small class="text-muted">{{ date('H:i', strtotime($permohonan->created_at)) }}</small>
                                </div>
                            </td>
                            <td>
                                @if($permohonan->status == 'pending')
                                    <span class="badge-status badge-pending">
                                        <i class="bi bi-clock me-1"></i>Menunggu
                                    </span>
                                @elseif($permohonan->status == 'approved')
                                    <span class="badge-status badge-approved">
                                        <i class="bi bi-check-circle me-1"></i>Diluluskan
                                    </span>
                                @elseif($permohonan->status == 'rejected')
                                    <span class="badge-status badge-rejected">
                                        <i class="bi bi-x-circle me-1"></i>Ditolak
                                    </span>
                                @elseif($permohonan->status == 'interview')
                                    <span class="badge-status badge-interview">
                                        <i class="bi bi-person-check me-1"></i>Temuduga
                                    </span>
                                @else
                                    <span class="badge-status badge-pending">
                                        <i class="bi bi-question-circle me-1"></i>{{ ucfirst($permohonan->status) }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.permohonan.show', $permohonan->id) }}" class="btn btn-sm btn-action btn-view" title="Lihat Permohonan">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty-state">
            <i class="bi bi-file-earmark-text"></i>
            <h5>Tiada Permohonan Dijumpai</h5>
            <p>Belum ada permohonan yang diterima dalam sistem.</p>
        </div>
    @endif
</div>

@push('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#permohonanTable').DataTable({
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
    function confirmDelete(pemohonName) {
        return confirm(`Adakah anda pasti mahu memadam permohonan daripada "${pemohonName}"? Tindakan ini tidak boleh dibatalkan.`);
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
    
    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #6c757d;
    }
    
    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
</style>
@endpush
@endsection