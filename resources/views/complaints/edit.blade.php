@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pengaduan</h2>
    <form action="{{ route('complain.update', $complain->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Judul:</label>
            <input type="text" name="judul" class="form-control" value="{{ $complain->judul }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" required>{{ $complain->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Status:</label>
            <select name="status" class="form-control" required>
                <option value="baru" {{ $complain->status == 'baru' ? 'selected' : '' }}>Baru</option>
                <option value="diproses" {{ $complain->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ $complain->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Pengaduan</button>
    </form>
</div>
@endsection
