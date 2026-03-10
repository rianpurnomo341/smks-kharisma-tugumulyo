@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/kategori-pengumuman/murid/index/'. Crypt::encryptString($kategoriPengumuman->idKategoriPengumuman)) }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form action="{{ url('/admin/kategori-pengumuman/murid/store/'. Crypt::encryptString($kategoriPengumuman->idKategoriPengumuman)) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="idKategoriPengumuman" value="{{ $kategoriPengumuman->idKategoriPengumuman }}">
                <div class="mb-4">
                    <label class="form-label">Token*</label>
                    <input type="text" class="form-control @error('tokenMurid') is-invalid @enderror" name="tokenMurid"
                        value="{{ old('tokenMurid') }}">
                    @error('tokenMurid')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Nama*</label>
                    <input type="text" class="form-control @error('namaMurid') is-invalid @enderror" name="namaMurid"
                        value="{{ old('namaMurid') }}">
                    @error('namaMurid')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan*</label><br>
                    <input type="hidden" id="keteranganMurid" name="keteranganMurid" value="{{ old('keteranganMurid') }}">
                    <trix-editor input="keteranganMurid" class="@error('keteranganMurid') border border-danger @enderror">
                    </trix-editor>
                    @error('keteranganMurid')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">File <span class="fst-italic small">(png, jpg, jpeg, jfif, pdf, docx, xlsx, xlsm, xls, pptx, avi, mkv, mp4, mov, 3gp, webp / 50MB)</span></label>
                    <input type="file" class="form-control @error('fileMurid') is-invalid @enderror" name="fileMurid"
                        value="{{ old('fileMurid') }}">
                    @error('fileMurid')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save pr-1"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
