@extends('layouts.admin')

@section('title', 'Edit Pengguna')

@section('konten')
    <div class="mb-4 text-center">
        <h2 class="fw-bold">Edit Data Pengguna</h2>
        <p class="text-muted">
            Memperbarui informasi untuk akun:
            <strong class="text-primary">{{ $user->username }}</strong>
        </p> 
    </div>

    <div class="card-form">
        {{-- ALERT --}}
        @if(session('success'))
        <div class="alert alert-success">{!! session('success') !!}</div>
        @endif

        @if(session('new_password'))
        <div class="alert alert-warning">
            <strong>Password Baru:</strong>
            <code class="fs-5">{{ session('new_password') }}</code><br>
            <small class="text-muted">Simpan password ini sebelum halaman direfresh.</small>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger border-0 shadow-sm mb-4">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- SATU FORM --}}
        <form method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3"> 
                    <label class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                        <input type="text"
                            class="form-control"
                            name="username"
                            value="{{ old('username', $user->username) }}"
                            required>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Lengkap Pegawai</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text"
                            class="form-control"
                            name="nama_pegawai"
                            value="{{ old('nama_pegawai', $user->nama_pegawai) }}"
                            required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Level Akses Sistem</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-shield-alt"></i></span>
                    <select class="form-select" name="level" required>
                        <option value="1" {{ $user->level == 1 ? 'selected' : '' }}>Ketua</option>
                        <option value="2" {{ $user->level == 2 ? 'selected' : '' }}>Admin</option>
                        <option value="3" {{ $user->level == 3 ? 'selected' : '' }}>Pengunjung</option>
                    </select>
                </div>
            </div>

            {{-- ACTION BUTTON --}}
            <div class="d-flex justify-content-between align-items-center mt-4 pt-2">
                <a href="{{ route('admin.users.index') }}" class="btn-cancel">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>

                <div class="d-flex gap-2">
                    {{-- RESET PASSWORD (POST) --}}
                    <button
                        type="button"
                        id="btn-reset-pw"
                        class="btn btn-danger"
                        data-action="{{ route('admin.users.reset-password', $user->username) }}">
                        <i class="fas fa-sync-alt me-1"></i> Reset Password
                    </button>

                    {{-- UPDATE USER (PUT) --}}
                    <button
                        type="submit"
                        name="_method"
                        value="PUT"
                        class="btn-save btn-save-edit shadow-sm"
                        formaction="{{ route('admin.users.update', $user->username) }}">
                        <i class="fas fa-save me-2"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    $('#btn-reset-pw').on('click', function(e) {
        e.preventDefault();
        const actionUrl = $(this).data('action');
        Swal.fire({
            title: 'Reset Password?',
            text: "Password user ini akan dikembalikan ke pengaturan default sistem!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Reset Sekarang!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({ title: 'Memproses...', allowOutsideClick: false, didOpen: () => { Swal.showLoading() } });
                const tempForm = $('<form>', { 'method': 'POST', 'action': actionUrl });
                tempForm.append($('<input>', { 'type': 'hidden', 'name': '_token', 'value': '{{ csrf_token() }}' }));
                $('body').append(tempForm);
                tempForm.submit();
            }
        });
    });
</script>
@endsection