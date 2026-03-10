@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/bkk') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form action="{{ url('admin/bkk/' . Crypt::encryptString($bkk->idBkk)) }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    @if (Storage::exists($bkk->fotoBkk))
                        File:<br>
                        <a href="{{ asset('storage/' . $bkk->fotoBkk) }}" download><i class="text-decoration">Download disini!</i></a><br>
                    @else
                        <i class="text-danger">File Tidak Tersedia!</i><br>
                    @endif
                    <label class="form-label">File* <span class="fst-italic small">(png, jpg, jpeg, jfif, pdf, docx, xlsx, xlsm, xls, pptx, avi, mkv, mp4, mov, 3gp, webp / 50MB)</span></label>
                    <input type="file" class="form-control @error('fotoBkk') is-invalid @enderror" name="fotoBkk"
                        value="{{ old('fotoBkk', $bkk->fotoBkk) }}">
                    @error('fotoBkk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Judul*</label>
                    <input type="text" class="form-control @error('judulBkk') is-invalid @enderror" name="judulBkk"
                        value="{{ old('judulBkk', $bkk->judulBkk) }}">
                    @error('judulBkk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi*</label><br>
                    <input type="hidden" id="deskripsiBkk" name="deskripsiBkk"
                        value="{{ old('deskripsiBkk', $bkk->deskripsiBkk) }}">
                    <trix-editor input="deskripsiBkk" class="@error('deskripsiBkk') border border-danger @enderror">
                    </trix-editor>
                    @error('deskripsiBkk')
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
