@extends('layouts.app')

@section('content')
    <h2>Form Pengaduan</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <style>
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control {
            width: 100%;
            padding: 1rem 0.5rem 0.5rem 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: none;
        }

        .form-label {
            position: absolute;
            top: 1rem;
            left: 0.5rem;
            color: #aaa;
            transition: all 0.2s ease-in-out;
            pointer-events: none;
        }

        .form-control:focus+.form-label,
        .form-control:not(:placeholder-shown)+.form-label {
            top: -0.5rem;
            left: 0.5rem;
            background: #fff;
            padding: 0 0.2rem;
            color: #333;
            font-size: 0.8rem;
        }
    </style>

    <form action="{{ route('complain.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_pelapor" value="{{ $id_pelapor }}">

        <div class="form-group">
            <input type="text" name="judul" class="form-control" placeholder=" " required>
            <label class="form-label">Judul</label>
        </div>

        <div class="form-group">
            <textarea name="deskripsi" class="form-control" placeholder=" " required></textarea>
            <label class="form-label">Deskripsi</label>
        </div>

        <div class="form-group">
            <select name="kategori_id" class="form-control" required>
                <option value="" disabled selected hidden>Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                @endforeach
            </select>

            <label class="form-label">Kategori</label>
        </div>

        <div class="form-group">
            <input type="file" name="file" class="form-control" placeholder=" ">
            <label class="form-label">Upload File (Opsional)</label>
        </div>

        <button type="submit" class="btn btn-success">Kirim Pengaduan</button>
    </form>
@endsection
