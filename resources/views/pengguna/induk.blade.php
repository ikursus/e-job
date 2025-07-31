<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'E-Job') }} - @yield('page-title', 'Dashboard')</title>

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        :root {
            --sidebar-width: 250px;
            --primary-color: #28a745;
            --secondary-color: #20c997;
            --sidebar-bg: #198754;
            --sidebar-hover: #157347;
            --accent-color: #fd7e14;
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
            background: linear-gradient(135deg, var(--sidebar-bg) 0%, #157347 100%);
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
            box-shadow: 0 2px 10px rgba(40, 167, 69, 0.3);
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
            color: #198754;
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
            box-shadow: 0 3px 15px rgba(40, 167, 69, 0.4);
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

        /* User Component Classes */
        .user-page-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(40, 167, 69, 0.3);
            animation: fadeInDown 0.8s ease-out;
        }

        .user-page-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .user-breadcrumb {
            background: rgba(255,255,255,0.1);
            border-radius: 25px;
            padding: 0.5rem 1rem;
            margin-top: 1rem;
        }

        .user-breadcrumb .breadcrumb-item a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .user-breadcrumb .breadcrumb-item a:hover {
            color: white;
        }

        .user-breadcrumb .breadcrumb-item.active {
            color: white;
            font-weight: 600;
        }

        .user-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: none;
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease-out;
        }

        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .user-stats-card {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: none;
            transition: all 0.3s ease;
            height: 100%;
            animation: fadeInUp 0.8s ease-out;
        }

        .user-stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .user-stats-icon {
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

        .user-stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .user-stats-label {
            color: #6c757d;
            font-weight: 500;
            margin: 0;
        }

        .user-btn-gradient {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
        }

        .user-btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.6);
            color: white;
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
            <h4><i class="bi bi-person-workspace me-2"></i><span>E-Job</span></h4>
        </div>

        <div class="sidebar-menu">
            <a href="{{ route('dashboard.pengguna') }}" class="nav-link {{ request()->is('pengguna/dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ url('/profile') }}" class="nav-link {{ request()->is('pengguna/profile*') ? 'active' : '' }}">
                <i class="bi bi-person"></i>
                <span>Profil Saya</span>
            </a>

            <a href="{{ route('permohonan.index') }}" class="nav-link {{ request()->is('pengguna/applications*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i>
                <span>Permohonan Saya</span>
            </a>

            <a href="{{ route('posts.index') }}" class="nav-link {{ request()->is('pengguna/posts*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i>
                <span>Senarai Posts</span>
            </a>

            <a href="{{ route('jobs.index') }}" class="nav-link {{ request()->is('pengguna/jobs*') ? 'active' : '' }}">
                <i class="bi bi-briefcase"></i>
                <span>Cari Kerja</span>
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
                        <button class="btn btn-link text-decoration-none position-relative" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-bell" style="font-size: 1.2rem;"></i>
                            <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle" style="font-size: 0.6rem;">2</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><h6 class="dropdown-header">Notifikasi</h6></li>
                            <li><a class="dropdown-item" href="#">Status permohonan diperbarui</a></li>
                            <li><a class="dropdown-item" href="#">Jawatan baru tersedia</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-center" href="{{ url('/pengguna/notifications') }}">Lihat semua</a></li>
                        </ul>
                    </div>

                    <!-- User Dropdown -->
                    <div class="dropdown user-dropdown">
                        <button class="dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                                <i class="bi bi-person-fill text-white"></i>
                            </div>
                            <span>{{ Auth::user()->name ?? 'Pengguna' }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ url('/pengguna/profile') }}"><i class="bi bi-person me-2"></i>Profil</a></li>
                            <li><a class="dropdown-item" href="{{ url('/pengguna/settings') }}"><i class="bi bi-gear me-2"></i>Tetapan</a></li>
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

    <!-- Custom scripts -->
    @stack('scripts')
</body>
</html>
