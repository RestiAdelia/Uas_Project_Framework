@extends('layouts.app')
@section('title', 'Data Pelapor')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-center align-items-center">
                    <h4 class="mb-0">Form Pelapor</h4>
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

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama"
                                   class="form-control @error('nama') is-invalid @enderror"
                                   value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" name="nik" id="nik"
                                   class="form-control @error('nik') is-invalid @enderror"
                                   value="{{ old('nik') }}" required>
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" name="telepon" id="telepon"
                                   class="form-control @error('telepon') is-invalid @enderror"
                                   value="{{ old('telepon') }}" required>
                            @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Lanjut ke Pengaduan</button>
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
