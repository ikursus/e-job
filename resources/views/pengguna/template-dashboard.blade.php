@extends('pengguna.induk')

@section('page-title', 'Dashboard')

@push('styles')
<style>
    .welcome-card {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(40, 167, 69, 0.3);
        animation: fadeInDown 0.8s ease-out;
    }
    
    .welcome-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .welcome-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        margin: 0;
    }
    
    .quick-stats {
        margin-bottom: 2rem;
    }
    
    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        height: 100%;
        border: none;
        animation: fadeInUp 0.8s ease-out;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    
    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        margin-bottom: 1rem;
    }
    
    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
        color: #2c3e50;
    }
    
    .stat-label {
        color: #6c757d;
        font-weight: 500;
        margin: 0;
        font-size: 0.9rem;
    }
    
    .recent-activity {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        border: none;
        animation: fadeInUp 0.8s ease-out;
    }
    
    .activity-header {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        padding: 1.5rem;
        border-radius: 15px 15px 0 0;
        margin: 0;
    }
    
    .activity-item {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #e9ecef;
        transition: background-color 0.3s ease;
    }
    
    .activity-item:last-child {
        border-bottom: none;
    }
    
    .activity-item:hover {
        background-color: #f8f9fa;
    }
    
    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        color: white;
        margin-right: 1rem;
    }
    
    .activity-content h6 {
        margin: 0;
        font-weight: 600;
        color: #2c3e50;
    }
    
    .activity-content small {
        color: #6c757d;
    }
    
    .quick-actions {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        border: none;
        animation: fadeInUp 0.8s ease-out;
    }
    
    .actions-header {
        background: linear-gradient(135deg, #fd7e14, #ffc107);
        color: white;
        padding: 1.5rem;
        border-radius: 15px 15px 0 0;
        margin: 0;
    }
    
    .action-btn {
        background: linear-gradient(135deg, #28a745, #20c997);
        border: none;
        border-radius: 12px;
        padding: 1rem;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        display: block;
        margin-bottom: 1rem;
        text-align: center;
    }
    
    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
        color: white;
    }
    
    .action-btn:last-child {
        margin-bottom: 0;
    }
    
    .action-btn i {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        display: block;
    }
    
    .bg-primary-gradient {
        background: linear-gradient(135deg, #667eea, #764ba2);
    }
    
    .bg-success-gradient {
        background: linear-gradient(135deg, #28a745, #20c997);
    }
    
    .bg-info-gradient {
        background: linear-gradient(135deg, #17a2b8, #6f42c1);
    }
    
    .bg-warning-gradient {
        background: linear-gradient(135deg, #fd7e14, #ffc107);
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
</style>
@endpush

@section('content')
<!-- Welcome Card -->
<div class="welcome-card">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h2 class="welcome-title">Selamat Datang, {{ Auth::user()->name ?? 'Pengguna' }}!</h2>
            <p class="welcome-subtitle">Semoga hari Anda menyenangkan. Mari mulai mencari peluang kerja terbaik untuk masa depan Anda.</p>
        </div>
        <div class="col-md-4 text-end">
            <i class="bi bi-person-workspace" style="font-size: 4rem; opacity: 0.3;"></i>
        </div>
    </div>
</div>

<!-- Quick Stats -->
<div class="quick-stats">
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon bg-primary-gradient">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <h3 class="stat-number">5</h3>
                <p class="stat-label">Permohonan Aktif</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon bg-success-gradient">
                    <i class="bi bi-check-circle"></i>
                </div>
                <h3 class="stat-number">2</h3>
                <p class="stat-label">Diterima</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon bg-info-gradient">
                    <i class="bi bi-clock"></i>
                </div>
                <h3 class="stat-number">3</h3>
                <p class="stat-label">Menunggu</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon bg-warning-gradient">
                    <i class="bi bi-briefcase"></i>
                </div>
                <h3 class="stat-number">12</h3>
                <p class="stat-label">Jawatan Tersedia</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Activity -->
    <div class="col-md-8 mb-4">
        <div class="recent-activity">
            <div class="activity-header">
                <h5 class="mb-0"><i class="bi bi-clock-history me-2"></i>Aktiviti Terkini</h5>
            </div>
            <div class="card-body p-0">
                <div class="activity-item d-flex align-items-center">
                    <div class="activity-icon bg-success-gradient">
                        <i class="bi bi-check"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Permohonan Diterima</h6>
                        <small>Permohonan untuk jawatan "Web Developer" telah diterima</small>
                        <br><small class="text-muted">2 jam yang lalu</small>
                    </div>
                </div>
                
                <div class="activity-item d-flex align-items-center">
                    <div class="activity-icon bg-primary-gradient">
                        <i class="bi bi-file-plus"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Permohonan Baru</h6>
                        <small>Anda telah memohon untuk jawatan "UI/UX Designer"</small>
                        <br><small class="text-muted">1 hari yang lalu</small>
                    </div>
                </div>
                
                <div class="activity-item d-flex align-items-center">
                    <div class="activity-icon bg-info-gradient">
                        <i class="bi bi-person-check"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Profil Diperbarui</h6>
                        <small>Profil Anda telah diperbarui dengan maklumat terbaru</small>
                        <br><small class="text-muted">3 hari yang lalu</small>
                    </div>
                </div>
                
                <div class="activity-item d-flex align-items-center">
                    <div class="activity-icon bg-warning-gradient">
                        <i class="bi bi-bell"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Jawatan Baru</h6>
                        <small>5 jawatan baru telah ditambah yang sesuai dengan profil Anda</small>
                        <br><small class="text-muted">1 minggu yang lalu</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="col-md-4 mb-4">
        <div class="quick-actions">
            <div class="actions-header">
                <h5 class="mb-0"><i class="bi bi-lightning me-2"></i>Tindakan Pantas</h5>
            </div>
            <div class="card-body">
                <a href="{{ url('/pengguna/jobs') }}" class="action-btn">
                    <i class="bi bi-search"></i>
                    <strong>Cari Kerja</strong>
                    <small class="d-block">Temui peluang kerja terbaik</small>
                </a>
                
                <a href="{{ url('/pengguna/profile') }}" class="action-btn" style="background: linear-gradient(135deg, #17a2b8, #6f42c1);">
                    <i class="bi bi-person-gear"></i>
                    <strong>Kemaskini Profil</strong>
                    <small class="d-block">Perbarui maklumat diri</small>
                </a>
                
                <a href="{{ url('/pengguna/applications') }}" class="action-btn" style="background: linear-gradient(135deg, #fd7e14, #ffc107);">
                    <i class="bi bi-file-earmark-text"></i>
                    <strong>Lihat Permohonan</strong>
                    <small class="d-block">Semak status permohonan</small>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection