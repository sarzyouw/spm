@extends('layouts.app')

@section('title', 'Tentang SPMI - STMI Jakarta')

@section('content')
{{-- HERO SECTION ASLI --}}
<section class="hero-section" style="background-color: #1e4bb1; color: white; padding: 100px 0; text-align: center;">
    <div class="container">
        <h1 style="font-size: 3.5rem; font-weight: bold;">Satuan Penjaminan Mutu Internal (SPMI)</h1>
        <p style="font-size: 1.5rem; opacity: 0.9;">Politeknik STMI Jakarta</p>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Satuan Penjaminan Mutu Internal <span class="text-primary">(SPMI)</span></h2>
            <div class="mx-auto bg-primary rounded" style="width: 70px; height: 4px;"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="row g-0">                                                      
                            <div class="col-md-15 bg-white p-4 p-md-5">
                                <div class="timeline-wrapper">
                                    
                                    <div class="d-flex mb-5 position-relative">
                                        <div class="timeline-line"></div>
                                        <div class="timeline-dot bg-primary"></div>
                                        <div class="ms-4">
                                            <h5 class="fw-bold text-dark mb-2">Tentang SPMI</h5>
                                            <p class="text-muted small mb-0">Kegiatan sistemik penjaminan mutu yang dilakukan secara otonom untuk mewujudkan standar pendidikan tinggi yang sistematis dan terencana.</p>
                                        </div>
                                    </div>

                                    <div class="d-flex mb-5 position-relative">
                                        <div class="timeline-line"></div>
                                        <div class="timeline-dot bg-primary"></div>
                                        <div class="ms-4">
                                            <h5 class="fw-bold text-dark mb-2">Fungsi Utama (Siklus PPEPP)</h5>
                                            <p class="text-muted small mb-3">Sebagai pengendali mutu melalui lima tahapan utama:</p>
                                            <div class="d-flex flex-wrap gap-2">
                                                <span class="badge bg-light text-dark border rounded-pill fw-normal">Penetapan</span>
                                                <span class="badge bg-light text-dark border rounded-pill fw-normal">Pelaksanaan</span>
                                                <span class="badge bg-light text-dark border rounded-pill fw-normal">Evaluasi</span>
                                                <span class="badge bg-light text-dark border rounded-pill fw-normal">Pengendalian</span>
                                                <span class="badge bg-light text-dark border rounded-pill fw-normal">Peningkatan</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex position-relative">
                                        <div class="timeline-dot bg-primary"></div>
                                        <div class="ms-4">
                                            <h5 class="fw-bold text-dark mb-3">Tugas Strategis</h5>
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-flex mb-2 small text-muted">
                                                    <i class="bi bi-check2-circle text-primary me-2"></i> Melakukan Audit Mutu Internal (AMI) berkala.
                                                </li>
                                                <li class="d-flex mb-2 small text-muted">
                                                    <i class="bi bi-check2-circle text-primary me-2"></i> Mengelola dokumen mutu (Kebijakan & Standar).
                                                </li>
                                                <li class="d-flex small text-muted">
                                                    <i class="bi bi-check2-circle text-primary me-2"></i> Memantau formulir dan manual mutu institusi.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .timeline-wrapper { position: relative; }
    .timeline-dot {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        position: relative;
        z-index: 2;
        margin-top: 5px;
        flex-shrink: 0;
    }
    .timeline-line {
        position: absolute;
        left: 7.5px;
        top: 20px;
        bottom: -40px;
        width: 1px;
        background-color: #dee2e6;
        z-index: 1;
    }
</style>


@endsection