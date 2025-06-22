{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pengaduan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelapor</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($complaints as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->pelapor->nama }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="{{ route('complain.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('complain.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}
