@extends('admin.induk')

@push('styles')
<style>
    .stats-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
    }
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    .stats-card .card-body {
        padding: 2rem;
    }
    .stats-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
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
        color: #2c3e50;
    }
    .stats-label {
        color: #6c757d;
        font-weight: 500;
        margin: 0;
    }
    .table-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .table-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        border: none;
    }
    .table-header h5 {
        margin: 0;
        font-weight: 600;
    }
    .custom-table {
        margin: 0;
    }
    .custom-table thead th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }
    .custom-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #e9ecef;
    }
    .custom-table tbody tr:hover {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
        transform: scale(1.01);
    }
    .custom-table tbody td {
        padding: 1rem;
        vertical-align: middle;
        border: none;
    }
    .btn-action {
        border-radius: 8px;
        padding: 0.5rem 0.75rem;
        font-weight: 500;
        transition: all 0.3s ease;
        border: none;
        margin: 0 2px;
    }
    .btn-action:hover {
        transform: translateY(-2px);
    }
    .btn-edit {
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        color: #d68910;
    }
    .btn-edit:hover {
        background: linear-gradient(135deg, #fcb69f 0%, #ffecd2 100%);
        color: #b7670f;
        box-shadow: 0 5px 15px rgba(252, 182, 159, 0.4);
    }
    .btn-delete {
        background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
        color: #e74c3c;
    }
    .btn-delete:hover {
        background: linear-gradient(135deg, #fecfef 0%, #ff9a9e 100%);
        color: #c0392b;
        box-shadow: 0 5px 15px rgba(255, 154, 158, 0.4);
    }
    .btn-add {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 10px;
        padding: 0.75rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }
    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }
    .page-header {
        margin-bottom: 2rem;
    }
    .page-title {
        color: #2c3e50;
        font-weight: 700;
        margin-bottom: 0.5rem;
        position: relative;
        padding-bottom: 0.5rem;
    }
    .page-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        border-radius: 2px;
    }
    .breadcrumb-custom {
        background: none;
        padding: 0;
        margin: 0;
    }
    .breadcrumb-custom .breadcrumb-item {
        color: #6c757d;
    }
    .breadcrumb-custom .breadcrumb-item.active {
        color: #764ba2;
        font-weight: 600;
    }
    .fade-in {
        animation: fadeInUp 0.6s ease-out;
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
    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .status-active {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        color: #27ae60;
    }
    .status-inactive {
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        color: #e74c3c;
    }
    .search-box {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }
    .search-box:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
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

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1 class="page-title"><i class="bi bi-people me-2"></i>Pengurusan Pengguna</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bi bi-house me-1"></i>Dashboard</a></li>
                <li class="breadcrumb-item active">Pengguna</li>
            </ol>
        </nav>
    </div>

    @include('alerts')
    
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card stats-card fade-in" style="animation-delay: 0.1s">
                <div class="card-body text-center">
                    <div class="stats-icon mx-auto" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <i class="bi bi-people"></i>
                    </div>
                    <h3 class="stats-number">{{ $senaraiUsers->count() }}</h3>
                    <p class="stats-label">Jumlah Pengguna</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stats-card fade-in" style="animation-delay: 0.2s">
                <div class="card-body text-center">
                    <div class="stats-icon mx-auto" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                        <i class="bi bi-person-check"></i>
                    </div>
                    <h3 class="stats-number">{{ $senaraiUsers->where('status', 'aktif')->count() }}</h3>
                    <p class="stats-label">Pengguna Aktif</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stats-card fade-in" style="animation-delay: 0.3s">
                <div class="card-body text-center">
                    <div class="stats-icon mx-auto" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);">
                        <i class="bi bi-person-x"></i>
                    </div>
                    <h3 class="stats-number">{{ $senaraiUsers->where('status', 'tidak aktif')->count() }}</h3>
                    <p class="stats-label">Pengguna Tidak Aktif</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stats-card fade-in" style="animation-delay: 0.4s">
                <div class="card-body text-center">
                    <div class="stats-icon mx-auto" style="background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);">
                        <i class="bi bi-person-plus"></i>
                    </div>
                    <h3 class="stats-number">{{ $senaraiUsers->where('created_at', '>=', now()->startOfMonth())->count() }}</h3>
                    <p class="stats-label">Baru Bulan Ini</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Action Bar -->
    <div class="d-flex justify-content-between align-items-center mb-4 fade-in" style="animation-delay: 0.5s">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <input type="text" class="form-control search-box" placeholder="Cari pengguna..." id="searchUser" style="width: 300px;">
            </div>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn btn-add text-white">
            <i class="bi bi-plus-lg me-2"></i>Tambah Pengguna
        </a>
    </div>

    <!-- Users Table -->
    <div class="card table-card fade-in" style="animation-delay: 0.6s">
        <div class="table-header">
            <h5><i class="bi bi-list-ul me-2"></i>Senarai Pengguna</h5>
            <small class="opacity-75">Kelola dan pantau semua pengguna sistem</small>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th><i class="bi bi-hash me-1"></i>ID</th>
                            <th><i class="bi bi-person me-1"></i>Nama</th>
                            <th><i class="bi bi-envelope me-1"></i>Email</th>
                            <th><i class="bi bi-telephone me-1"></i>Telefon</th>
                            <th><i class="bi bi-toggle-on me-1"></i>Status</th>
                            <th><i class="bi bi-calendar me-1"></i>Tarikh Daftar</th>
                            <th><i class="bi bi-gear me-1"></i>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($senaraiUsers as $user)
                        <tr>
                            <td><strong>{{ $user->id }}</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-gradient rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                        <i class="bi bi-person text-white"></i>
                                    </div>
                                    <div>
                                        <strong>{{ $user->name }}</strong>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone ?? '-' }}</td>
                            <td>
                                @if($user->status == 'aktif')
                                    <span class="status-badge status-active">
                                        <i class="bi bi-check-circle me-1"></i>Aktif
                                    </span>
                                @else
                                    <span class="status-badge status-inactive">
                                        <i class="bi bi-x-circle me-1"></i>{{ $user->status ?? 'Tidak Aktif' }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div>
                                    <strong>{{ $user->created_at }}</strong><br>
                                    <small class="text-muted">{{ $user->created_at }}</small>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-action btn-edit" title="Edit Pengguna">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Adakah anda pasti mahu memadam pengguna ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-action btn-delete" title="Padam Pengguna">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <i class="bi bi-people"></i>
                                    <h5>Tiada Pengguna Dijumpai</h5>
                                    <p>Belum ada pengguna yang didaftarkan dalam sistem.</p>
                                    <a href="{{ route('admin.users.create') }}" class="btn btn-add text-white">
                                        <i class="bi bi-plus-lg me-2"></i>Tambah Pengguna Pertama
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
@endsection

@push('scripts')
<script>
// Search functionality
document.getElementById('searchUser').addEventListener('keyup', function() {
    const searchTerm = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('.custom-table tbody tr');
    
    tableRows.forEach(row => {
        const name = row.cells[1].textContent.toLowerCase();
        const email = row.cells[2].textContent.toLowerCase();
        const phone = row.cells[3].textContent.toLowerCase();
        
        if (name.includes(searchTerm) || email.includes(searchTerm) || phone.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Enhanced delete confirmation
function confirmDelete(userName) {
    return confirm(`Adakah anda pasti mahu memadam pengguna "${userName}"? Tindakan ini tidak boleh dibatalkan.`);
}
</script>
@endpush
