@extends('layouts.ketua')

@php
    $dokumen_list = $dokumen_list ?? collect();
    $judul_kategori = $judul_kategori ?? 'Validasi Dokumen';
    $is_pending_view = (($jenis ?? '') == 'semua_tertunda');
@endphp

@section('title', $judul_kategori)

@section('konten_halaman')
    <div class="mb-4">
        <p class="breadcrumb-text">Utama / {{ $judul_kategori }}</p>
        <h2 class="fw-bold" style="color: #2b3674;">{{ $judul_kategori }}</h2>
    </div>

    @if(session('success'))
    <div class="alert alert-success border-0 shadow-sm mb-4">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
    </div>
    @endif

    <div class="card-table">
        <div class="table-responsive">
            <table id="tabelValidasi" class="table table-hover w-100">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>No Dokumen</th>
                        <th>Nama Dokumen</th>
                        <th>Pengupload</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dokumen_list as $index => $doc)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                        <td><span class="fw-bold text-dark">{{ $doc->no_dokumen }}</span></td>
                        <td>{{ $doc->nama_dok }}</td>
                        <td><small class="text-muted"><i class="fas fa-user me-1"></i> {{ $doc->username }}</small></td>
                        <td class="text-center">{{ date('d M Y', strtotime($doc->tgl_proses)) }}</td>
                        <td class="text-center">
                            @if($doc->status == 'belum divalidasi')
                            <span class="badge-status status-menunggu">Menunggu</span>
                            @elseif($doc->status == 'revisi')
                            <span class="badge-status status-revisi">Revisi</span>
                            @else
                            <span class="badge-status status-divalidasi">Divalidasi</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button type="button" class="btn-action btn btn-info text-white btn-preview" 
                                                    data-title="{{ $doc->nama_dok }}"

                                                    @if($doc->link)
                                                    {{-- FILE LOKAL --}}
                                                    @if(Str::startsWith($doc->link, 'storage/'))
                                                        data-url="{{ asset($doc->link) }}"

                                                    {{-- GOOGLE DRIVE --}}
                                                    @elseif(Str::contains($doc->link, 'drive.google.com'))
                                                        data-url="{{ Str::replace('/view', '/preview', $doc->link) }}"

                                                    {{-- LINK LAIN --}}
                                                    @else
                                                        data-url="{{ $doc->link }}"
                                                    @endif
                                                @else
                                                    data-url=""
                                                @endif
                                            >
                                                <i class="fas fa-eye fa-xs"></i>
                                            </button>

                                @if ($is_pending_view)
                                <form action="{{ route('ketua.dokumen.validasi', $doc->no_dokumen) }}" method="POST" class="d-inline form-validasi">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="status_baru" value="sudah divalidasi">
                                    <button type="button" class="btn-action btn btn-success btn-setuju" title="Setujui">
                                        <i class="fas fa-check fa-xs"></i>
                                    </button>
                                </form>

                                <form action="{{ route('ketua.dokumen.validasi', $doc->no_dokumen) }}" method="POST" class="d-inline form-revisi">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="status_baru" value="revisi">
                                    <button type="button" class="btn-action btn btn-warning text-white btn-revisi" title="Minta Revisi">
                                        <i class="fas fa-exclamation-triangle fa-xs"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalPreview" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="modalPreviewLabel">
                        <i class="fas fa-file-pdf me-2"></i> Preview Dokumen: <span id="docTitle"></span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0">
                    <iframe id="previewFrame" src="" class="preview-iframe"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script_halaman')
    <script>
        $(document).ready(function() {
            $('#tabelValidasi').DataTable({
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json",
                    search: "_INPUT_",
                    searchPlaceholder: "Cari dokumen..."
                },
                columnDefs: [{ orderable: false, targets: [0, 6] }],
                pageLength: 10
            });

            $('.btn-preview').on('click', function() {
                $('#docTitle').text($(this).data('title'));
                $('#previewFrame').attr('src', $(this).data('url'));
                $('#modalPreview').modal('show');
            });

            $('#modalPreview').on('hidden.bs.modal', function() {
                $('#previewFrame').attr('src', '');
            });

            $(document).on('click', '.btn-setuju', function(e) {
                e.preventDefault();
                let form = $(this).closest('form');
                Swal.fire({
                    title: 'Setujui Dokumen?',
                    text: "Dokumen akan ditandai sebagai 'Sudah Divalidasi'",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Setujui!',
                    cancelButtonText: 'Batal'
                }).then((result) => { if (result.isConfirmed) form.submit(); });
            });

            $(document).on('click', '.btn-revisi', function(e) {
                e.preventDefault();
                let form = $(this).closest('form');
                Swal.fire({
                    title: 'Minta Revisi Dokumen?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Minta Revisi!',
                    cancelButtonText: 'Batal'
                }).then((result) => { if (result.isConfirmed) form.submit(); });
            });
        });
    </script>
@endsection