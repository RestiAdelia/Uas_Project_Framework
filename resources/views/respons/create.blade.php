@extends('layouts.admin.app')

@section('title', 'Kirim Respon')

@section('content')
    <div class="container py-6">
        <div class="row">
            <div class="col-lg-7 col-md-8">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-header text-center rounded-top-4 py-3" style="background-color: #FFD93D;">
                        <h5 class="mb-0 fw-semibold text-dark">Kirim Respon Pengaduan</h5>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-center text-muted">
                            Respon untuk Pengaduan ID: <span class="fw-bold text-dark">{{ $complain->id }}</span>
                        </p>
                        @if ($complain->file)
                            <div class="text-center mb-4">
                                <img src="{{ asset('storage/' . $complain->file) }}" alt="Gambar Pengaduan"
                                    class="rounded mb-2" style="width: 100%; max-width: 300px; object-fit: cover;">
                                <h6 class="fw-semibold mt-2">{{ $complain->pelapor->nama }}</h6>
                                <small class="text-muted">Pelapor</small>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show small" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('complain.kirimRespon', $complain->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="respon" class="form-label fw-semibold">Isi Respon</label>
                                <textarea name="respon" id="respon" class="form-control rounded-3 shadow-sm" rows="4" required></textarea>
                            </div>
                            <div class="d-flex justify-content-center gap-3 mt-4">
                                <a href="{{ route('complaints.list') }}"
                                    class="btn d-flex align-items-center justify-content-center rounded-circle shadow-sm"
                                    style="border: 2px solid #FFD93D; color: #beaf02; background-color: #fff; width: 45px; height: 45px;">
                                    <i class="bi bi-arrow-left fs-5"></i>
                                </a>

                                <button type="submit"
                                    class="btn d-flex align-items-center justify-content-center rounded-circle shadow-sm"
                                    style="background-color: #FFD93D; color: #000; border: none; width: 45px; height: 45px;">
                                    <i class="bi bi-send fs-5"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
