<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin - BeBePe')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
        .admin-sidebar {
            width: 260px;
            min-height: 100vh;
            background-color: #1e293b; /* Slate 800 */
            color: #e2e8f0;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: all 0.3s;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
        }
        .admin-content-wrapper {
            margin-left: 260px;
            transition: all 0.3s;
        }
        .sidebar-brand {
            padding: 1.5rem 1.5rem;
            display: flex;
            align-items: center;
            font-weight: 700;
            font-size: 1.25rem;
            color: #ffffff;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 1rem;
        }
        .sidebar-brand i {
            color: #1abc9c;
        }
        .nav-title {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #94a3b8;
            padding: 0.75rem 1.5rem 0.25rem;
            font-weight: 600;
        }
        .admin-sidebar .nav-link {
            color: #cbd5e1;
            padding: 0.8rem 1.5rem;
            font-size: 0.95rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            border-left: 4px solid transparent;
            transition: all 0.2s;
        }
        .admin-sidebar .nav-link:hover {
            color: #fff;
            background-color: rgba(255,255,255,0.05);
        }
        .admin-sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(26, 188, 156, 0.1); /* Subtle green tint */
            border-left-color: #1abc9c;
        }
        .admin-sidebar .nav-link i {
            width: 24px;
            margin-right: 12px;
            font-size: 1.1rem;
            text-align: center;
        }
        .logout-btn-container {
            margin-top: auto; /* Push to bottom if flex container */
            padding: 1rem 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        .admin-header {
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
        }
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-content-wrapper {
                margin-left: 0;
            }
        }
    </style>
    @yield('styles')
</head>
<body style="background-color: #f3f4f6;">

    <!-- Sidebar -->
    <div class="admin-sidebar d-flex flex-column" id="adminSidebar">
        <a href="{{ url('/') }}" class="sidebar-brand text-decoration-none">
            <i class="fas fa-shield-alt fa-lg me-3"></i>
            <span>Admin Panel</span>
        </a>

        <ul class="nav flex-column mb-auto">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Tableau de bord
                </a>
            </li>
            
            <div class="nav-title mt-3">Gestion</div>
            
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/reports*') ? 'active' : '' }}" href="{{ route('admin.reports.index') }}">
                    <i class="fas fa-file-invoice"></i> Signalements
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users"></i> Utilisateurs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/resources*') ? 'active' : '' }}" href="{{ route('admin.resources.index') }}">
                    <i class="fas fa-book-open"></i> Ressources
                </a>
            </li>
        </ul>

        <div class="logout-btn-container mt-auto">
             <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link w-100 text-start border-0 bg-transparent text-danger ps-0">
                    <i class="fas fa-sign-out-alt"></i> Déconnexion
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content Wrapper -->
    <div class="admin-content-wrapper">
        <!-- Header -->
        <div class="admin-header">
            <div class="d-flex align-items-center">
                <button class="btn btn-link text-dark d-md-none me-3" onclick="document.getElementById('adminSidebar').classList.toggle('show')">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
                <h5 class="mb-0 fw-bold text-secondary">@yield('page-title', 'Tableau de bord')</h5>
            </div>
            
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2 shadow-sm" style="width: 38px; height: 38px; background-color: #1abc9c !important;">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <span class="d-none d-sm-inline fw-medium">{{ Auth::user()->name ?? 'Admin' }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li><a class="dropdown-item" href="#">Paramètres</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Déconnexion</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="p-4">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
