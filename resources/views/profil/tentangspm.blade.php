@extends('layouts.app')

@section('title', 'Tentang SPM - STMI Jakarta')

@section('content')
{{-- HERO SECTION ASLI --}}
<section class="hero-section" style="background-color: #1e4bb1; color: white; padding: 100px 0; text-align: center;">
  <div class="container">
    <h1 style="font-size: 3.5rem; font-weight: bold;">Tentang SPM</h1>
    <p style="font-size: 1.5rem; opacity: 0.9;">Politeknik STMI Jakarta</p>
  </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Satuan Penjaminan Mutu<span class="text-primary">(SPM)</span></h2>
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
                                            <h5 class="fw-bold text-dark mb-2">Tentang SPM</h5>
                                            <p class="text-muted small mb-0">Unit Satuan Penjaminan Mutu Politeknik STMI Jakarta adalah unit pengelola penjaminan mutu yang bertanggung jawab dalam rangkaian unsur dan proses terkait mutu pendidikan yang saling berkaitan dan tersusun secara teratur dalam menjamin dan meningkatkan mutu pendidikan secara berencana dan berkelanjutan.</p>
                                        </div>
                                    </div>

                                    <div class="d-flex mb-5 position-relative">
                                        <div class="timeline-line"></div>
                                        <div class="timeline-dot bg-primary"></div>
                                        <div class="ms-4">
                                            <h5 class="fw-bold text-dark mb-2">Fungsi SPM</h5>
                                            <p class="text-muted small mb-0">Sebagai penyelenggara proses penjaminan mutu terhadap program dan kegiatan institusi Politeknik STMI Jakarta di satuan akademik dan nonakademik dalam upaya mencapapai indikator kinerja yang telah ditetapkan, serta melaksanakan fungsi pengawasan mutu akademik dan nonakademik untuk dan atas nama direktur.</p>
                                        </div>
                                    </div>

                                    <div class="d-flex position-relative">
                                        <div class="timeline-dot bg-primary"></div>
                                        <div class="ms-4">
                                            <h5 class="fw-bold text-dark mb-3">Tugas SPM</h5>
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-flex mb-2 small text-muted">
                                                    <i class="bi bi-check2-circle text-primary me-2"></i> Merumuskan kebijakan SPMI Politeknik STMI Jakarta.
                                                </li>
                                                <li class="d-flex mb-2 small text-muted">
                                                    <i class="bi bi-check2-circle text-primary me-2"></i> Mengkoordinasikan penerapan sistem penjaminan mutu secara berkesinambungan, konsisten, efisien dan akuntabel.
                                                </li>
                                                <li class="d-flex small text-muted">
                                                    <i class="bi bi-check2-circle text-primary me-2"></i> Melaksanakan pengawasan, pengendalian, dan pelaporan atas penerapan sistem penjaminan mutu Politeknik STMI Jakarta.
                                                </li>
                                                <li class="d-flex small text-muted">
                                                    <i class="bi bi-check2-circle text-primary me-2"></i> Memfasilitasi kegiatan pelayanan penjaminan mutu berupa pendampingan akreditasi program studi dan satuan kerja di lingkungan Politeknik STMI Jakarta maupun di lingkungan perguruan tinggi atau institusi mitra.
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