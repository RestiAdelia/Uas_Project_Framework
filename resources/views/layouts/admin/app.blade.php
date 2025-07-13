<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Submission Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
    <header class="navbar">
        <div class="logo">Pengajuan</div>
        <div class="spacer"></div>
        <div class="dropdown d-flex align-items-center gap-2">
            <span class="material-icons text-dark">person</span>
            <span class="text-dark">
                @auth
                    {{ Auth::user()->name }}
                @else
                    Tamu
                @endauth
            </span>
            @auth
                <a href="#" class="dropdown-toggle text-dark" id="dropdownIcon" data-bs-toggle="dropdown"
                    aria-expanded="false">
                </a>
                <ul class="dropdown-menu dropdown-menu-end bg-dark text-white" aria-labelledby="dropdownIcon">
                    <li>
                        <form action="{{ route('logout') }}" method="POST"
                            onsubmit="return confirm('Yakin ingin logout?');">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center gap-2 text-white bg-dark">
                                <span class="material-icons">logout</span> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            @endauth
        </div>
    </header>
    <div class="dashboard">
        <aside class="sidebar">
            <nav>
                <a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
                    <span class="material-icons">dashboard</span> Dashboard
                </a>
                <a href="{{ route('complaints.list') }}" class="{{ Request::routeIs('pengaduan.*') ? 'active' : '' }}">
                    <span class="material-icons">report_problem</span> Pengaduan
                </a>
                <a href="{{ route('pelapor.index') }}" class="{{ Request::routeIs('pelapor.*') ? 'active' : '' }}">
                    <span class="material-icons">person</span> Pelapor
                </a>
                <a href="{{ route('respon.index') }}" class="{{ Request::routeIs('respon.*') ? 'active' : '' }}">
                    <span class="material-icons">reply</span> Respon
                </a>

                <a href="{{ route('category.index') }}" class="{{ Request::routeIs('category.*') ? 'active' : '' }}">
                    <span class="material-icons me-1">category</span> Kategori
                </a>
            </nav>
        </aside>
        <main class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>
