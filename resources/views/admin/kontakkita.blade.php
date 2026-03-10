@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="my-1">{{ $title }}</h4>
    </div>
    <form action="{{ url('admin/kontak-kita/' . Crypt::encryptString($kontakKita->idKontakKita)) }}" method="POST"
        autocomplete="off" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card shadow-sm mb-5">
            <div class="card-header">Kontak Kita</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <div class="mb-4">
                            <label class="form-label">Email*</label><br>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email', $kontakKita->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">alamat*</label><br>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" rows="3" name="alamat">{{ $kontakKita->alamat }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="mb-4">
                            <label class="form-label">Telepon*</label><br>
                            <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                                name="telepon" value="{{ old('telepon', $kontakKita->telepon) }}">
                            @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Peta*</label><br>
                            <textarea class="form-control @error('peta') is-invalid @enderror" rows="3" name="peta">{{ $kontakKita->peta }}</textarea>
                            @error('peta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
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
