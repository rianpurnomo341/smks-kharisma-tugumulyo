@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/guru-staff') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form action="{{ url('admin/guru-staff') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="form-label">foto</label>
                    <input type="file" class="form-control @error('fotoGuruStaff') is-invalid @enderror"
                        name="fotoGuruStaff">
                    @error('fotoGuruStaff')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Nama*</label>
                    <input type="text" class="form-control @error('namaGuruStaff') is-invalid @enderror"
                        name="namaGuruStaff" value="{{ old('namaGuruStaff') }}">
                    @error('namaGuruStaff')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">jabatan*</label>
                    <input type="text" class="form-control @error('jabatanGuruStaff') is-invalid @enderror"
                        name="jabatanGuruStaff" value="{{ old('jabatanGuruStaff') }}">
                    @error('jabatanGuruStaff')
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
