@extends('layouts.app')

@section('content')
    <h2>Detail Pengaduan & Respon</h2>

    <div class="card">
        <h3>{{ $complain->judul }}</h3>
        <p>{{ $complain->deskripsi }}</p>
        <p>Status: {{ ucfirst($complain->status) }}</p>
        @if ($complain->file)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/' . $complain->file) }}" class="card-img-top" alt="Gambar Pengaduan">
                <div class="card-body">
                    <h5 class="card-title">{{ $complain->judul }}</h5>
                    <p class="card-text">{{ $complain->deskripsi }}</p>
                </div>
            </div>
        @endif

    </div>

    <h3> Respon:</h3>
    @if ($complain->responses && $complain->responses->isNotEmpty())
        @foreach ($complain->responses as $response)
            <p>{{ $response->respon }}</p>
        @endforeach
    @else
        <p>Belum ada respon.</p>
    @endif

@endsection
