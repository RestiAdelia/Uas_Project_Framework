<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pengaduan Umum Masyarakat</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <!-- Statistik Terkirim -->
                        <div class="col-md-3 mb-4">
                            <article class="feature-card h-100">
                                <svg class="feature-icon" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M8 12l2 2 4-4" />
                                </svg>
                                <h2 class="feature-title">Total Pengaduan</h2>
                                <p class="feature-desc">Jumlah pengaduan: <strong>{{ $jumlahPengajuan }}</strong></p>
                            </article>
                        </div>

                        <!-- Statistik Proses -->
                        <div class="col-md-3 mb-4">
                            <article class="feature-card h-100">
                                <svg class="feature-icon" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M8 12l2 2 4-4" />
                                </svg>
                                <h2 class="feature-title">Diproses</h2>
                                <p class="feature-desc">Jumlah pengaduan: <strong>{{ $jumlahProses }}</strong></p>
                            </article>
                        </div>

                        <!-- Statistik Selesai -->
                        <div class="col-md-3 mb-4">
                            <article class="feature-card h-100">
                                <svg class="feature-icon" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M8 12l2 2 4-4" />
                                </svg>
                                <h2 class="feature-title">Selesai</h2>
                                <p class="feature-desc">Jumlah pengaduan: <strong>{{ $jumlahSelesai }}</strong></p>
                            </article>
                        </div>

                        <!-- Statistik Ditolak -->
                        <div class="col-md-3 mb-4">
                            <article class="feature-card h-100">
                                <svg class="feature-icon" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M8 12l2 2 4-4" />
                                </svg>
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
                                        class="btn btn-sm btn-outline-primary" title="Lihat Respon">💬</a>
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
    </main>

    <footer class="text-center py-3 bg-light mt-5">
        &copy; 2024 Pengaduan Masyarakat. All rights reserved.
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
