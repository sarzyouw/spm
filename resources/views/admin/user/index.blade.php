@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')

@section('konten')
    <div class="mb-4">
        <p class="breadcrumb-text">Pengguna / Daftar Pengguna</p>
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold" style="color: #2b3674;">Manajemen Pengguna</h2>
            <a href="{{ route('admin.users.create') }}" class="btn-primary-custom shadow-sm text-decoration-none">
                <i class="fas fa-user-plus me-2"></i> Tambah User
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success border-0 shadow-sm mb-4">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
    </div>
    @endif

    <div class="card-table">
        <div class="table-responsive">
            <table id="userTable" class="table table-hover w-100">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th class="text-center">Level</th>
                        <th class="text-center">Dibuat Pada</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                        <td><span class="fw-bold text-dark">{{ $user->username }}</span></td>
                        <td>{{ $user->nama_pegawai }}</td>
                        <td class="text-center">
                            @php
                                $levelData = $user->level == 1 ? ['Ketua', 'badge-ketua'] : ($user->level == 2 ? ['Admin', 'badge-admin'] : ['Pengunjung', 'badge-pengunjung']);
                            @endphp
                            <span class="badge-status {{ $levelData[1] }}">{{ $levelData[0] }}</span>
                        </td>
                        <td class="text-center">
                            <small class="text-muted">
                                <i class="far fa-calendar-alt me-1"></i>
                                {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}
                            </small>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.users.edit', $user->username) }}" class="btn-action btn btn-warning text-white" title="Edit">
                                    <i class="fas fa-pen fa-xs"></i>
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->username) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="button" class="btn-action btn btn-danger btn-delete-user" title="Hapus Akun">
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
        $('#userTable').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json",
                search: "_INPUT_",
                searchPlaceholder: "Cari pengguna..."
            },
            columnDefs: [{ orderable: false, targets: [0, 5] }],
            pageLength: 10
        });

        $(document).on('click', '.btn-delete-user', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');
            Swal.fire({
                title: 'Hapus akun ini?',
                text: "Data akan dihapus permanen dari sistem!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => { if (result.isConfirmed) form.submit(); });
        });
    });
</script>
@endsection