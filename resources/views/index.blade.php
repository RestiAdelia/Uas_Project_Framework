<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pengaduan Umum Masyarakat</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <div class="nav-logo">Pengaduan</div>
            <div class="nav-links">
                <a href="#Terajukan">Terajukan</a>
                <a href="#about">About</a>
                <a href="login">Login</a>
            </div>
        </nav>
    </header>

    <main>
        @if (session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif

        <section class="hero">
            <h1>Pengaduan Umum Masyarakat</h1>
            <p>Mari bersama ciptakan kualitas dan fasilitas yang Terbaik</p>
            <a href="{{ route('pelapor.create') }}" class="btn-primary" id="cta-button">Ajukan</a>
        </section>

        <section id="Terajukan" class="features">
            <div class="container">
                <div class="feature-grid">
                    <div class="row text-center">
                        <!-- Total Pengaduan -->
                        <div class="col-md-3 mb-4">
                            <article class="feature-card h-100">
                                <div class="icon-wrapper mb-3">
                                    <i class="fas fa-comments fa-2x text-primary"></i>
                                </div>
                                <h2 class="feature-title">Total Pengaduan</h2>
                                <p class="feature-desc">Jumlah pengaduan: <strong>{{ $jumlahPengajuan }}</strong></p>
                            </article>
                        </div>

                        <!-- Diproses -->
                        <div class="col-md-3 mb-4">
                            <article class="feature-card h-100">
                                <div class="icon-wrapper mb-3">
                                    <i class="fas fa-sync-alt fa-2x text-warning"></i>
                                </div>
                                <h2 class="feature-title">Diproses</h2>
                                <p class="feature-desc">Jumlah pengaduan: <strong>{{ $jumlahProses }}</strong></p>
                            </article>
                        </div>

                        <!-- Selesai -->
                        <div class="col-md-3 mb-4">
                            <article class="feature-card h-100">
                                <div class="icon-wrapper mb-3">
                                    <i class="fas fa-check-circle fa-2x text-success"></i>

                                </div>
                                <h2 class="feature-title">Selesai</h2>
                                <p class="feature-desc">Jumlah pengaduan: <strong>{{ $jumlahSelesai }}</strong></p>
                            </article>
                        </div>

                        <!-- Ditolak -->
                        <div class="col-md-3 mb-4">
                            <article class="feature-card h-100">
                                <div class="icon-wrapper mb-3">
                                    <i class="fas fa-times-circle fa-2x text-danger"></i>
                                </div>
                                <h2 class="feature-title">Ditolak</h2>
                                <p class="feature-desc">Jumlah pengaduan: <strong>{{ $jumlahDitolak }}</strong></p>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Daftar Pengaduan -->
        <section id="Terajukan" class="pengaduan py-5 bg-white">
            <div class="container" id="complain-container">
                <h2 style="text-align: center">Daftar Pengaduan</h2>
                <div class="row g-4" id="complain-list">
                    @foreach ($complains as $complain)
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm">
                                @if ($complain->file)
                                    <img src="{{ asset('storage/' . $complain->file) }}" class="card-img-top"
                                        alt="gambar complain">
                                @else
                                    <img src="{{ asset('images/default.png') }}" class="card-img-top"
                                        alt="default image">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $complain->judul }}</h5>
                                    <p class="card-text">{{ \Illuminate\Support\Str::limit($complain->deskripsi, 80) }}
                                    </p>
                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Status: {{ ucfirst($complain->status) }}</small>
                                    <a href="{{ route('respon.show', $complain->id) }}"
                                        class="btn btn-sm btn-outline-success" title="Lihat Respon">💬</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-4" id="pagination-links">
                    {{ $complains->links() }}
                </div>
            </div>
        </section>
        <section id="about" class="about-modern-section">
            <div class="container">
                <h3 class="about-title">About</h3>
                <p class="about-subtitle">
                    Aplikasi ini memudahkan masyarakat menyampaikan keluhan kepada pihak berwenang dengan sistem yang
                    <span class="highlight">efisien</span>, <span class="highlight">terstruktur</span>, dan <span
                        class="highlight">transparan</span>.
                </p>

                <div class="about-cards">
                    <div class="about-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <h4>Transparansi</h4>
                        <p>Setiap pengaduan tercatat dan dapat dipantau proses penanganannya secara terbuka.</p>
                    </div>

                    <div class="about-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-handshake-angle"></i>
                        </div>
                        <h4>Kemudahan Akses</h4>
                        <p>Masyarakat bisa mengirim laporan dari mana saja tanpa harus datang langsung.</p>
                    </div>

                    <div class="about-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Keamanan Data</h4>
                        <p>Identitas pelapor dijaga dan hanya digunakan untuk keperluan tindak lanjut resmi.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer-modern mt-5">
        <div class="footer-container">
            <div class="footer-info">
                <h4><i class="fas fa-bullhorn me-2"></i>Pengaduan Masyarakat</h4>
                <p>Sistem pelaporan masyarakat yang cepat, aman, dan terpercaya.</p>
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="#about"><i class="fas fa-info-circle me-2"></i> Tentang</a></li>
                    <li><a href="#Terajukan"><i class="fas fa-file-alt me-2"></i> Terajukan</a></li>
                    <li><a href="/login"><i class="fas fa-user-lock me-2"></i> Login</a></li>
                </ul>
            </div>

        </div>
        <div class="footer-bottom text-center">
            &copy; {{ date('Y') }} Pengaduan Masyarakat. By Resti adelia
        </div>
    </footer>
    <!-- Script AJAX Pagination -->
    <script>
        document.addEventListener('click', function(e) {
            if (e.target.closest('.pagination a')) {
                e.preventDefault();
                const url = e.target.closest('a').getAttribute('href');

                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');

                        const newList = doc.querySelector('#complain-list');
                        const newPagination = doc.querySelector('#pagination-links');

                        document.querySelector('#complain-list').innerHTML = newList.innerHTML;
                        document.querySelector('#pagination-links').innerHTML = newPagination.innerHTML;

                        // Scroll to top of complain list
                        window.scrollTo({
                            top: document.querySelector('#complain-container').offsetTop,
                            behavior: 'smooth'
                        });
                    })
                    .catch(err => {
                        console.error('Pagination error:', err);
                        alert('Gagal memuat data halaman.');
                    });
            }
        });
    </script>
</body>

</html>
