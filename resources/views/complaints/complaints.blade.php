@extends('layouts.app')
@section('title', 'Data Pengaduan')

@section('content')

<style>
    .card-yellow {
        border: none;
        border-top: 4px solid #f1c40f;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .card-yellow .card-header {
        background-color: #fffbea;
        border-bottom: none;
        padding: 1.5rem;
    }

    .card-yellow h4 {
        color: #d4ac0d;
        font-weight: 700;
    }

    .btn-yellow {
        background-color: #f1c40f;
        border: none;
        color: #222;
        font-weight: 600;
        transition: 0.3s;
        padding: 12px;
        border-radius: 8px;
    }

    .btn-yellow:hover {
        background-color: #d4ac0d;
        color: #fff;
    }

    .form-label,
    .form-floating label {
        font-weight: 500;
    }

    .form-floating .form-control,
    .form-select {
        border-radius: 10px;
        border-color: #f1c40f66;
    }

    .alert-success {
        background-color: #fef9e7;
        color: #7d6608;
        border: 1px solid #f1c40f99;
    }

    .alert-danger {
        background-color: #fff2f0;
        border: 1px solid #f5c6cb;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card card-yellow">
                <div class="card-header text-center">
                    <h4 class="mb-0">Form Pengaduan</h4>
                </div>

                <div class="card-body">

                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Error Message --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('complain.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pelapor" value="{{ $id_pelapor }}">

                        <!-- Judul -->
                        <div class="form-floating mb-3">
                            <input type="text" name="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                id="judul" placeholder="Judul"
                                value="{{ old('judul') }}" required>
                            <label for="judul">Judul</label>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-floating mb-3">
                            <textarea name="deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                id="deskripsi" placeholder="Deskripsi"
                                style="height: 120px;" required>{{ old('deskripsi') }}</textarea>
                            <label for="deskripsi">Deskripsi</label>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div class="form-floating mb-3">
                            <select name="kategori_id"
                                class="form-select @error('kategori_id') is-invalid @enderror"
                                id="kategori_id" required>
                                <option value="" disabled hidden>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('kategori_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="kategori_id">Kategori</label>
                            @error('kategori_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="alamat"
                                class="form-control @error('alamat') is-invalid @enderror"
                                id="alamat" placeholder="alamat"
                                value="{{ old('alamat') }}" required>
                            <label for="alamat">Alamat</label>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- File Upload -->
                        <div class="mb-4">
                            <label for="file" class="form-label">Upload File (Opsional)</label>
                            <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror">
                            @error('file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-yellow">Kirim Pengaduan</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
