<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Sewa Motor</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .sidebar {
            height: 100vh;
            background: linear-gradient(180deg, #2D3142, #1f222e);
            color: #fff;
            position: fixed;
            width: 250px;
            overflow-y: auto;
        }
        .sidebar-brand {
            padding: 20px;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            background: #232736;
            color: #7A58E6;
        }
        .sidebar .nav-link {
            color: #c2c7d0;
            padding: 12px 20px;
            margin: 4px 10px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #7A58E6;
            color: #fff;
        }
        .sidebar .nav-link i {
            width: 25px;
        }
        .main-content {
            margin-left: 250px;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .topbar {
            background: #fff;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content-area {
            padding: 30px;
            flex-grow: 1;
        }
        .btn-primary {
            background-color: #7A58E6;
            border-color: #7A58E6;
        }
        .btn-primary:hover {
            background-color: #5B42D1;
            border-color: #5B42D1;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            margin-bottom: 20px;
        }
    </style>
    @stack('styles')
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <i class="fas fa-motorcycle"></i> SewaMotor
    </div>
    <ul class="nav flex-column mt-3">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                <i class="fas fa-tags"></i> Kategori Motor
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.motors.*') ? 'active' : '' }}" href="{{ route('admin.motors.index') }}">
                <i class="fas fa-motorcycle"></i> Data Motor
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                <i class="fas fa-users"></i> Data Pengguna
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.vouchers.*') ? 'active' : '' }}" href="{{ route('admin.vouchers.index') }}">
                <i class="fas fa-ticket-alt"></i> Voucher Diskon
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}" href="{{ route('admin.bookings.index') }}">
                <i class="fas fa-shopping-cart"></i> Pesanan / Booking
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
                <i class="fas fa-comments"></i> Percakapan / Chat
            </a>
        </li>
        <!-- Other Entities CRUD links -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}" href="{{ route('admin.faqs.index') }}">
                <i class="fas fa-question-circle"></i> FAQ
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.app_infos.*') ? 'active' : '' }}" href="{{ route('admin.app_infos.index') }}">
                <i class="fas fa-info-circle"></i> Info Aplikasi
            </a>
        </li>
    </ul>
</div>

<div class="main-content">
    <div class="topbar">
        <h4 class="mb-0">@yield('title', 'Dashboard')</h4>
        <div>
            <span class="me-3 fw-bold">{{ Auth::guard('admin')->user()->name }}</span>
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">Logout</button>
            </form>
        </div>
    </div>

    <div class="content-area">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
