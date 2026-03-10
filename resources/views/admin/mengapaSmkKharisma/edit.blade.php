@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/mengapa-smk-kharisma') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form
                action="{{ url('admin/mengapa-smk-kharisma/' . Crypt::encryptString($mengapasmkkharisma->idMengapaSmkkharisma)) }}"
                method="POST">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label class="form-label">Deskripsi Mengapa Smk Kharism</label>
                    <textarea type="text" class="form-control @error('deskripsiMengapaSmkkharisma') is-invalid @enderror"
                        name="deskripsiMengapaSmkkharisma">{{ old('deskripsiMengapaSmkkharisma', $mengapasmkkharisma->deskripsiMengapaSmkkharisma) }}</textarea>
                    @error('deskripsiMengapaSmkkharisma')
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
