@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="my-1">{{ $title }}</h4>
    </div>
    <form action="{{ url('admin/profil-sekolah/' . Crypt::encryptString($profilsekolah->idProfilSekolah)) }}" method="POST"
        autocomplete="off" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card shadow-sm mb-5">
            <div class="card-header">Sejarah</div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="form-label">foto Sejarah</label><br>
                    @if (Storage::exists($profilsekolah->fotoSejarah))
                        <img src="{{ asset('storage/' . $profilsekolah->fotoSejarah) }}" alt="foto sejarah sekolah"
                            style="width: auto; height: 160px; object-fit: cover;" class="img-thumbnail mb-2"><br>
                    @else
                        <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                            class="img-fluid rounded-start border border-4 mb-2" alt="foto sejarah sekolah"
                            style="width: 70px; height: 100px; object-fit: cover;"><br>
                    @endif
                    <input type="file" class="form-control @error('fotoSejarah') is-invalid @enderror"
                        name="fotoSejarah">
                    @error('fotoSejarah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Deskripsi Sejarah*</label><br>
                    <input type="hidden" id="deskripsiSejarah" name="deskripsiSejarah"
                        value="{{ old('deskripsiSejarah', $profilsekolah->deskripsiSejarah) }}">
                    <trix-editor input="deskripsiSejarah" class="@error('deskripsiSejarah') border border-danger @enderror">
                    </trix-editor>
                    @error('deskripsiSejarah')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card shadow-sm mb-5">
            <div class="card-header">Struktur Sekolah</div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="form-label">foto Struktur Sekolah</label><br>
                    @if (Storage::exists($profilsekolah->fotoStrukturSekolah))
                        <img src="{{ asset('storage/' . $profilsekolah->fotoStrukturSekolah) }}" alt="foto stuktur sekolah"
                            style="width: auto; height: 160px; object-fit: cover;" class="img-thumbnail mb-2"><br>
                    @else
                        <img src="{{ asset('media-sistem/img-deafult-gurustaff.jpg') }}"
                            class="img-fluid rounded-start border border-4 mb-2" alt="foto stuktur sekolah"
                            style="width: 70px; height: 100px; object-fit: cover;"><br>
                    @endif
                    <input type="file" class="form-control @error('fotoStrukturSekolah') is-invalid @enderror"
                        name="fotoStrukturSekolah">
                    @error('fotoStrukturSekolah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Deskripsi Struktur Sekolah*</label><br>
                    <input type="hidden" id="deskripsiStrukturSekolah" name="deskripsiStrukturSekolah"
                        value="{{ old('deskripsiStrukturSekolah', $profilsekolah->deskripsiStrukturSekolah) }}">
                    <trix-editor input="deskripsiStrukturSekolah"
                        class="@error('deskripsiStrukturSekolah') border border-danger @enderror">
                    </trix-editor>
                    @error('deskripsiStrukturSekolah')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card shadow-sm mb-5">
            <div class="card-header">Sambutan Pimpinan</div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="form-label">Video Sambutan</label><br>
                    <video controls style="width: auto; height: 160px; object-fit: cover;" class="img-thumbnail mb-2">
                        <source src="{{ asset('storage/' . $profilsekolah->videoSambutanPimpinan) }}" type="video/mp4">
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
                        value="{{ old('namaSambutanPimpinan', $profilsekolah->namaSambutanPimpinan) }}">
                    @error('namaSambutanPimpinan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Deskripsi Sambutan*</label><br>
                    <input type="hidden" id="deskripsiSambutanPimpinan" name="deskripsiSambutanPimpinan"
                        value="{{ old('deskripsiSambutanPimpinan', $profilsekolah->deskripsiSambutanPimpinan) }}">
                    <trix-editor input="deskripsiSambutanPimpinan"
                        class="@error('deskripsiSambutanPimpinan') border border-danger @enderror">
                    </trix-editor>
                    @error('deskripsiSambutanPimpinan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card shadow-sm mb-5">
            <div class="card-header">Visi, Misi dan Tujuan</div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="form-label">Visi*</label><br>
                    <input type="hidden" id="visi" name="visi" value="{{ old('visi', $profilsekolah->visi) }}">
                    <trix-editor input="visi" class="@error('visi') border border-danger @enderror">
                    </trix-editor>
                    @error('visi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Misi*</label><br>
                    <input type="hidden" id="misi" name="misi"
                        value="{{ old('misi', $profilsekolah->misi) }}">
                    <trix-editor input="misi" class="@error('misi') border border-danger @enderror">
                    </trix-editor>
                    @error('misi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Tujuan*</label><br>
                    <input type="hidden" id="tujuan" name="tujuan"
                        value="{{ old('tujuan', $profilsekolah->tujuan) }}">
                    <trix-editor input="tujuan" class="@error('tujuan') border border-danger @enderror">
                    </trix-editor>
                    @error('tujuan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card shadow-sm mb-5">
            <div class="card-header">Panel</div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="form-label">foto Mengapa SMK Kharisma</label><br>
                    @if (Storage::exists($profilsekolah->fotoMengapaSmkkharisma))
                        <img src="{{ asset('storage/' . $profilsekolah->fotoMengapaSmkkharisma) }}"
                            alt="foto mengapa Smk kharisma" style="width: auto; height: 160px; object-fit: cover;"
                            class="img-thumbnail mb-2"><br>
                    @else
                        <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                            class="img-fluid rounded-start border border-4 mb-2" alt="foto mengapa Smk kharisma"
                            style="width: 70px; height: 100px; object-fit: cover;"><br>
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
                        name="jmlSiswaSiswi" value="{{ old('jmlSiswaSiswi', $profilsekolah->jmlSiswaSiswi) }}">
                    @error('jmlSiswaSiswi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Jumlah Kelas*</label><br>
                    <input type="text" class="form-control @error('jmlRuangKelas') is-invalid @enderror"
                        name="jmlRuangKelas" value="{{ old('jmlRuangKelas', $profilsekolah->jmlRuangKelas) }}">
                    @error('jmlRuangKelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card shadow-sm mb-5">
            <div class="card-header">Kontak Kita</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <div class="mb-4">
                            <label class="form-label">Email*</label><br>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email', $profilsekolah->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Alamat*</label><br>
                            <input type="hidden" id="alamat" name="alamat"
                                value="{{ old('alamat', $profilsekolah->alamat) }}">
                            <trix-editor input="alamat" class="@error('alamat') border border-danger @enderror">
                            </trix-editor>
                            @error('alamat')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="mb-4">
                            <label class="form-label">Telepon*</label><br>
                            <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                                name="telepon" value="{{ old('telepon', $profilsekolah->telepon) }}">
                            @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Peta*</label><br>
                            <textarea class="form-control @error('peta') is-invalid @enderror" rows="3" name="peta">{{ $profilsekolah->peta }}</textarea>
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
