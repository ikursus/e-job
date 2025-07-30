<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'E-Job Admin') }}</title>

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --sidebar-width: 250px;
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --sidebar-bg: #2c3e50;
            --sidebar-hover: #34495e;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--sidebar-bg) 0%, #34495e 100%);
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        
        .sidebar.collapsed {
            width: 70px;
        }
        
        .sidebar-header {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }
        
        .sidebar-header h4 {
            color: white;
            margin: 0;
            font-weight: 600;
            transition: opacity 0.3s ease;
        }
        
        .sidebar.collapsed .sidebar-header h4 {
            opacity: 0;
        }
        
        .sidebar-menu {
            padding: 1rem 0;
        }
        
        .sidebar-menu .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        
        .sidebar-menu .nav-link:hover {
            background-color: var(--sidebar-hover);
            color: white;
            transform: translateX(5px);
        }
        
        .sidebar-menu .nav-link.active {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: white;
            box-shadow: 0 2px 10px rgba(102, 126, 234, 0.3);
        }
        
        .sidebar-menu .nav-link i {
            width: 20px;
            margin-right: 10px;
            text-align: center;
        }
        
        .sidebar.collapsed .nav-link span {
            display: none;
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            transition: margin-left 0.3s ease;
            min-height: 100vh;
        }
        
        .main-content.expanded {
            margin-left: 70px;
        }
        
        .top-navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 1.5rem;
            margin-bottom: 0;
        }
        
        .toggle-btn {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #6c757d;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .toggle-btn:hover {
            color: var(--primary-color);
        }
        
        .user-dropdown .dropdown-toggle {
            background: none;
            border: none;
            color: #495057;
            font-weight: 500;
        }
        
        .user-dropdown .dropdown-toggle::after {
            margin-left: 0.5rem;
        }
        
        .content-wrapper {
            padding: 2rem;
        }
        
        .page-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        
        .alert {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 25px rgba(0,0,0,0.15);
        }
        
        .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 3px 15px rgba(102, 126, 234, 0.4);
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }
        
        /* Standard Component Classes */
        .page-header-standard {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            animation: fadeInDown 0.8s ease-out;
        }
        
        .page-title-standard {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .breadcrumb-standard {
            background: rgba(255,255,255,0.1);
            border-radius: 25px;
            padding: 0.5rem 1rem;
            margin-top: 1rem;
        }
        
        .breadcrumb-standard .breadcrumb-item a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .breadcrumb-standard .breadcrumb-item a:hover {
            color: white;
        }
        
        .breadcrumb-standard .breadcrumb-item.active {
            color: white;
            font-weight: 600;
        }
        
        .admin-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: none;
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease-out;
        }
        
        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .admin-form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            border: none;
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out;
        }
        
        .admin-form-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1.5rem;
            margin: 0;
            border-radius: 0;
        }
        
        .admin-form-header h5 {
            margin: 0;
            font-weight: 600;
            font-size: 1.25rem;
        }
        
        .admin-form-body {
            padding: 2rem;
        }
        
        .admin-stats-card {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: none;
            transition: all 0.3s ease;
            height: 100%;
            animation: fadeInUp 0.8s ease-out;
        }
        
        .admin-stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .admin-stats-icon {
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
        
        .admin-stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .admin-stats-label {
            color: #6c757d;
            font-weight: 500;
            margin: 0;
        }
        
        .admin-btn-gradient {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .admin-btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
            color: white;
        }
        
        .admin-form-floating {
            margin-bottom: 1.5rem;
        }
        
        .admin-form-floating > .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 1rem 0.75rem;
            height: auto;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }
        
        .admin-form-floating > .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            background: white;
            transform: translateY(-2px);
        }
        
        .admin-form-floating > label {
            color: #6c757d;
            font-weight: 500;
        }
        
        .admin-form-floating > .form-control:focus ~ label,
        .admin-form-floating > .form-control:not(:placeholder-shown) ~ label {
            color: var(--primary-color);
        }
        
        /* Animation Keyframes */
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
    
    <!-- Custom styles -->
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h4><i class="bi bi-briefcase-fill me-2"></i><span>E-Job Admin</span></h4>
        </div>
        
        <div class="sidebar-menu">
            <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
            
            <a href="{{ url('/admin/users') }}" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                <span>Pengguna</span>
            </a>
            
            <a href="{{ url('/admin/jawatan') }}" class="nav-link {{ request()->is('admin/jawatan*') ? 'active' : '' }}">
                <i class="bi bi-briefcase"></i>
                <span>Jawatan</span>
            </a>
            
            <a href="{{ route('admin.permohonan.index') }}" class="nav-link {{ request()->is('admin/reports*') ? 'active' : '' }}">
                <i class="bi bi-graph-up"></i>
                <span>Permohonan</span>
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <!-- Top Navigation -->
        <nav class="top-navbar">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <button class="toggle-btn" id="toggle-sidebar">
                        <i class="bi bi-list"></i>
                    </button>
                    <h5 class="mb-0 ms-3 page-title">@yield('page-title', 'Dashboard')</h5>
                </div>
                
                <div class="d-flex align-items-center">
                    <!-- Notifications -->
                    <div class="dropdown me-3">
                        <button class="btn btn-link text-decoration-none" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-bell" style="font-size: 1.2rem;"></i>
                            <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle" style="font-size: 0.6rem;">
                                {{ auth()->user()->unreadNotifications->count() }}
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><h6 class="dropdown-header">Notifikasi</h6></li>

                            @foreach( auth()->user()->unreadNotifications as $notification )
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.notifications.read', $notification->id) }}">
                                    Terdapat permohonan baru untuk jawatan<br> 
                                    {{ $notification->data['nama_jawatan'] }}<br>
                                    daripada {{ $notification->data['nama_pemohon'] }}
                                </a>
                            </li>
                            @endforeach

                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-center" href="{{ route('admin.notifications.index') }}">Lihat semua</a></li>
                        </ul>
                    </div>
                    
                    <!-- User Dropdown -->
                    <div class="dropdown user-dropdown">
                        <button class="dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                                <i class="bi bi-person-fill text-white"></i>
                            </div>
                            <span>{{ Auth::user()->name ?? 'Admin' }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ url('/admin/profile') }}"><i class="bi bi-person me-2"></i>Profil</a></li>
                            <li><a class="dropdown-item" href="{{ url('/admin/settings') }}"><i class="bi bi-gear me-2"></i>Tetapan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i>Log Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Bootstrap 5.3 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts -->
    @stack('scripts')
    
    <script>
        // Sidebar toggle functionality
        document.getElementById('toggle-sidebar').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });
        
        // Mobile sidebar toggle
        if (window.innerWidth <= 768) {
            document.getElementById('toggle-sidebar').addEventListener('click', function() {
                const sidebar = document.getElementById('sidebar');
                sidebar.classList.toggle('show');
            });
        }
        
        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
    
</body>
</html>
