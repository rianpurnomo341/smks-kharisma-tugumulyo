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
            <form action="{{ url('admin/ekstrakurikuler') }}" method="POST" autocomplete="off"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="form-label">foto* <span class="fst-italic small">(jpg, jpeg, png, bmp, gif, svg,
                            webp / 10MB / 100px x 100px)</span></label>
                    <input type="file" class="form-control @error('fotoEkstrakurikuler') is-invalid @enderror"
                        name="fotoEkstrakurikuler" value="{{ old('fotoEkstrakurikuler') }}">
                    @error('fotoEkstrakurikuler')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Nama Ekstrakurikuler*</label>
                    <input type="text" class="form-control @error('namaEkstrakurikuler') is-invalid @enderror"
                        name="namaEkstrakurikuler" value="{{ old('namaEkstrakurikuler') }}">
                    @error('namaEkstrakurikuler')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Kepanjangan Ekstrakurikuler*</label>
                    <input type="text" class="form-control @error('kepanjanganEkstrakurikuler') is-invalid @enderror"
                        name="kepanjanganEkstrakurikuler" value="{{ old('kepanjanganEkstrakurikuler') }}">
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
