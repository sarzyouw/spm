@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('konten')
<div class="mb-4 d-flex justify-content-between align-items-end">
    <div>
        <p class="breadcrumb-text">Utama / Dashboard</p>
        <h2 class="dashboard-title mb-0">Dashboard</h2>
    </div>
    <div>
        <span class="badge bg-white text-muted border p-2 px-3 rounded-pill shadow-sm" style="font-size: 0.8rem;">
            <i class="far fa-calendar-alt me-1 text-primary"></i>
            Login: <b>{{ date('d M Y') }}</b>
        </span>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
            <div class="stat-card">
                <div class="icon-circle bg-icon-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <p class="stat-label">Statistik User</p>
                    <h3 class="stat-value">{{ $total_user }} Pengguna</h3>
                    <span class="stat-link text-primary">Lihat detail pengguna <i class="fas fa-chevron-right ms-1 small"></i></span>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6">
        <a href="{{ route('admin.dokumen.index') }}" class="text-decoration-none">
            <div class="stat-card">
                <div class="icon-circle bg-icon-warning">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div>
                    <p class="stat-label">Total Dokumen</p>
                    <h3 class="stat-value">{{ $total_dokumen }} Dokumen</h3>
                    <span class="stat-link text-warning">Kelola arsip dokumen <i class="fas fa-chevron-right ms-1 small"></i></span>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection