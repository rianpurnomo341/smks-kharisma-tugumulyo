@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="my-1">{{ $title }}</h4>
    </div>
    <form action="{{ url('admin/struktur-sekolah/' . Crypt::encryptString($strukturSekolah->idStrukturSekolah)) }}" method="POST"
        autocomplete="off" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card shadow-sm mb-5">
            <div class="card-header">Struktur Sekolah</div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="form-label">foto Struktur Sekolah</label><br>
                    @if (Storage::exists($strukturSekolah->fotoStrukturSekolah))
                        <img src="{{ asset('storage/' . $strukturSekolah->fotoStrukturSekolah) }}" alt="foto stuktur sekolah"
                            style="width: auto; height: 160px; object-fit: cover;" class="img-thumbnail mb-2"><br>
                    @else
                        <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                            class="img-fluid rounded-start border border-4 mb-2" alt="foto stuktur sekolah"
                            style="width: auto; height: 160px; object-fit: cover;"><br>
                    @endif
                    <input type="file" class="form-control @error('fotoStrukturSekolah') is-invalid @enderror"
                        name="fotoStrukturSekolah">
                    @error('fotoStrukturSekolah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Deskripsi Struktur Sekolah*</label><br>
                    <input type="hidden" id="deskripsiStrukturSekolah" name="deskripsiStrukturSekolah"
                        value="{{ old('deskripsiStrukturSekolah', $strukturSekolah->deskripsiStrukturSekolah) }}">
                    <trix-editor input="deskripsiStrukturSekolah"
                        class="@error('deskripsiStrukturSekolah') border border-danger @enderror">
                    </trix-editor>
                    @error('deskripsiStrukturSekolah')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="modal-footer mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save pr-1"></i>
                    Simpan
                </button>
            </div>
        </div>
    </form>
@endsection
