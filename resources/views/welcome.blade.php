@extends('layouts.app')

@section('title', 'Beranda - SPM STMI Jakarta')

@section('content')
@if(session('login_success'))
<script>
Swal.fire({
    title: 'Selamat Datang 👋',
    html: `
        <p style="font-size: 16px; margin-bottom: 0;">
            Silakan mengunduh dokumen yang Anda butuhkan.
        </p>
    `,
    icon: 'success',
    showConfirmButton: false,   
    showCloseButton: true,     
    closeButtonAriaLabel: 'Tutup',
    timerProgressBar: true,
    background: '#ffffff',
    backdrop: `rgba(13,110,253,0.15)`,
    showClass: {
        popup: 'animate__animated animate__zoomIn'
    },
    hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
    }
});
</script>
@endif

{{-- HERO SECTION ASLI --}}
<section class="hero-section" style="background-color: #1e4bb1; color: white; padding: 100px 0; text-align: center;">
    <div class="container">
        <h1 style="font-size: 3.5rem; font-weight: bold;">Satuan Penjaminan Mutu</h1>
        <p style="font-size: 1.5rem; opacity: 0.9;">Politeknik STMI Jakarta</p>
    </div>
</section>

{{-- SECTION KEGIATAN --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold border-start border-primary border-4 ps-3 mb-0">Berita Terbaru</h3>        </div>

        <div class="row g-4">
            {{-- Item Berita 1 --}}
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm custom-card">
                    <div class="card-body p-4">
                        <div class="news-meta mb-2 text-primary">
                            <i class="bi bi-calendar3 me-1"></i> 
                            <small class="fw-medium">June 24, 2019</small>
                        </div>
                        <a href="http://spm.stmi.ac.id/2019/06/24/210/" class="text-decoration-none">
                            <h5 class="card-title fw-bold text-dark mb-3 news-title-hover">Pemberitahuan Instrumen Akreditasi Program Studi 4.0</h5>
                        </a>
                        <p class="card-text text-muted small">Berkenaan dengan diberlakukannya Instrumen Akreditasi Program Studi 4.0 mulai...</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 p-4 pt-0">
                        <a href="http://spm.stmi.ac.id/2019/06/24/210/" class="text-primary small fw-bold text-decoration-none">Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            {{-- Item Berita 2 --}}
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm custom-card">
                    <div class="card-body p-4">
                        <div class="news-meta mb-2 text-primary">
                            <i class="bi bi-calendar3 me-1"></i> 
                            <small class="fw-medium">June 14, 2019</small>
                        </div>
                        <a href="http://spm.stmi.ac.id/2019/06/14/kegiatan-pemaparan-hasil-audit-dokumen-pendukung-akreditasi-prodi-tkp/" class="text-decoration-none">
                            <h5 class="card-title fw-bold text-dark mb-3 news-title-hover">Pemaparan Hasil Audit Dokumen Akreditasi Prodi TKP</h5>
                        </a>
                        <p class="card-text text-muted small">Kegiatan Pemaparan Hasil Audit Dokumen Pendukung Akreditasi Prodi...</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 p-4 pt-0">
                        <a href="http://spm.stmi.ac.id/2019/06/14/kegiatan-pemaparan-hasil-audit-dokumen-pendukung-akreditasi-prodi-tkp/" class="text-primary small fw-bold text-decoration-none">Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            {{-- Item Berita 3 --}}
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm custom-card">
                    <div class="card-body p-4">
                        <div class="news-meta mb-2 text-primary">
                            <i class="bi bi-calendar3 me-1"></i> 
                            <small class="fw-medium">May 29, 2019</small>
                        </div>
                        <a href="http://spm.stmi.ac.id/2019/05/29/kegiatan-audit-dokumen-pendukung-akreditasi-prodi-tkp/" class="text-decoration-none">
                            <h5 class="card-title fw-bold text-dark mb-3 news-title-hover">Kegiatan Audit Dokumen Pendukung Akreditasi Prodi TKP</h5>
                        </a>
                        <p class="card-text text-muted small">Kegiatan Audit Dokumen Pendukung Akreditasi Prodi...</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 p-4 pt-0">
                        <a href="http://spm.stmi.ac.id/2019/05/29/kegiatan-audit-dokumen-pendukung-akreditasi-prodi-tkp/" class="text-primary small fw-bold text-decoration-none">Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#tabelPublik').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json"
            }
        });
    });
</script>
@endpush