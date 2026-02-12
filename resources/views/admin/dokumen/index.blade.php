@extends('layouts.admin')

@section('title', 'Manajemen Dokumen')

@section('konten')
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <p class="breadcrumb-text">Dokumen / Arsip Dokumen</p>
            <h2 class="dashboard-title">Manajemen Dokumen</h2>
        </div>
        <a href="{{ route('admin.dokumen.create') }}" class="btn btn-primary-custom shadow-sm">
            <i class="fas fa-upload me-1"></i> Tambah Dokumen
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success border-0 rounded-3 shadow-sm mb-4">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
    </div>
    @endif

    <div class="card-table">
        <div class="table-responsive">
            <table id="dokumenTable" class="table table-hover w-100">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>No Dokumen</th>
                        <th>Nama Dokumen</th>
                        <th class="text-center">Jenis</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dokumen as $index => $doc)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                        <td><span class="fw-bold text-dark">{{ $doc->no_dokumen }}</span></td>
                        <td>{{ $doc->nama_dok }}</td>
                        <td class="text-center">
                            <span class="badge-custom badge-jenis">{{ ucwords($doc->jenis) }}</span>
                        </td>
                        <td class="text-center">
                            @php
                            $status = strtolower($doc->status);
                            $class = $status == 'sudah divalidasi' ? 'status-valid' : ($status == 'revisi' ? 'status-revisi' : 'status-pending');
                            @endphp
                            <span class="badge-custom {{ $class }}">{{ $doc->status }}</span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('dokumen.download', $doc->no_dokumen) }}" class="btn-action btn btn-info text-white" title="Unduh">
                                    <i class="fas fa-download fa-xs"></i>
                                </a>
                                <a href="{{ route('admin.dokumen.edit', $doc->no_dokumen) }}" class="btn-action btn btn-warning text-white" title="Edit">
                                    <i class="fas fa-pen fa-xs"></i>
                                </a>
                                <form action="{{ route('admin.dokumen.destroy', $doc->no_dokumen) }}" method="POST" class="d-inline delete-form">
                                    @csrf @method('DELETE')
                                    <button type="button" class="btn-action btn btn-danger btn-delete" title="Hapus">
                                        <i class="fas fa-trash fa-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#dokumenTable').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json",
                search: "_INPUT_",
                searchPlaceholder: "Cari dokumen..."
            },
            columnDefs: [{ orderable: false, targets: [0, 5] }],
            pageLength: 10
        });

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            let form = $(this).closest('form');
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Dokumen yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({ title: 'Memproses...', text: 'Sedang menghapus dokumen', allowOutsideClick: false, didOpen: () => { Swal.showLoading() } });
                    form.submit();
                }
            });
        });
    });
</script>
@endsection