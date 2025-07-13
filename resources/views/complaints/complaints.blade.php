@extends('layouts.app')
@section('title', 'Data Pengaduan')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/complaint.css') }}">
   
    <div class="container py-5">


        <div class="row justify-content-center">
            @if (isset($pelapor))
                <div class="alert alert-info">
                    <strong>Nama:</strong> {{ $pelapor->nama }}<br>
                    <strong>Telepon:</strong> {{ $pelapor->telepon }}
                </div>
            @endif
            <div class="col-md-8">

                <div class="card card-yellow">
                    <div class="card-header text-center">
                        <h4 class="mb-0">Form Pengaduan</h4>
                    </div>

                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif
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
                                    class="form-control @error('judul') is-invalid @enderror" id="judul"
                                    placeholder="Judul" value="{{ old('judul') }}" required>
                                <label for="judul">Judul</label>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                    placeholder="Deskripsi" style="height: 120px;" required>{{ old('deskripsi') }}</textarea>
                                <label for="deskripsi">Deskripsi</label>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror"
                                    id="kategori_id" required>
                                    <option value="" disabled hidden>Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('kategori_id') == $category->id ? 'selected' : '' }}>
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
                                    class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                    placeholder="alamat" value="{{ old('alamat') }}" required>
                                <label for="alamat">Alamat</label>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="file" class="form-label">Upload File (Opsional)</label>
                                <input type="file" name="file" id="file"
                                    class="form-control @error('file') is-invalid @enderror">
                                @error('file')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
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
