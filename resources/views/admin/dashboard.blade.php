@extends('admin.induk')

@push('styles')
<style>
    .stats-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
    }
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    }
    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0.1) 100%);
    }
    .stats-card .card-body {
        padding: 2rem;
        position: relative;
    }
    .stats-icon {
        font-size: 3rem;
        opacity: 0.2;
        position: absolute;
        right: 1rem;
        top: 1rem;
    }
    .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .stats-title {
        font-size: 1rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
        opacity: 0.9;
    }
    .primary-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .success-gradient {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    .info-gradient {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }
    .warning-gradient {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }
    .data-table-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }
    .data-table-card:hover {
        box-shadow: 0 8px 30px rgba(0,0,0,0.12);
    }
    .table-header {
        border-radius: 15px 15px 0 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 1rem 1.5rem;
        color: white;
        font-weight: 600;
        border: none;
    }
    .table-header.success {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    .table thead th {
        border: none;
        background-color: #f8f9fa;
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
    .page-title {
        color: #2c3e50;
        font-weight: 700;
        margin-bottom: 2rem;
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
</style>
@endpush

@section('content')
<div class="container-fluid">
    <h1 class="page-title fade-in"><i class="fas fa-tachometer-alt me-2"></i>Dashboard Admin</h1>
    
    <!-- Statistics Cards -->
    <div class="row mb-5">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card primary-gradient text-white fade-in" style="animation-delay: 0.1s">
                <div class="card-body">
                    <i class="fas fa-users stats-icon"></i>
                    <h6 class="stats-title">Total Users</h6>
                    <p class="stats-number">{{ $totalUsers ?? '0' }}</p>
                    <small class="opacity-75"><i class="fas fa-arrow-up me-1"></i>Pengguna Terdaftar</small>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card success-gradient text-white fade-in" style="animation-delay: 0.2s">
                <div class="card-body">
                    <i class="fas fa-briefcase stats-icon"></i>
                    <h6 class="stats-title">Total Jawatan</h6>
                    <p class="stats-number">{{ $totalJawatan ?? '0' }}</p>
                    <small class="opacity-75"><i class="fas fa-arrow-up me-1"></i>Jawatan Tersedia</small>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card info-gradient text-white fade-in" style="animation-delay: 0.3s">
                <div class="card-body">
                    <i class="fas fa-chart-line stats-icon"></i>
                    <h6 class="stats-title">Aktiviti Hari Ini</h6>
                    <p class="stats-number">{{ $todayActivity ?? '0' }}</p>
                    <small class="opacity-75"><i class="fas fa-clock me-1"></i>Aktiviti Terkini</small>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card warning-gradient text-white fade-in" style="animation-delay: 0.4s">
                <div class="card-body">
                    <i class="fas fa-star stats-icon"></i>
                    <h6 class="stats-title">Rating Sistem</h6>
                    <p class="stats-number">4.8</p>
                    <small class="opacity-75"><i class="fas fa-thumbs-up me-1"></i>Kepuasan Pengguna</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Tables -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card data-table-card fade-in" style="animation-delay: 0.5s">
                <div class="table-header">
                    <i class="fas fa-user-plus me-2"></i>10 Pendaftaran User Terbaru
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-hashtag me-1"></i>#</th>
                                    <th><i class="fas fa-user me-1"></i>Nama</th>
                                    <th><i class="fas fa-envelope me-1"></i>Email</th>
                                    <th><i class="fas fa-calendar me-1"></i>Tarikh Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestUsers as $user)
                                <tr>
                                    <td><span class="badge bg-primary">{{ $loop->iteration }}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center me-2">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                            <strong>{{ $user->name }}</strong>
                                        </div>
                                    </td>
                                    <td><span class="text-muted">{{ $user->email }}</span></td>
                                    <td>
                                        <small class="text-success">
                                            <i class="fas fa-clock me-1"></i>{{ $user->created_at->format('d/m/Y H:i') }}
                                        </small>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4">
                                        <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                                        <p class="text-muted mb-0">Tiada data pengguna</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card data-table-card fade-in" style="animation-delay: 0.6s">
                <div class="table-header success">
                    <i class="fas fa-briefcase me-2"></i>10 Jawatan Terbaru
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-hashtag me-1"></i>#</th>
                                    <th><i class="fas fa-briefcase me-1"></i>Nama Jawatan</th>
                                    <th><i class="fas fa-calendar-plus me-1"></i>Tarikh Cipta</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestJawatan as $jawatan)
                                <tr>
                                    <td><span class="badge bg-success">{{ $loop->iteration }}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm bg-success rounded-circle d-flex align-items-center justify-content-center me-2">
                                                <i class="fas fa-briefcase text-white"></i>
                                            </div>
                                            <strong>{{ $jawatan->nama ?? '-' }}</strong>
                                        </div>
                                    </td>
                                    <td>
                                        <small class="text-info">
                                            <i class="fas fa-clock me-1"></i>{{ $jawatan->created_at->format('d/m/Y H:i') }}
                                        </small>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4">
                                        <i class="fas fa-briefcase fa-2x text-muted mb-2"></i>
                                        <p class="text-muted mb-0">Tiada data jawatan</p>
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
<style>
    .avatar-sm {
        width: 32px;
        height: 32px;
        font-size: 0.75rem;
    }
</style>
@endpush
