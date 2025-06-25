@extends('layouts.admin.app')

@section('title', 'Data Pelapor')

@section('content')
    <div class="container py-6">
        <h2 class="mb-4 fw-semibold t">Data Pelapor</h2>
        <div class="table-responsive bg-white p-4 rounded-4 shadow-sm">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-warning text-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pelapor as $item)
                        <tr>
                            <td>{{ ($pelapor->currentPage() - 1) * $pelapor->perPage() + $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->telepon }}</td>
                            <td>
                                <form action="{{ route('pelapor.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger rounded-3 shadow-sm"
                                            onclick="return confirm('Yakin ingin menghapus pelapor ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data pelapor.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $pelapor->links() }}
        </div>
    </div>
@endsection
