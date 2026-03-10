@extends('admin.layout.main')

@section('content')

    <div class="d-sm-flex justify-content-between mb-3 mt-n3">
        <h1 class="h3 text-muted">{{ $title }}</h1>
        <a href="{{ url('/admin/galeri') }}" class="btn btn-danger">
            <span class="text ">Back Page</span>
        </a>
    </div>
   
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (!$galeri)
                        <h6 class="text-center text-danger">Sistem Dalam Perbaikan, Silahkan Hubungi Developer!</h6>
                    @else
                    <form action="{{ url('admin/galeri/' . Crypt::encryptString($galeri->idGaleri)) }}" method="POST" enctype="multipart/form-data"> 
                        @method('PUT')
                        @csrf
                            <div class="mb-4">
                                @if (Storage::exists($galeri->namaGaleri))
                                    <img src="{{ asset('storage/' . $galeri->namaGaleri) }}"  style="height: 240px;" alt="foto galeri" class="img-fluid img-thumbnail mb-2"><br>
                                @else
                                    <img src="{{ asset('media-sistem/pictureDefault.jpg') }}"  style="height: 125px; object-fit: cover;" alt="tidak ada foto" class="img-fluid mb-2"><br>
                                @endif
                                <label class="form-label">Foto <span class="fst-italic small">(jpg, jpeg, png, bmp, gif, svg, webp / 10MB)</span></label>
                                <input type="file" class="form-control @error('namaGaleri') is-invalid @enderror" name="namaGaleri">
                                @error('namaGaleri')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-4">
                                        <label class="form-label">Tanda Galeri Lama</label>
                                        <select class="form-select me-2 searchSelect" name="titleGaleri">
                                            @if ($galeri->titleGaleri)
                                                <option value="{{ $galeri->titleGaleri }}">{{ $galeri->titleGaleri }}</option>
                                                <option value="">~ Kosongkan Tanda Galeri~</option>    
                                            @else
                                                <option value="">~ Pilih Tanda Galeri ~</option>
                                            @endif
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
                                    Simpan
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection