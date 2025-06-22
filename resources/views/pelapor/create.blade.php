@extends('layouts.app')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/complaint.css') }}">
    <h2>Form Pelapor</h2>
    <form id="pelaporForm" action="{{ route('pelapor.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>NIK:</label>
            <input type="text" name="nik" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Telepon:</label>
            <input type="text" name="telepon" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Lanjut ke Pengaduan</button>
    </form>
</div>

<script>
document.getElementById('pelaporForm').addEventListener('submit', function(e) {
    e.preventDefault(); // stop submit dulu

    if(confirm("Data pelapor sudah benar? Data Anda Akan disimpan! Lanjut ke Form Pengaduan?")) {
        e.target.submit(); // lanjutkan form submit
    } else {
        alert("Data Anda Dibatalkan.");
        window.location.href = '/'; // redirect ke halaman utama (index)
    }
});
</script>

@endsection
