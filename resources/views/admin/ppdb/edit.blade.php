@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/ppdb') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form action="{{ url('admin/ppdb/' . Crypt::encryptString($ppdb->idPpdb)) }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    @if (Storage::exists($ppdb->fotoPpdb))
                        <img src="{{ asset('storage/' . $ppdb->fotoPpdb) }}"
                            class="img-fluid rounded-start border border-4 mb-2" alt="foto ppdb"
                            style="width: 240px; height: 150px; object-fit: cover;"><br>
                    @else
                        <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                            class="img-fluid rounded-start border border-4 mb-2" alt="foto ppdb"
                            style="width: 240px; object-fit: cover;"><br>
                    @endif
                    <br>
                    @if (Storage::exists($ppdb->filePpdb))
                        File:<br>
                        <a href="{{ asset('storage/' . $ppdb->filePpdb) }}" download><i class="text-decoration">Download disini!</i></a><br><br>
                    @endif
                    <label class="form-label">File* <span class="fst-italic small">(png, jpg, jpeg, jfif, pdf, docx, xlsx, xlsm, xls, pptx, avi, mkv, mp4, mov, 3gp, webp / 50MB)</span></label>
                    <input type="file" class="form-control @error('filePpdb') is-invalid @enderror" name="filePpdb"
                        value="{{ old('filePpdb', $ppdb->filePpdb) }}">
                    @error('filePpdb')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Foto* <span class="fst-italic small">(jpg,jpeg,png,bmp,gif,svg,webp / 10MB)</span></label>
                    <input type="file" class="form-control @error('fotoPpdb') is-invalid @enderror" name="fotoPpdb"
                        value="{{ old('fotoPpdb') }}">
                    @error('fotoPpdb')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Judul*</label>
                    <input type="text" class="form-control @error('judulPpdb') is-invalid @enderror" name="judulPpdb"
                        value="{{ old('judulPpdb', $ppdb->judulPpdb) }}">
                    @error('judulPpdb')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi*</label><br>
                    <input type="hidden" id="deskripsiPpdb" name="deskripsiPpdb"
                        value="{{ old('deskripsiPpdb', $ppdb->deskripsiPpdb) }}">
                    <trix-editor input="deskripsiPpdb" class="@error('deskripsiPpdb') border border-danger @enderror">
                    </trix-editor>
                    @error('deskripsiPpdb')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="modal-footer mt-4">
                    <button type="submit" class="btn btn-primary col-2">
                        <i class="fas fa-save pr-1"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
