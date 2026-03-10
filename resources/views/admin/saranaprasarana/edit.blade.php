@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/sarana-prasarana') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form action="{{ url('admin/sarana-prasarana/' . Crypt::encryptString($saranaprasarana->idSaranaPrasarana)) }}"
                method="POST" autocomplete="off" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    @if (Storage::exists($saranaprasarana->fotoSaranaPrasarana))
                        <img src="{{ asset('storage/' . $saranaprasarana->fotoSaranaPrasarana) }}"
                            class="rounded-start border border-4 mb-2" alt="Foto Sarana Prasarana"
                            style="width: 100px; height: 100px; object-fit: cover;"><br>
                    @else
                        <img src="{{ asset('media-sistem/img-deafult.jpg') }}" class="rounded-start border border-4 mb-2"
                            alt="Foto Sarana Prasarana" style="width: 100px; height: 100px; object-fit: cover;"><br>
                    @endif
                    <label class="form-label">foto* <span class="fst-italic small">(jpg, jpeg, png, bmp, gif, svg,
                            webp / 10MB / 100px x 100px)</span></label>
                    <input type="file" class="form-control @error('fotoSaranaPrasarana') is-invalid @enderror"
                        name="fotoSaranaPrasarana">
                    @error('fotoSaranaPrasarana')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Nama Sarana Prasarana*</label>
                    <input type="text" class="form-control @error('namaSaranaPrasarana') is-invalid @enderror"
                        name="namaSaranaPrasarana"
                        value="{{ old('namaSaranaPrasarana', $saranaprasarana->namaSaranaPrasarana) }}">
                    @error('namaSaranaPrasarana')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Seskripsi Sarana Prasarana*</label>
                    <input type="text" class="form-control @error('deskripsiSaranaPrasarana') is-invalid @enderror"
                        name="deskripsiSaranaPrasarana"
                        value="{{ old('deskripsiSaranaPrasarana', $saranaprasarana->deskripsiSaranaPrasarana) }}">
                    @error('deskripsiSaranaPrasarana')
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
