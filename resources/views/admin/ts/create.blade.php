@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/ts') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form action="{{ url('admin/ts') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="form-label">File* <span class="fst-italic small">(png, jpg, jpeg, jfif, pdf, docx, xlsx, xlsm, xls, pptx, avi, mkv, mp4, mov, 3gp, webp / 50MB)</span></label>
                    <input type="file" class="form-control @error('fotoTs') is-invalid @enderror" name="fotoTs"
                        value="{{ old('fotoTs') }}">
                    @error('fotoTs')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Judul*</label>
                    <input type="text" class="form-control @error('judulTs') is-invalid @enderror" name="judulTs"
                        value="{{ old('judulTs') }}">
                    @error('judulTs')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi*</label><br>
                    <input type="hidden" id="deskripsiTs" name="deskripsiTs" value="{{ old('deskripsiTs') }}">
                    <trix-editor input="deskripsiTs" class="@error('deskripsiTs') border border-danger @enderror">
                    </trix-editor>
                    @error('deskripsiTs')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="modal-footer mt-4">
                    <button type="submit" class="btn btn-primary col-2">
                        <i class="fas fa-save pr-1"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
