@extends('layouts.admin.app')

@section('content')
    <div class="container py-6">
        <h2 class="mb-4 fw-semibold ">Daftar Pengaduan</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive bg-white p-4 rounded-4 shadow-sm">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-warning text-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pelapor</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Respon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complains as $item)
                        <tr>
                            <td>{{ ($complains->currentPage() - 1) * $complains->perPage() + $loop->iteration }}</td>
                            <td>{{ $item->pelapor->nama }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                @if ($item->file)
                                    <img src="{{ asset('storage/' . $item->file) }}" alt="Gambar" width="100">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 80) }}</td>
                            <td>
                                @php
                                    $status = strtolower($item->status);
                                @endphp

                                @if ($status == 'terkirim')
                                    <span class="badge bg-warning text-dark">Terkirim</span>
                                @elseif ($status == 'proses')
                                    <span class="badge bg-primary">Diproses</span>
                                @elseif ($status == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @elseif ($status == 'ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($status) }}</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('complain.updateStatus', $item->id) }}" method="POST"
                                    class="d-flex align-items-center gap-2">
                                    @csrf
                                    @method('PUT')

                                    <select name="status" class="form-select form-select-sm">
                                        <option value="terkirim" {{ $item->status == 'terkirim' ? 'selected' : '' }}>
                                            Terkirim</option>
                                        <option value="proses" {{ $item->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                        <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    </select>

                                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-check-circle"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('complain.formRespon', $item->id) }}" class="btn btn-success btn-sm">
                                    <i class="bi bi-send"></i> Respon
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('complain.destroy', $item->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-3 shadow-sm"
                                        onclick="return confirm('Yakin hapus data ini?')">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tambahkan Paginator -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $complains->links() }}
            </div>
        </div>
    </div>
@endsection
