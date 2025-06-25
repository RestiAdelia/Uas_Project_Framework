@extends('layouts.admin.app')

@section('title', 'Data Respon')

@section('content')
    <div class="container py-6">
        <h2 class="mb-4 fw-semibold ">Data Respon Pengaduan</h2>
        <div class="table-responsive bg-white p-4 rounded-4 shadow-sm">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-warning text-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pelapor</th>
                        <th>NIK</th>
                        <th>Telepon</th>
                        <th>Respon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($respons as $item)
                        <tr>
                            <td>{{ ($respons->currentPage() - 1) * $respons->perPage() + $loop->iteration }}</td>
                            <td>{{ $item->complain->pelapor->nama ?? '-' }}</td>
                            <td>{{ $item->complain->pelapor->nik ?? '-' }}</td>
                            <td>{{ $item->complain->pelapor->telepon ?? '-' }}</td>
                            <td>{{ $item->respon }}</td>
                            <td>
                                <form action="{{ route('respons.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center gap-1"
                                        onclick="return confirm('Yakin hapus?')">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data respon.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $respons->links() }}
        </div>
    </div>
@endsection
