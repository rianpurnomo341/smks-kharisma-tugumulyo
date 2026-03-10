@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="my-1">{{ $title }}</h4>
    </div>
    <form action="{{ url('admin/sejarah/' . Crypt::encryptString($sejarah->idSejarah)) }}" method="POST"
        autocomplete="off" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card shadow-sm mb-5">
            <div class="card-header">Sejarah</div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="form-label">foto Sejarah</label><br>
                    @if (Storage::exists($sejarah->fotoSejarah))
                        <img src="{{ asset('storage/' . $sejarah->fotoSejarah) }}" alt="foto sejarah sekolah"
                            style="width: auto; height: 160px; object-fit: cover;" class="img-thumbnail mb-2"><br>
                    @else
                        <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                            class="img-fluid rounded-start border border-4 mb-2" alt="foto sejarah sekolah"
                            style="width: auto; height: 160px; object-fit: cover;"><br>
                    @endif
                    <input type="file" class="form-control @error('fotoSejarah') is-invalid @enderror"
                        name="fotoSejarah">
                    @error('fotoSejarah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Deskripsi Sejarah*</label><br>
                    <input type="hidden" id="deskripsiSejarah" name="deskripsiSejarah"
                        value="{{ old('deskripsiSejarah', $sejarah->deskripsiSejarah) }}">
                    <trix-editor input="deskripsiSejarah" class="@error('deskripsiSejarah') border border-danger @enderror">
                    </trix-editor>
                    @error('deskripsiSejarah')
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
