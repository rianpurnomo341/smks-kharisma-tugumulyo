@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="my-1">{{ $title }}</h4>
    </div>
    <form action="{{ url('admin/panel/' . Crypt::encryptString($panel->idPanel)) }}" method="POST"
        autocomplete="off" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card shadow-sm mb-5">
            <div class="card-header">Panel</div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="form-label">foto Mengapa SMK Kharisma</label><br>
                    @if (Storage::exists($panel->fotoMengapaSmkkharisma))
                        <img src="{{ asset('storage/' . $panel->fotoMengapaSmkkharisma) }}"
                            alt="foto mengapa Smk kharisma" style="width: auto; height: 160px; object-fit: cover;"
                            class="img-thumbnail mb-2"><br>
                    @else
                        <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                            class="img-fluid rounded-start border border-4 mb-2" alt="foto mengapa Smk kharisma"
                            style="width: auto; height: 160px; object-fit: cover;"><br>
                    @endif
                    <input type="file" class="form-control @error('fotoMengapaSmkkharisma') is-invalid @enderror"
                        name="fotoMengapaSmkkharisma">
                    @error('fotoMengapaSmkkharisma')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Jumlah Siswa Siswi*</label><br>
                    <input type="text" class="form-control @error('jmlSiswaSiswi') is-invalid @enderror"
                        name="jmlSiswaSiswi" value="{{ old('jmlSiswaSiswi', $panel->jmlSiswaSiswi) }}">
                    @error('jmlSiswaSiswi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Jumlah Ruang Kelas*</label><br>
                    <input type="text" class="form-control @error('jmlRuangKelas') is-invalid @enderror"
                        name="jmlRuangKelas" value="{{ old('jmlRuangKelas', $panel->jmlRuangKelas) }}">
                    @error('jmlRuangKelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Jumlah Guru Staff*</label><br>
                    <input type="text" class="form-control @error('jmlGuruStaff') is-invalid @enderror"
                        name="jmlGuruStaff" value="{{ old('jmlGuruStaff', $panel->jmlGuruStaff) }}">
                    @error('jmlGuruStaff')
                        <div class="invalid-feedback">{{ $message }}</div>
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
