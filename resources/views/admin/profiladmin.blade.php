@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form Profil Admin</div>
        <div class="card-body">
            <form action="{{ url('/admin/profil-admin') }}" method="POST" autocomplete="off">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Password Lama*</label>
                    <input type="password" class="form-control @error('password_lama') is-invalid @enderror"
                        name="password_lama" required>
                    @error('password_lama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Nama Lengkap*</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name', Auth::user()->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Email*</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email', Auth::user()->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Password Baru</label>
                    <input type="password" class="form-control @error('password_baru') is-invalid @enderror"
                        name="password_baru">
                    @error('password_baru')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save col-2 pr-4"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
