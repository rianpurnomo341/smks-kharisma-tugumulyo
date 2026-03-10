@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/kategori-pengumuman') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form
                action="{{ url('admin/kategori-pengumuman/' . Crypt::encryptString($kategoriPengumuman->idKategoriPengumuman)) }}"
                method="POST">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label class="form-label">Judul Kategori Pengumuman*</label>
                    <input type="text" class="form-control @error('judulKategoriPengumuman') is-invalid @enderror" name="judulKategoriPengumuman"
                        value="{{ old('judulKategoriPengumuman', $kategoriPengumuman->judulKategoriPengumuman) }}">
                    @error('judulKategoriPengumuman')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi Kategori Pengumuman*</label><br>
                    <input type="hidden" id="deskripsiKategoriPengumuman" name="deskripsiKategoriPengumuman"
                        value="{{ old('deskripsiKategoriPengumuman', $kategoriPengumuman->deskripsiKategoriPengumuman) }}">
                    <trix-editor input="deskripsiKategoriPengumuman" class="@error('deskripsiKategoriPengumuman') border border-danger @enderror">
                    </trix-editor>
                    @error('deskripsiKategoriPengumuman')
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
