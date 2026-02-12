@extends('layouts.admin')

@section('title', 'Tambah Dokumen')

@section('konten')
    <div class="mb-4 text-center">
        <h2 class="fw-bold">Unggah Dokumen Baru</h2>
        <p class="text-muted">Lengkapi detail informasi dokumen untuk diarsipkan ke dalam sistem</p>
    </div>

    <div class="card-form" style="max-width: 850px;">
        @if($errors->any())
        <div class="alert alert-danger border-0 shadow-sm mb-4">
            <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
        @endif

        <form action="{{ route('admin.dokumen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="username" value="{{ session('username') }}">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor Dokumen</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                        <input type="text" name="no_dokumen" class="form-control" value="{{ old('no_dokumen') }}" placeholder="Contoh: 2023001" required>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Jenis Dokumen</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-list"></i></span>
                        <select name="jenis" class="form-select" required>
                            <option value="" selected disabled>Pilih Jenis Dokumen</option>
                            <option value="kebijakan mutu">Kebijakan Mutu</option>
                            <option value="manual mutu">Manual Mutu</option>
                            <option value="standar mutu">Standar Mutu</option>
                            <option value="sop">SOP</option>
                            <option value="audit mutu internal">Audit Mutu Internal</option>
                            <option value="akreditasi perguruan tinggi">Akreditasi Perguruan Tinggi</option>
                            <option value="akreditasi program studi">Akreditasi Program Studi</option>
                            <option value="pendokumentasian">Pendokumentasian</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Dokumen</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    <input type="text" name="nama_dok" class="form-control" placeholder="Masukkan judul lengkap dokumen" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan Tambahan</label>
                <textarea name="keterangan" class="form-control" style="border-left: 1px solid #ced4da; padding-left: 15px;" rows="3"></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">File Dokumen</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-cloud-upload-alt"></i></span>
                        <input type="file" name="file_upload" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Link Eksternal</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                        <input type="text" name="link" class="form-control" placeholder="https://...">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                <a href="{{ route('admin.dokumen.index') }}" class="btn-cancel">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
                <button type="submit" class="btn-save shadow-sm">
                    <i class="fas fa-save me-2"></i> Simpan
                </button>
            </div>
        </form>
    </div>
@endsection