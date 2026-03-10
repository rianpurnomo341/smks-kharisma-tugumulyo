@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="my-1">{{ $title }}</h4>
    </div>
    <form action="{{ url('admin/sambutan-pimpinan/' . Crypt::encryptString($sambutanPimpinan->idSambutanPimpinan)) }}" method="POST"
        autocomplete="off" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card shadow-sm mb-5">
            <div class="card-header">Sambutan Pimpinan</div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="form-label">Video Sambutan</label><br>
                    <video controls style="width: auto; height: 160px; object-fit: cover;" class="img-thumbnail mb-2">
                        <source src="{{ asset('storage/' . $sambutanPimpinan->videoSambutanPimpinan) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video><br>
                    <input type="file" class="form-control @error('videoSambutanPimpinan') is-invalid @enderror"
                        name="videoSambutanPimpinan">
                    @error('videoSambutanPimpinan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Nama Pimpinan*</label><br>
                    <input type="text" class="form-control @error('namaSambutanPimpinan') is-invalid @enderror"
                        name="namaSambutanPimpinan"
                        value="{{ old('namaSambutanPimpinan', $sambutanPimpinan->namaSambutanPimpinan) }}">
                    @error('namaSambutanPimpinan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Deskripsi Sambutan*</label><br>
                    <input type="hidden" id="deskripsiSambutanPimpinan" name="deskripsiSambutanPimpinan"
                        value="{{ old('deskripsiSambutanPimpinan', $sambutanPimpinan->deskripsiSambutanPimpinan) }}">
                    <trix-editor input="deskripsiSambutanPimpinan"
                        class="@error('deskripsiSambutanPimpinan') border border-danger @enderror">
                    </trix-editor>
                    @error('deskripsiSambutanPimpinan')
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
