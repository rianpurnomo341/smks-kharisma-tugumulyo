@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/konsentrasi') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form action="{{ url('/admin/konsentrasi') }}" method="POST" autocomplete="off">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Konsentrasi</label>
                    <input type="text" class="form-control @error('namaKonsentrasi') is-invalid @enderror"
                        name="namaKonsentrasi" value="{{ old('namaKonsentrasi') }}">
                    @error('namaKonsentrasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Deskripsi*</label>
                    <input type="hidden" id="deskripsiKonsentrasi" name="deskripsiKonsentrasi"
                        value="{{ old('deskripsiKonsentrasi') }}">
                    <trix-editor input="deskripsiKonsentrasi"
                        class="@error('deskripsiKonsentrasi') border border-danger @enderror">
                    </trix-editor>
                    @error('deskripsiKonsentrasi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Keunggulan*</label>
                    <input type="hidden" id="keunggulanKonsentrasi" name="keunggulanKonsentrasi"
                        value="{{ old('keunggulanKonsentrasi') }}">
                    <trix-editor input="keunggulanKonsentrasi"
                        class="@error('keunggulanKonsentrasi') border border-danger @enderror">
                    </trix-editor>
                    @error('keunggulanKonsentrasi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Dipelajari*</label>
                    <input type="hidden" id="dipelajariKonsentrasi" name="dipelajariKonsentrasi"
                        value="{{ old('dipelajariKonsentrasi') }}">
                    <trix-editor input="dipelajariKonsentrasi"
                        class="@error('dipelajariKonsentrasi') border border-danger @enderror">
                    </trix-editor>
                    @error('dipelajariKonsentrasi')
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
