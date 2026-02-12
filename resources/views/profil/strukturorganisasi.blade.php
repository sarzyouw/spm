@extends('layouts.app')

@section('title', 'Struktur Organisasi - SPM STMI')

@section('content')
{{-- HERO SECTION ASLI --}}
<section class="hero-section" style="background-color: #1e4bb1; color: white; padding: 100px 0; text-align: center;">
    <div class="container">
        <h1 style="font-size: 3.5rem; font-weight: bold;">Struktur Organisasi</h1>
        <p style="font-size: 1.5rem; opacity: 0.9;">SPM Politeknik STMI Jakarta</p>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-2">
                Struktur Organisasi <span class="text-primary">SPM STMI</span>
            </h2>
            <div class="mx-auto bg-primary rounded mb-4" style="width: 80px; height: 4px;"></div>
            
            <p class="mx-auto text-muted" style="max-width: 800px; line-height: 1.8;">
                Sistem Penjaminan Mutu (SPM) Politeknik STMI Jakarta dijalankan oleh unit khusus 
                yang terstruktur untuk memastikan standar pendidikan tetap terjaga dan berkelanjutan secara profesional.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-light border">
                    <div class="bg-white border-bottom px-4 py-2 d-flex justify-content-between align-items-center">
                        <div class="d-flex gap-2">
                            <span class="rounded-circle bg-danger opacity-25" style="width: 12px; height: 12px;"></span>
                            <span class="rounded-circle bg-warning opacity-25" style="width: 12px; height: 12px;"></span>
                            <span class="rounded-circle bg-success opacity-25" style="width: 12px; height: 12px;"></span>
                        </div>
                        <small class="text-muted fw-medium"><i class="bi bi-diagram-3 me-2"></i>Organizational Chart</small>
                        <a href="{{ asset('images/SO.png') }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">
                            <i class="bi bi-fullscreen me-1"></i> Perbesar
                        </a>
                    </div>

                    <div class="card-body p-2 p-md-4 text-center bg-white">
                        <div class="position-relative overflow-hidden rounded-3 border">
                            <img 
                                src="{{ asset('images/SO.png') }}" 
                                alt="Struktur Organisasi SPM STMI" 
                                class="img-fluid img-hover-zoom"
                                style="transition: transform 0.5s ease; cursor: zoom-in;"
                            >
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <p class="small text-secondary">
                        <i class="bi bi-info-circle-fill me-1"></i> Klik gambar atau tombol perbesar untuk melihat detail jabatan dan personalia.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .img-hover-zoom:hover {
        transform: scale(1.02);
    }
    .card {
        transition: all 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 1rem 3rem rgba(0,0,0,.1) !important;
    }
</style>
@endsection