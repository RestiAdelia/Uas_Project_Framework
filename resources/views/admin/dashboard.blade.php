@extends('layouts.admin.app')

@section('content')
    <section id="Terajukan" class="features py-4">
        <div class="container">
            {{-- Statistik Kartu --}}
            <div class="row text-center">
                <!-- Total Pengaduan -->
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="fas fa-comments fa-2x text-primary"></i>
                            </div>
                            <h5 class="card-title">Total Pengaduan</h5>
                            <p class="card-text">Jumlah: <strong>{{ $jumlahPengajuan }}</strong></p>
                        </div>
                    </div>
                </div>

                <!-- Diproses -->
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="fas fa-sync-alt fa-2x text-warning"></i>
                            </div>
                            <h5 class="card-title">Diproses</h5>
                            <p class="card-text">Jumlah: <strong>{{ $jumlahProses }}</strong></p>
                        </div>
                    </div>
                </div>

                <!-- Selesai -->
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="fas fa-check-circle fa-2x text-success"></i>
                            </div>
                            <h5 class="card-title">Selesai</h5>
                            <p class="card-text">Jumlah: <strong>{{ $jumlahSelesai }}</strong></p>
                        </div>
                    </div>
                </div>

                <!-- Ditolak -->
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                            </div>
                            <h5 class="card-title">Ditolak</h5>
                            <p class="card-text">Jumlah: <strong>{{ $jumlahDitolak }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white text-center">
                        <h5 class="mb-0 fw-semibold">Diagram Status Pengaduan</h5>
                    </div>
                    <div class="card-body" style="height: 400px;">
                        <canvas id="pengaduanChart" class="w-100 h-100"></canvas>
                    </div>
                </div>

            </div> {{-- Penutup container utama --}}
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('pengaduanChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total', 'Diproses', 'Selesai', 'Ditolak'],
                    datasets: [{
                        label: 'Jumlah Pengaduan',
                        data: [
                            {{ $jumlahPengajuan ?? 0 }},
                            {{ $jumlahProses ?? 0 }},
                            {{ $jumlahSelesai ?? 0 }},
                            {{ $jumlahDitolak ?? 0 }}
                        ],
                        backgroundColor: [
                            'rgba(0, 123, 255, 0.5)',
                            'rgba(255, 193, 7, 0.5)',
                            'rgba(40, 167, 69, 0.5)',
                            'rgba(220, 53, 69, 0.5)'
                        ],
                        borderColor: [
                            'rgba(0, 123, 255, 1)',
                            'rgba(255, 193, 7, 1)',
                            'rgba(40, 167, 69, 1)',
                            'rgba(220, 53, 69, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            },
                            title: {
                                display: true,
                                text: 'Jumlah'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Status'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom'
                        }
                    },
                    animation: {
                        duration: 1000,
                        easing: 'easeOutBounce'
                    }
                }
            });
        });
    </script>
@endsection
