@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/info') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form action="{{ url('admin/info/' . Crypt::encryptString($info->idInfo)) }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    @if (Storage::exists($info->fotoInfo))
                        File:<br>
                        <a href="{{ asset('storage/' . $info->fotoInfo) }}" download><i class="text-decoration">Download disini!</i></a><br>
                    @else
                        <i class="text-danger">File Tidak Tersedia!</i><br>
                    @endif
                    <label class="form-label">File* <span class="fst-italic small">(png, jpg, jpeg, jfif, pdf, docx, xlsx, xlsm, xls, pptx, avi, mkv, mp4, mov, 3gp, webp / 50MB)</span></label>
                    <input type="file" class="form-control @error('fotoInfo') is-invalid @enderror" name="fotoInfo"
                        value="{{ old('fotoInfo', $info->fotoInfo) }}">
                    @error('fotoInfo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Judul*</label>
                    <input type="text" class="form-control @error('judulInfo') is-invalid @enderror" name="judulInfo"
                        value="{{ old('judulInfo', $info->judulInfo) }}">
                    @error('judulInfo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi*</label><br>
                    <input type="hidden" id="deskripsiInfo" name="deskripsiInfo"
                        value="{{ old('deskripsiInfo', $info->deskripsiInfo) }}">
                    <trix-editor input="deskripsiInfo" class="@error('deskripsiInfo') border border-danger @enderror">
                    </trix-editor>
                    @error('deskripsiInfo')
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
