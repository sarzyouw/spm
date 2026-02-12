@extends('layouts.ketua')

@section('title', 'Dashboard Ketua')

@section('konten_halaman')
    <div class="mb-4">
        <p class="breadcrumb-text">Utama / Dashboard</p>
        <h2 class="dashboard-title">Dashboard</h2>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <a href="{{ route('ketua.validasi.tertunda') }}" class="text-decoration-none">
                <div class="stat-card">
                    <div class="icon-circle bg-icon-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <p class="stat-label">Belum Divalidasi</p>
                        <h3 class="stat-value">{{ $dokumen_menunggu }} Dokumen</h3>
                        <span class="stat-link text-warning">Klik untuk memproses <i class="fas fa-chevron-right ms-1"></i></span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('ketua.dokumen.divalidasi') }}" class="text-decoration-none">
                <div class="stat-card">
                    <div class="icon-circle bg-icon-success">
                        <i class="fas fa-check-double"></i>
                    </div>
                    <div>
                        <p class="stat-label">Sudah Divalidasi</p>
                        <h3 class="stat-value">{{ $dokumen_divalidasi }} Dokumen</h3>
                        <span class="stat-link text-success">Klik untuk meninjau <i class="fas fa-chevron-right ms-1"></i></span>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection