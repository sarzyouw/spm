@extends('layouts.app')

@section('title', 'Hasil Survey Kepuasan - SPMI STMI')

@section('content')
{{-- HERO SECTION --}}
<section class="hero-section" style="background-color: #1e4bb1; color: white; padding: 80px 0; text-align: center;">
    <div class="container">
        <h1 style="font-size: 3rem; font-weight: bold;">Hasil Survey Kepuasan</h1>
        <p style="font-size: 1.3rem; opacity: 0.9;">Terhadap Kinerja Pendidikan Politeknik STMI</p>
    </div>
</section>

{{-- SECTION 1: MAHASISWA TERHADAP DOSEN --}}
<section class="py-4 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold mb-2" style="color: #003366;">Survey Kepuasan Mahasiswa Terhadap Dosen</h2>
            <div class="mx-auto bg-primary rounded" style="width: 60px; height: 4px;"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-0">
                        <ul class="nav nav-tabs nav-fill border-0" id="mhsTab" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active fw-bold" id="mhs2024-tab" data-bs-toggle="tab" data-bs-target="#mhs2024" type="button" role="tab">TAHUN 2024</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link fw-bold" id="mhs2025-tab" data-bs-toggle="tab" data-bs-target="#mhs2025" type="button" role="tab">TAHUN 2025</button>
                            </li>
                        </ul>
                        <div class="tab-content p-4 bg-white" id="mhsTabContent">
                            <div class="tab-pane fade show active" id="mhs2024" role="tabpanel">
                                <div class="text-center">
                                    <h5 class="mb-3 fw-bold text-primary">Data Survey Mahasiswa 2024</h5>
                                    <img src="{{ asset('images/surveymahasiswa2024.jpg') }}" class="img-fluid rounded border shadow-sm" style="max-height: 450px;">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="mhs2025" role="tabpanel">
                                <div class="text-center">
                                    <h5 class="mb-3 fw-bold text-primary">Data Survey Mahasiswa 2025</h5>
                                    <img src="{{ asset('images/surveymahasiswa2025.jpg') }}" class="img-fluid rounded border shadow-sm" style="max-height: 450px;">
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SECTION 2: PENGGUNA LULUSAN (WISUDA) --}}
<section class="py-4 bg-white">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold mb-2" style="color: #003366; line-height: 1.3;">
                Survey Kepuasan Pengguna Lulusan Wisuda <br> Berdasarkan Program Studi
            </h2>
            <div class="mx-auto bg-primary rounded" style="width: 60px; height: 4px;"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden" style="border: 1px solid #eee !important;">
                    <div class="card-body p-0">
                        <ul class="nav nav-tabs nav-fill border-0" id="lulusanTab" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active fw-bold" id="lulusan2023-tab" data-bs-toggle="tab" data-bs-target="#lulusan2023" type="button" role="tab">TAHUN 2023</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link fw-bold" id="lulusan2025-tab" data-bs-toggle="tab" data-bs-target="#lulusan2025" type="button" role="tab">TAHUN 2025</button>
                            </li>
                        </ul>
                        <div class="tab-content p-4 bg-white" id="lulusanTabContent">
                            <div class="tab-pane fade show active" id="lulusan2023" role="tabpanel">
                                <div class="text-center mb-4">
                                    <h5 class="fw-bold text-primary">Hasil Survey & Infografis Pengisi Survey Lulusan 2023</h5>
                                </div>
                                <div class="row g-4">
                                    <div class="col-md-6 text-center">
                                        <p class="small fw-bold text-muted">Hasil Survey Lulusan 2023</p>
                                        <img src="{{ asset('images/surveylulusan2023.jpg') }}" class="img-fluid rounded border shadow-sm">
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <p class="small fw-bold text-muted">Infografis Pengisi Survey Lulusan 2023</p>
                                        <img src="{{ asset('images/infografis2023.jpg') }}" class="img-fluid rounded border shadow-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="lulusan2025" role="tabpanel">
                                <div class="text-center mb-4">
                                    <h5 class="fw-bold text-primary">Hasil Survey & Perbandingan Pengisi Survey Lulusan 2025</h5>
                                </div>
                                <div class="row g-4">
                                    <div class="col-md-6 text-center">
                                        <p class="small fw-bold text-muted">Hasil Survey Lulusan 2025</p>
                                        <img src="{{ asset('images/surveylulusan2025.jpg') }}" class="img-fluid rounded border shadow-sm">
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <p class="small fw-bold text-muted">Grafik Perbandingan Pengisi Survey Lulusan</p>
                                        <img src="{{ asset('images/perbandingansurveylulusan.jpg') }}" class="img-fluid rounded border shadow-sm">
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

