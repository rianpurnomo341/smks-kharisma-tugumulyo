@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/galeri') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form action="{{ url('admin/galeri') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Galeri* <span class="fst-italic small">(jpg, jpeg, png, bmp, gif, svg,
                            webp / 10MB)</span></label>
                    <input type="file" class="form-control @error('namaGaleri') is-invalid @enderror" name="namaGaleri">
                    @error('namaGaleri')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="mb-4">
                            <label class="form-label">Title Galeri Lama</label><br>
                            <select class="form-select me-2 searchSelect" name="titleGaleri">
                                <option value="">~ Pilih Title Galeri ~</option>
                                @foreach ($titleGaleri as $item)
                                    <option value="{{ $item->titleGaleri }}" {{ old('titleGaleri') == $item->titleGaleri ? 'selected="selected"' : '' }}>{{ $item->titleGaleri }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="mb-4">
                            <label class="form-label">Tanda Galeri Baru</label>
                            <input type="text" class="form-control @error('titleGaleriBaru') is-invalid @enderror" name="titleGaleriBaru" value="{{ old('titleGaleriBaru') }}">
                            @error('titleGaleriBaru')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
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
