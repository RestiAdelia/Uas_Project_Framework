@extends('layouts.app')

@section('title', 'Data Pelapor')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/pelapor.css') }}">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-yellow">
                    <div class="card-header text-center">
                        <h4>Form Pelapor</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="pelaporForm" action="{{ route('pelapor.store') }}" method="POST">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" name="nama" id="nama"
                                    class="form-control @error('nama') is-invalid @enderror" placeholder="Nama"
                                    value="{{ old('nama') }}" required>
                                <label for="nama">Nama</label>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="nik" id="nik"
                                    class="form-control @error('nik') is-invalid @enderror" placeholder="NIK"
                                    value="{{ old('nik') }}" required>
                                <label for="nik">NIK</label>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-4">
                                <input type="text" name="telepon" id="telepon"
                                    class="form-control @error('telepon') is-invalid @enderror" placeholder="Telepon"
                                    value="{{ old('telepon') }}" required>
                                <label for="telepon">Telepon</label>
                                @error('telepon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-yellow">Lanjut ke Pengaduan</button>
                            </div>

                            <div class="text-center mt-3">
                                <a href="{{ url('/') }}"
                                    class="btn btn-outline-warning d-inline-flex align-items-center">
                                    <i class="bi bi-arrow-left me-2"></i> Kembali
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('pelaporForm').addEventListener('submit', function(e) {
            e.preventDefault();
            if (confirm("Data pelapor sudah benar? Data Anda akan disimpan! Lanjut ke Form Pengaduan?")) {
                e.target.submit();
            } else {
                alert("Data Anda dibatalkan.");
                window.location.href = '/';
            }
        });
    </script>
@endsection
