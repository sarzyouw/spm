@extends('layouts.admin')

@section('title', 'Tambah Pengguna')

@section('konten')
<div class="mb-4 text-center">
    <h2 class="fw-bold">Tambah Pengguna Baru</h2>
    <p class="text-muted">Lengkapi data di bawah untuk membuat akun akses baru</p>
</div>

<div class="card-form">
    @if($errors->any())
    <div class="alert alert-danger border-0 shadow-sm mb-4">
        <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                    <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Contoh: admin_stmi" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Nama Pegawai</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" name="nama_pegawai" value="{{ old('nama_pegawai') }}" placeholder="Nama Lengkap">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Level Akses</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-shield-alt"></i></span>
                <select class="form-select" name="level" required>
                    <option value="" selected disabled>Pilih Hak Akses...</option>
                    <option value="1" {{ old('level') == 1 ? 'selected' : '' }}>Ketua</option>
                    <option value="2" {{ old('level') == 2 ? 'selected' : '' }}>Admin</option>
                    <option value="3" {{ old('level') == 3 ? 'selected' : '' }}>Pengunjung</option>
                </select>
            </div>
        </div>
        <div class="alert alert-warning small d-flex align-items-start gap-2 mb-4">
            <i class="fas fa-info-circle mt-1"></i>
            <div><strong>Password Default:</strong> <code>stmijakarta</code></div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.users.index') }}" class="btn-cancel">Batal</a>
            <button type="submit" class="btn-save">Simpan</button>
        </div>
    </form>
</div>
@endsection