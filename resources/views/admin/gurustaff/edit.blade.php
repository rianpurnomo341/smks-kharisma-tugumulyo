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
            <form action="{{ url('admin/guru-staff/' . Crypt::encryptString($gurustaff->idGuruStaff)) }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="foto" class="form-label">foto</label><br>
                    @if (Storage::exists($gurustaff->fotoGuruStaff))
                        <img src="{{ asset('storage/' . $gurustaff->fotoGuruStaff) }}" alt="foto Guru Staff"
                            style="width: 70px; height: 100px; object-fit: cover;" class="mb-2">
                    @else
                        <img src="{{ asset('media-sistem/img-deafult-gurustaff.jpg') }}"
                            class="img-fluid rounded-start border border-4 mb-2" alt="foto Guru Staff"
                            style="width: 70px; height: 100px; object-fit: cover;"><br>
                    @endif
                    <input type="file" class="form-control @error('fotoGuruStaff') is-invalid @enderror"
                        name="fotoGuruStaff">
                    @error('fotoGuruStaff')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama*</label>
                    <input type="text" class="form-control @error('namaGuruStaff') is-invalid @enderror"
                        name="namaGuruStaff" value="{{ old('namaGuruStaff', $gurustaff->namaGuruStaff) }}">
                    @error('namaGuruStaff')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="jabatan" class="form-label">jabatan*</label>
                    <input type="text" class="form-control @error('jabatanGuruStaff') is-invalid @enderror"
                        name="jabatanGuruStaff" value="{{ old('jabatanGuruStaff', $gurustaff->jabatanGuruStaff) }}">
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
