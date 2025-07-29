@extends('pengguna.induk')

@section('page-title', 'Permohonan Saya')

@push('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
<style>
    .status-badge {
        padding: 0.375rem 0.75rem;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
    }
    .status-pending {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }
    .status-approved {
        background-color: #d1edff;
        color: #0c5460;
        border: 1px solid #b8daff;
    }
    .status-rejected {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    .table-responsive {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        margin-bottom: 1rem;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="user-page-header text-center">
        <div class="container">
            <h1 class="user-page-title">Permohonan Saya</h1>
            <nav class="user-breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.pengguna') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Permohonan</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Content Section -->
    <div class="row">
        <div class="col-12">
            <div class="user-card">
                <div class="card-header bg-transparent border-0 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-file-earmark-text me-2 text-primary"></i>
                            Senarai Permohonan
                        </h5>
                        <a href="{{ route('jobs.index') }}" class="user-btn-gradient text-decoration-none">
                            <i class="bi bi-plus-circle me-2"></i>Mohon Jawatan Baru
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="permohonanTable" class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Jawatan</th>
                                    <th>Description</th>
                                    <th>Tarikh Mohon</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($senaraiPermohonan as $index => $permohonan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div class="fw-bold">{{ $permohonan->jawatan->title ?? 'N/A' }}</div>
                                        
                                    </td>
                                    <td>{{ $permohonan->jawatan->description ?? 'N/A' }}</td>
                                    <td>
                                        <div>{{ $permohonan->created_at }}</div>
                                        <small class="text-muted">{{ $permohonan->created_at }}</small>
                                    </td>
                                    <td>
                                        @switch($permohonan->status)
                                            @case('pending')
                                                <span class="status-badge status-pending">
                                                    <i class="bi bi-clock me-1"></i>Dalam Proses
                                                </span>
                                                @break
                                            @case('approved')
                                                <span class="status-badge status-approved">
                                                    <i class="bi bi-check-circle me-1"></i>Diterima
                                                </span>
                                                @break
                                            @case('rejected')
                                                <span class="status-badge status-rejected">
                                                    <i class="bi bi-x-circle me-1"></i>Ditolak
                                                </span>
                                                @break
                                            @default
                                                <span class="status-badge status-pending">
                                                    <i class="bi bi-question-circle me-1"></i>Tidak Diketahui
                                                </span>
                                        @endswitch
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-sm btn-outline-primary" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#detailModal{{ $permohonan->id }}">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            @if($permohonan->status === 'pending')
                                            <a href="{{ route('permohonan.edit', $permohonan->id) }}" 
                                               class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                    onclick="batalPermohonan({{ $permohonan->id }})">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-inbox display-4 d-block mb-3"></i>
                                            <h5>Tiada Permohonan</h5>
                                            <p>Anda belum membuat sebarang permohonan jawatan.</p>
                                            <a href="{{ route('jobs.index') }}" class="user-btn-gradient text-decoration-none">
                                                <i class="bi bi-search me-2"></i>Cari Jawatan
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Detail Modals -->
@foreach($senaraiPermohonan as $permohonan)
<div class="modal fade" id="detailModal{{ $permohonan->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-file-earmark-text me-2"></i>
                    Detail Permohonan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="fw-bold text-primary">Maklumat Jawatan</h6>
                        <table class="table table-borderless table-sm">
                            <tr>
                                <td class="fw-bold">Nama Jawatan:</td>
                                <td>{{ $permohonan->jawatan->title ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Description:</td>
                                <td>{{ $permohonan->jawatan->description ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kuota:</td>
                                <td>{{ $permohonan->jawatan->quota ?? '0' }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold text-primary">Maklumat Permohonan</h6>
                        <table class="table table-borderless table-sm">
                            <tr>
                                <td class="fw-bold">Tarikh Mohon:</td>
                                <td>{{ $permohonan->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Status:</td>
                                <td>
                                    @switch($permohonan->status)
                                        @case('pending')
                                            <span class="status-badge status-pending">
                                                <i class="bi bi-clock me-1"></i>Dalam Proses
                                            </span>
                                            @break
                                        @case('approved')
                                            <span class="status-badge status-approved">
                                                <i class="bi bi-check-circle me-1"></i>Diterima
                                            </span>
                                            @break
                                        @case('rejected')
                                            <span class="status-badge status-rejected">
                                                <i class="bi bi-x-circle me-1"></i>Ditolak
                                            </span>
                                            @break
                                    @endswitch
                                </td>
                            </tr>
                            @if($permohonan->catatan)
                            <tr>
                                <td class="fw-bold">Catatan:</td>
                                <td>{{ $permohonan->catatan }}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@push('scripts')
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(document).ready(function() {
    $('#permohonanTable').DataTable({
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/ms.json'
        },
        order: [[3, 'desc']], // Sort by date descending
        columnDefs: [
            { orderable: false, targets: [5] }, // Disable sorting for action column
            { className: 'text-center', targets: [0, 4, 5] }
        ],
        pageLength: 10,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
             '<"row"<"col-sm-12"tr>>' +
             '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>'
    });
});

function batalPermohonan(id) {
    if (confirm('Adakah anda pasti ingin membatalkan permohonan ini?')) {
        // Add AJAX call to cancel application using the correct route
        fetch(`/permohonan/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                alert(data.message);
                location.reload();
            } else {
                alert('Ralat: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ralat berlaku semasa membatalkan permohonan.');
        });
    }
}
</script>
@endpush