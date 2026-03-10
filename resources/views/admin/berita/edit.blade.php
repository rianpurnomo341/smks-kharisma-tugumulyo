@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/berita') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form action="{{ url('admin/berita/' . Crypt::encryptString($berita->idBerita)) }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    @if (Storage::exists($berita->fotoBerita))
                        <img src="{{ asset('storage/' . $berita->fotoBerita) }}"
                            class="img-fluid rounded-start border border-4 mb-2" alt="foto berita"
                            style="width: 240px; height: 150px; object-fit: cover;"><br>
                    @else
                        <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                            class="img-fluid rounded-start border border-4 mb-2" alt="foto berita"
                            style="width: 240px; object-fit: cover;"><br>
                    @endif
                    <label class="form-label">foto* <span class="fst-italic small">(jpg, jpeg, png, bmp, gif, svg,
                            webp / 10MB)</span></label>
                    <input type="file" class="form-control @error('fotoBerita') is-invalid @enderror" name="fotoBerita"
                        value="{{ old('fotoBerita', $berita->fotoBerita) }}">
                    @error('fotoBerita')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Judul*</label>
                    <input type="text" class="form-control @error('judulBerita') is-invalid @enderror" name="judulBerita"
                        value="{{ old('judulBerita', $berita->judulBerita) }}">
                    @error('judulBerita')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi*</label><br>
                    <input type="hidden" id="deskripsiBerita" name="deskripsiBerita"
                        value="{{ old('deskripsiBerita', $berita->deskripsiBerita) }}">
                    <trix-editor input="deskripsiBerita" class="@error('deskripsiBerita') border border-danger @enderror">
                    </trix-editor>
                    @error('deskripsiBerita')
                        <small class="text-danger">{{ $message }}</small>
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
