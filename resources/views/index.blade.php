<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pengaduan Umum Masyarakat</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    //
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
                <article class="feature-card">
                    <svg class="feature-icon" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12l2 2 4-4" />
                    </svg>
                    <h2 class="feature-title">Mudah Digunakan</h2>
                    <p class="feature-desc">Antarmuka sederhana dan dokumentasi lengkap memudahkan penggunaan.</p>
                </article>
                <article class="feature-card">
                    <svg class="feature-icon" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                        <path d="M3 9h18M9 21V9" />
                    </svg>
                    <h2 class="feature-title">Fleksibel</h2>
                    <p class="feature-desc">Mudah disesuaikan dengan kebutuhan dan preferensi Anda.</p>
                </article>
                <article class="feature-card">
                    <svg class="feature-icon" viewBox="0 0 24 24">
                        <path d="M12 3v18M3 12h18" />
                    </svg>
                    <h2 class="feature-title">Ringan & Modular</h2>
                    <p class="feature-desc">Hanya memuat fitur yang diperlukan sehingga performa tetap optimal.</p>
                </article>
                <article class="feature-card">
                    <svg class="feature-icon" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 14l4-4 4 4" />
                    </svg>
                    <h2 class="feature-title">Aksesibilitas</h2>
                    <p class="feature-desc">Mendukung navigasi keyboard dan pembaca layar.</p>
                </article>
            </div>
        </section>
        <!-- Daftar Pengaduan -->
        <section id="Terajukan" class="pengaduan">
            <div class="complain-grid">
                @foreach ($complains as $complain)
                    <div class="complain-card">
                        @if ($complain->file)
                            <img src="{{ asset('storage/' . $complain->file) }}" class="complain-image"
                                alt="gambar complain">
                        @else
                            <img src="{{ asset('images/default.png') }}" class="complain-image" alt="default image">
                        @endif
                        <div class="complain-content">
                            <h3>{{ $complain->judul }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit($complain->deskripsi, 80) }}</p>
                        </div>
                        <div class="complain-footer">
                            <small>Status: {{ ucfirst($complain->status) }}</small>
                            <a href="{{ route('respon.show', $complain->id) }}" class="respon-icon"
                                title="Lihat Respon">💬</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $complains->links() }}
            </div>



        </section>


    </main>

    <footer>
        &copy; 2024 Pengaduan Masyarakat. All rights reserved.
    </footer>
</body>

</html>
