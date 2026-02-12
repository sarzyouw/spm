@extends('layouts.app')

@section('title', 'IAPT - SPME STMI')

@section('content')
{{-- HERO SECTION ASLI --}}

@if(!session('logged_in'))
<section class="hero-section" style="background-color: #1e4bb1; color: white; padding: 100px 0; text-align: center;">
    <div class="container">
        <h1 style="font-size: 3.5rem; font-weight: bold;">Instrumen Akreditasi Perguruan Tinggi (IAPT)</h1>
        <p style="font-size: 1.5rem; opacity: 0.9;">Politeknik STMI Jakarta</p>
    </div>
</section>
@endif

<section class="py-5">
    <div class="container bg-white shadow-sm p-4 p-md-5 rounded-3 border-start border-4 border-primary">
        <div class="text-center mb-4">
            <h2 class="fw-bold mb-2">Daftar <span class="text-primary">Dokumen IAPT</span></h2>
            <div class="mx-auto bg-primary rounded mb-3" style="width: 70px; height: 4px;"></div>
            <p class="text-muted mx-auto" style="max-width: 900px; line-height: 1.8;">
                Daftar instrumen akreditasi untuk level Institusi/Perguruan Tinggi.
            </p>
        </div>

        <div class="table-responsive mt-4">
            <table id="tabelIAPT" class="table table-bordered table-hover align-middle w-100">
                <thead class="text-white text-center" style="background-color: #002f9e;">
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 45%">Nama Instrumen</th>
                        <th style="width: 25%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dokumen as $index => $doc)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $doc->nama_dok }}</td>
                        <td class="text-center">
                            @if (Session::has('logged_in'))
                            <a href="{{ route('dokumen.download', $doc->no_dokumen) }}" class="btn btn-sm btn-success px-3">
                                <i class="fas fa-download me-1"></i> Unduh
                            </a>
                            @else
                            <button type="button" class="btn btn-sm btn-outline-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <i class="fas fa-lock me-1"></i> Login untuk Unduh
                            </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="fas fa-folder-open fa-2x mb-3 d-block"></i>
                            Belum ada dokumen IAPT yang tersedia.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#tabelIAPT').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
            },
            pageLength: 10,
            responsive: true
        });
    });
</script>
@endpush
@endsection