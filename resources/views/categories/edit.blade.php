@extends('layouts.admin.app')

@section('content')
    <div class="container py-6">
        <h2 class="mb-4 fw-semibold">Edit Kategori</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oops!</strong> Ada kesalahan:<br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control"
                    value="{{ old('nama_kategori', $category->nama_kategori) }}" required>

            </div>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i>
            </a>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-lg"></i>
            </button>
        </form>
    </div>
@endsection
