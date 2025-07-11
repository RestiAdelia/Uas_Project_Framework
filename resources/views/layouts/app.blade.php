<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'ladnding page')</title>
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <header>
        <nav>
            <div class="nav-logo">Pengaduan</div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
 <footer class="footer-modern mt-5">
        <div class="footer-container">
            <div class="footer-info">
                <h4><i class="fas fa-bullhorn me-2"></i>Pengaduan Masyarakat</h4>
                <p>Sistem pelaporan masyarakat yang cepat, aman, dan terpercaya.</p>
            </div>
        </div>
        <div class="footer-bottom text-center">
            &copy; {{ date('Y') }} Pengaduan Masyarakat. By Resti Adelia
        </div>
    </footer>
</body>

</html>