{{-- SECTION 3: DOSEN TERHADAP MANAJEMEN --}}
<section class="py-4 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold mb-2" style="color: #003366; line-height: 1.3;">
                Survey Kepuasan Dosen <br> Terhadap Manajemen Politeknik STMI Jakarta
            </h2>
            <div class="mx-auto bg-primary rounded" style="width: 60px; height: 4px;"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-0">
                        <ul class="nav nav-tabs nav-fill border-0" id="manajemenTab" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active fw-bold" id="man2024-tab" data-bs-toggle="tab" data-bs-target="#man2024" type="button" role="tab">TAHUN 2024</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link fw-bold" id="man2025-tab" data-bs-toggle="tab" data-bs-target="#man2025" type="button" role="tab">TAHUN 2025</button>
                            </li>
                        </ul>
                        <div class="tab-content p-4 bg-white" id="manajemenTabContent">
                            <div class="tab-pane fade show active" id="man2024" role="tabpanel">
                                <div class="row g-4">
                                    <div class="col-md-6 text-center">
                                        <p class="small fw-bold text-muted">Hasil Survey Kepuasan Dosen 2024</p>
                                        <img src="{{ asset('images/kepuasandosen2024.jpg') }}" class="img-fluid rounded border shadow-sm">
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <p class="small fw-bold text-muted">Infografis Responden Dosen 2024</p>
                                        <img src="{{ asset('images/infografisdosen2024.jpg') }}" class="img-fluid rounded border shadow-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="man2025" role="tabpanel">
                                <div class="row g-4">
                                    <div class="col-md-6 text-center">
                                        <p class="small fw-bold text-muted">Hasil Survey Kepuasan Dosen 2025</p>
                                        <img src="{{ asset('images/kepuasandosen2025.jpg') }}" class="img-fluid rounded border shadow-sm">
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <p class="small fw-bold text-muted">Infografis Responden Dosen 2025</p>
                                        <img src="{{ asset('images/infografisdosen2025.jpg') }}" class="img-fluid rounded border shadow-sm">
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

{{-- SECTION 4: TENAGA KEPENDIDIKAN TERHADAP MANAJEMEN --}}
<section class="py-4 bg-white">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold mb-2" style="color: #003366; line-height: 1.3;">
                Survey Kepuasan Tenaga Kependidikan <br> Terhadap Manajemen Politeknik STMI Jakarta
            </h2>
            <div class="mx-auto bg-primary rounded" style="width: 60px; height: 4px;"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden" style="border: 1px solid #eee !important;">
                    <div class="card-body p-0">
                        <ul class="nav nav-tabs nav-fill border-0" id="tendikTab" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active fw-bold" id="tendik2024-tab" data-bs-toggle="tab" data-bs-target="#tendik2024" type="button" role="tab">TAHUN 2024</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link fw-bold" id="tendik2025-tab" data-bs-toggle="tab" data-bs-target="#tendik2025" type="button" role="tab">TAHUN 2025</button>
                            </li>
                        </ul>
                        <div class="tab-content p-4 bg-white" id="tendikTabContent">
                            <div class="tab-pane fade show active" id="tendik2024" role="tabpanel">
                                <div class="text-center">
                                    <h5 class="mb-3 fw-bold text-primary">Data Survey Tenaga Kependidikan 2024</h5>
                                    <img src="{{ asset('images/kepuasantendik2024.jpg') }}" class="img-fluid rounded border shadow-sm" style="max-height: 450px;">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tendik2025" role="tabpanel">
                                <div class="text-center">
                                    <h5 class="mb-3 fw-bold text-primary">Data Survey Tenaga Kependidikan 2025</h5>
                                    <img src="{{ asset('images/kepuasantendik2025.jpg') }}" class="img-fluid rounded border shadow-sm" style="max-height: 450px;">
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SECTION 5: MITRA KERJA SAMA --}}
<section class="py-4 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold mb-2" style="color: #003366; line-height: 1.3;">
                Survey Kepuasan Mitra Kerjasama <br> Politeknik STMI Jakarta
            </h2>
            <div class="mx-auto bg-primary rounded" style="width: 60px; height: 4px;"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-0">
                        <ul class="nav nav-tabs nav-fill border-0" id="mitraTab" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active fw-bold" id="mitra2024-tab" data-bs-toggle="tab" data-bs-target="#mitra2024" type="button" role="tab">TAHUN 2024</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link fw-bold" id="mitra2025-tab" data-bs-toggle="tab" data-bs-target="#mitra2025" type="button" role="tab">TAHUN 2025</button>
                            </li>
                        </ul>
                        <div class="tab-content p-4 bg-white" id="mitraTabContent">
                            <div class="tab-pane fade show active" id="mitra2024" role="tabpanel">
                                <div class="text-center">
                                    <h5 class="mb-3 fw-bold text-primary">Data Survey Kepuasan Mitra STMI 2024</h5>
                                    <img src="{{ asset('images/surveymitra2024.jpg') }}" class="img-fluid rounded border shadow-sm" style="max-height: 450px;">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="mitra2025" role="tabpanel">
                                <div class="text-center">
                                    <h5 class="mb-3 fw-bold text-primary">Data Survey Kepuasan Mitra STMI 2025</h5>
                                    <img src="{{ asset('images/surveymitra2025.jpg') }}" class="img-fluid rounded border shadow-sm" style="max-height: 450px;">
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
    .nav-tabs {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
    }
    .nav-tabs .nav-link {
        padding: 15px 10px !important;
        color: #666;
        border: none;
        border-bottom: 3px solid transparent;
        transition: all 0.3s;
        text-transform: uppercase;
        font-size: 0.9rem;
    }
    .nav-tabs .nav-link:hover {
        background-color: #e9ecef;
        color: #1e4bb1;
    }
    .nav-tabs .nav-link.active {
        background-color: #ffffff !important;
        color: #1e4bb1 !important;
        border-bottom: 3px solid #1e4bb1 !important;
    }
    .tab-content img {
        transition: transform 0.3s ease;
    }
    .tab-content img:hover {
        transform: scale(1.02);
    }
</style>
@endsection