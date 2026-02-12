@extends('layouts.admin')

@section('title', 'Edit Dokumen')

@section('konten')
    <div class="mb-4 text-center">
        <h2 class="fw-bold">Edit Detail Dokumen</h2>
        <p class="text-muted">Memperbarui informasi untuk dokumen: <strong class="text-primary">{{ $dokumen->nama_dok }}</strong></p>
    </div>

    <div class="card-form" style="max-width: 800px;">
        @if($errors->any())
        <div class="alert alert-danger border-0 shadow-sm mb-4">
            <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
        @endif

        <form action="{{ route('admin.dokumen.update', $dokumen->no_dokumen) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <input type="hidden" name="username" value="{{ $dokumen->username }}">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor Dokumen</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                        <input type="text" name="no_dokumen" class="form-control" value="{{ $dokumen->no_dokumen }}" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jenis Dokumen</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-list"></i></span>
                        <select name="jenis" class="form-select" required>
                            @foreach(['kebijakan mutu', 'manual mutu', 'standar mutu', 'sop', 'audit mutu internal', 'akreditasi perguruan tinggi', 'akreditasi program studi', 'pendokumentasian'] as $value)
                            <option value="{{ $value }}" {{ $dokumen->jenis == $value ? 'selected' : '' }}>{{ ucwords($value) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Dokumen</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    <input type="text" name="nama_dok" class="form-control" value="{{ $dokumen->nama_dok }}" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">File Saat Ini</label>
                <div class="current-file-box">
                    @if($dokumen->link)
                    <div class="d-flex align-items-center">
                        <i class="fas fa-file-pdf text-danger fs-4 me-3"></i>
                        <div class="text-truncate">
                            <a href="{{ asset($dokumen->link) }}" target="_blank" class="text-primary text-decoration-none fw-medium">{{ basename($dokumen->link) }}</a>
                        </div>
                    </div>
                    @else
                    <span class="text-muted small italic">Belum ada file terlampir</span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Ganti File</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-upload"></i></span>
                        <input type="file" name="file_upload" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Link URL</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                        <input type="text" name="link" class="form-control" value="{{ $dokumen->link }}">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                <a href="{{ route('admin.dokumen.index') }}" class="btn-cancel">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
                <button type="submit" class="btn-save btn-save-edit shadow-sm">
                    <i class="fas fa-save me-2"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection