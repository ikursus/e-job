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
    
    .stats-card {
        background: white;
        border-radius: 20px;
        padding: 1.5rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border: none;
        transition: all 0.3s ease;
        height: 100%;
        animation: fadeInUp 0.8s ease-out;
    }
    
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    
    .stats-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        margin-bottom: 1rem;
    }
    
    .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .stats-label {
        color: #6c757d;
        font-weight: 500;
        margin: 0;
    }
    
    .btn-add {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 12px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
    
    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        color: white;
    }
    
    .table-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        border: none;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out;
    }
    
    .table-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        margin: 0;
    }
    
    .table-header h5 {
        margin: 0;
        font-weight: 600;
        font-size: 1.25rem;
    }
    
    .custom-table {
        margin: 0;
    }
    
    .custom-table thead th {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: none;
        padding: 1rem;
        font-weight: 600;
        color: #495057;
        border-bottom: 2px solid #dee2e6;
    }
    
    .custom-table tbody td {
        padding: 1rem;
        border: none;
        border-bottom: 1px solid #f1f3f4;
        vertical-align: middle;
    }
    
    .custom-table tbody tr {
        transition: all 0.3s ease;
    }
    
    .custom-table tbody tr:hover {
        background: linear-gradient(135deg, #f8f9ff 0%, #f0f2ff 100%);
        transform: scale(1.01);
    }
    
    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
    }
    
    .status-open {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        color: #155724;
    }
    
    .status-closed {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        color: #721c24;
    }
    
    .btn-action {
        border: none;
        border-radius: 8px;
        padding: 0.5rem;
        margin: 0 0.25rem;
        transition: all 0.3s ease;
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    .btn-edit {
        background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
        color: white;
    }
    
    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
        color: white;
    }
    
    .btn-delete {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: white;
    }
    
    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
        color: white;
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
        
        .stats-card {
            margin-bottom: 1rem;
        }
        
        .custom-table {
            font-size: 0.875rem;
        }
        
        .btn-action {
            width: 30px;
            height: 30px;
        }
    }
</style>

<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header fade-in">
        <div class="container">
            <h1 class="page-title"><i class="bi bi-briefcase me-2"></i>Pengurusan Jawatan</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bi bi-house me-1"></i>Dashboard</a></li>
                    <li class="breadcrumb-item active">Jawatan</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        @include('alerts')
        
        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card stats-card fade-in" style="animation-delay: 0.1s">
                    <div class="stats-icon mx-auto" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <h3 class="stats-number">{{ isset($senaraiJawatan) ? $senaraiJawatan->count() : 0 }}</h3>
                    <p class="stats-label">Jumlah Jawatan</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card stats-card fade-in" style="animation-delay: 0.2s">
                    <div class="stats-icon mx-auto" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <h3 class="stats-number">{{ isset($senaraiJawatan) ? $senaraiJawatan->where('status', 'open')->count() : 0 }}</h3>
                    <p class="stats-label">Jawatan Buka</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card stats-card fade-in" style="animation-delay: 0.3s">
                    <div class="stats-icon mx-auto" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);">
                        <i class="bi bi-x-circle"></i>
                    </div>
                    <h3 class="stats-number">{{ isset($senaraiJawatan) ? $senaraiJawatan->where('status', 'closed')->count() : 0 }}</h3>
                    <p class="stats-label">Jawatan Tutup</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card stats-card fade-in" style="animation-delay: 0.4s">
                    <div class="stats-icon mx-auto" style="background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);">
                        <i class="bi bi-calendar-plus"></i>
                    </div>
                    <h3 class="stats-number">{{ isset($senaraiJawatan) ? $senaraiJawatan->where('created_at', '>=', now()->startOfMonth())->count() : 0 }}</h3>
                    <p class="stats-label">Bulan Ini</p>
                </div>
            </div>
        </div>
        
        <!-- Action Button -->
        <div class="d-flex justify-content-between align-items-center mb-4 fade-in" style="animation-delay: 0.5s">
            <div></div>
            <a href="{{ route('admin.jawatan.create') }}" class="btn btn-add text-white">
                <i class="bi bi-plus-lg me-2"></i>Tambah Jawatan
            </a>
        </div>
        
        <!-- Jawatan Table -->
        <div class="card table-card fade-in" style="animation-delay: 0.6s">
            <div class="table-header">
                <h5><i class="bi bi-list-ul me-2"></i>Senarai Jawatan</h5>
                <small class="opacity-75">Kelola dan pantau semua jawatan sistem</small>
            </div>
            
            @if(isset($senaraiJawatan) && count($senaraiJawatan) > 0)
                <div class="table-responsive">
                    <table id="jawatanTable" class="table custom-table">
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
                                            <span class="status-badge status-open">
                                                <i class="bi bi-check-circle me-1"></i>Buka
                                            </span>
                                        @else
                                            <span class="status-badge status-closed">
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
    </div>
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
