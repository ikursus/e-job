@extends('pengguna.induk')

@section('page-title', 'Senarai Jawatan')

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
    .status-active {
        background-color: #d1edff;
        color: #0c5460;
        border: 1px solid #b8daff;
    }
    .status-inactive {
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
    .job-card {
        transition: transform 0.2s ease;
    }
    .job-card:hover {
        transform: translateY(-2px);
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="user-page-header text-center">
        <div class="container">
            <h1 class="user-page-title">Senarai Posts</h1>
            <nav class="user-breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.pengguna') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Posts</li>
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
                            <i class="bi bi-briefcase me-2 text-primary"></i>
                            Senarai Posts
                        </h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="jawatanTable" class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($senaraiPosts as $post)
                                <tr class="job-card">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="fw-bold">{{ $post['title'] }}</div>
                                    </td>
                                    <td>
                                        {{ Str::limit($post['body'], 50, '...') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-primary btn-sm">
                                            Lihat
                                        </a>
                                    </td>
                                </tr>
                                    @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-briefcase display-4 d-block mb-3"></i>
                                            <h5>Tiada Posts Tersedia</h5>
                                            <p>Tiada posts yang tersedia pada masa ini.</p>
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
    $('#jawatanTable').DataTable({
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/ms.json'
        },
        order: [[1, 'asc']], // Sort by job title ascending
        columnDefs: [
            { orderable: false, targets: [5] }, // Disable sorting for action column
            { className: 'text-center', targets: [0, 3, 4, 5] }
        ],
        pageLength: 10,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
             '<"row"<"col-sm-12"tr>>' +
             '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>'
    });
});

function mohonJawatan(jawatanId) {
    if (confirm('Adakah anda pasti ingin memohon jawatan ini?')) {
        // Add AJAX call to submit application
        fetch('/permohonan', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                jawatan_id: jawatanId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                // Optionally redirect to permohonan page
                window.location.href = '/permohonan';
            } else {
                alert('Ralat: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ralat berlaku semasa menghantar permohonan.');
        });
    }
}
</script>
@endpush
