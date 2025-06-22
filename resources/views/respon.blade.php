@extends('layouts.app')

@section('title', 'respon')
@section('content')

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2 class="mb-4">Detail Pengaduan & Respon</h2>
            </div>
        </div>


        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">{{ $complain->judul }}</h4>
                @if ($complain->file)
                    <div class="card mx-3 mb-3" style="max-width: 300px;">
                        <img src="{{ asset('storage/' . $complain->file) }}" class="card-img-top" alt="Gambar Pengaduan">
                        <div class="card-body">
                        </div>
                    </div>
                @endif
                <p class="card-text">{{ $complain->deskripsi }}</p>
                <span class="badge bg-info text-dark">Status: {{ ucfirst($complain->status) }}</span>
            </div>

        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Respon</h5>
            </div>
            <div class="card-body">
                @if ($complain->responses && $complain->responses->isNotEmpty())
                    @foreach ($complain->responses as $response)
                        <div class="alert alert-secondary mb-2">
                            {{ $response->respon }}
                        </div>
                    @endforeach
                @else
                    <p class="text-muted">Belum ada respon.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
