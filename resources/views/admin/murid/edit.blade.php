@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/kategori-pengumuman/murid/index/'. Crypt::encryptString($murid->idKategoriPengumuman)) }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form action="{{ url('/admin/kategori-pengumuman/murid/update/' . Crypt::encryptString($murid->idMurid)) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    @if (Storage::exists($murid->fileMurid))
                        @if (pathinfo($murid->fileMurid, PATHINFO_EXTENSION) == 'png' || pathinfo($murid->fileMurid, PATHINFO_EXTENSION) == 'jpg' || pathinfo($murid->fileMurid, PATHINFO_EXTENSION) == 'jpeg')
                            <div class="text-center">
                                    <img src="{{ asset('storage/' . $murid->fileMurid) }}" class="img-fluid rounded-start border border-4 mb-2" alt="file keterangan"><br>
                            </div>
                            <div class="pt-3 pb-4 fst-italic">
                               <h6 class="fst-italic fw-bold"><span class="border-bottom">Download:</span></h6>
                                <a href="{{ asset('storage/' . $murid->fileMurid) }}" download>Download File Disini</a>
                            </div>
                        @endif
                        @if(pathinfo($murid->fileMurid, PATHINFO_EXTENSION) == 'pdf')
                            <div class="text-center">
                                <div class="ratio ratio-16x9">
                                    <iframe src="{{ asset('storage/' . $murid->fileMurid) }}" title="File Keterangan" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="pt-2 pb-4 fst-italic">
                               <h6 class="fst-italic fw-bold"><span class="border-bottom">Download:</span></h6>
                                <a href="{{ asset('storage/' . $murid->fileMurid) }}" download>Download File Disini</a>
                            </div>
                        @endif
                    @endif
                    <label class="form-label">File* <span class="fst-italic small">(png, jpg, jpeg, jfif, pdf, docx, xlsx, xlsm, xls, pptx, avi, mkv, mp4, mov, 3gp, webp / 50MB)</span></label>
                    <input type="file" class="form-control @error('fileMurid') is-invalid @enderror" name="fileMurid" value="{{ old('fileMurid', $murid->fileMurid) }}">
                    @error('fileMurid')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Token*</label>
                    <input type="text" class="form-control @error('tokenMurid') is-invalid @enderror" name="tokenMurid"
                        value="{{ old('tokenMurid', $murid->tokenMurid) }}">
                    @error('tokenMurid')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Nama*</label>
                    <input type="text" class="form-control @error('namaMurid') is-invalid @enderror" name="namaMurid"
                        value="{{ old('namaMurid', $murid->namaMurid) }}">
                    @error('namaMurid')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi*</label><br>
                    <input type="hidden" id="keteranganMurid" name="keteranganMurid"
                        value="{{ old('keteranganMurid', $murid->keteranganMurid) }}">
                    <trix-editor input="keteranganMurid" class="@error('keteranganMurid') border border-danger @enderror">
                    </trix-editor>
                    @error('keteranganMurid')
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
