@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/ukk') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form action="{{ url('admin/ukk/' . Crypt::encryptString($ukk->idUkk)) }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    @if (Storage::exists($ukk->fotoUkk))
                        File:<br>
                        <a href="{{ asset('storage/' . $ukk->fotoUkk) }}" download><i class="text-decoration">Download disini!</i></a><br>
                    @else
                        <i class="text-danger">File Tidak Tersedia!</i><br>
                    @endif
                    <label class="form-label">File* <span class="fst-italic small">(png, jpg, jpeg, jfif, pdf, docx, xlsx, xlsm, xls, pptx, avi, mkv, mp4, mov, 3gp, webp / 50MB)</span></label>
                    <input type="file" class="form-control @error('fotoUkk') is-invalid @enderror" name="fotoUkk"
                        value="{{ old('fotoUkk', $ukk->fotoUkk) }}">
                    @error('fotoUkk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Judul*</label>
                    <input type="text" class="form-control @error('judulUkk') is-invalid @enderror" name="judulUkk"
                        value="{{ old('judulUkk', $ukk->judulUkk) }}">
                    @error('judulUkk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi*</label><br>
                    <input type="hidden" id="deskripsiUkk" name="deskripsiUkk"
                        value="{{ old('deskripsiUkk', $ukk->deskripsiUkk) }}">
                    <trix-editor input="deskripsiUkk" class="@error('deskripsiUkk') border border-danger @enderror">
                    </trix-editor>
                    @error('deskripsiUkk')
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
