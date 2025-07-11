@extends('layouts.app')
@section('title', 'Data Pelapor')

@section('content')
<style>
    .btn-submit {
        background-color: #3cce29;
        color: white;
        padding: 12px;
        border-radius: 10px;
        font-weight: bold;
        border: none;
        transition: 0.3s;
    }

    .btn-submit:hover {
        background-color: #ffc107;
        color: #000;
    }

    .alert ul {
        margin: 0;
        padding-left: 20px;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header text-center">
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

                        <!-- Nama -->
                        <div class="form-floating mb-3">
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
                                   placeholder="Nama" value="{{ old('nama') }}" required>
                            <label for="nama">Nama</label>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- NIK -->
                        <div class="form-floating mb-3">
                            <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror"
                                   placeholder="NIK" value="{{ old('nik') }}" required>
                            <label for="nik">NIK</label>
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Telepon -->
                        <div class="form-floating mb-4">
                            <input type="text" name="telepon" id="telepon"
                                   class="form-control @error('telepon') is-invalid @enderror"
                                   placeholder="Telepon" value="{{ old('telepon') }}" required>
                            <label for="telepon">Telepon</label>
                            @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn-submit">Lanjut ke Pengaduan</button>
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
