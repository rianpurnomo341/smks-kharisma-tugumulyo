@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/ekstrakurikuler') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form action="{{ url('admin/ekstrakurikuler/' . Crypt::encryptString($ekstrakurikuler->idEkstrakurikuler)) }}"
                method="POST" autocomplete="off" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    @if (Storage::exists($ekstrakurikuler->fotoEkstrakurikuler))
                        <img src="{{ asset('storage/' . $ekstrakurikuler->fotoEkstrakurikuler) }}"
                            class="rounded-start border border-4 mb-2" alt="Foto Ekstrakurikuler"
                            style="width: 100px; height: 100px;"><br>
                    @else
                        <img src="{{ asset('media-sistem/img-deafult.jpg') }}" class="rounded-start border border-4 mb-2"
                            alt="Foto Ekstrakurikuler" style="width: 100px; height: 100px; object-fit: cover;"><br>
                    @endif
                    <label class="form-label">foto* <span class="fst-italic small">(jpg, jpeg, png, bmp, gif, svg,
                            webp / 10MB / 100px x 100px)</span></label>
                    <input type="file" class="form-control @error('fotoEkstrakurikuler') is-invalid @enderror"
                        name="fotoEkstrakurikuler">
                    @error('fotoEkstrakurikuler')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Nama Ekstrakurikuler*</label>
                    <input type="text" class="form-control @error('namaEkstrakurikuler') is-invalid @enderror"
                        name="namaEkstrakurikuler"
                        value="{{ old('namaEkstrakurikuler', $ekstrakurikuler->namaEkstrakurikuler) }}">
                    @error('namaEkstrakurikuler')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Kepanjangan Ekstrakurikuler*</label>
                    <input type="text" class="form-control @error('kepanjanganEkstrakurikuler') is-invalid @enderror"
                        name="kepanjanganEkstrakurikuler"
                        value="{{ old('kepanjanganEkstrakurikuler', $ekstrakurikuler->kepanjanganEkstrakurikuler) }}">
                    @error('kepanjanganEkstrakurikuler')
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
