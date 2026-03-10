@extends('layout.main')

@section('content')
    <div class="container my-5">
        <div class="py-5">
            <div class="my-4 opacity-75 text-success" data-aos="fade-down">
                Home <i class="bi bi-chevron-right pe-1" style="font-size: 12px"></i>{{ $title }}
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="pb-5" data-aos="fade-up">
                        <div class="border">
                            <div class="text-center px-5 py-3">
                                {!! $kategoriPengumuman->deskripsiKategoriPengumuman !!}
                                <hr>
                                <form action="{{ url('/pengumuman/' . $kategoriPengumuman->judulKategoriPengumuman) }}" method="POST" autocomplete="off">
                                    @csrf
                                    <input type="hidden" name="request" value="cek_data">
                                    <input type="text" class="mt-4 form-control @error('tokenMurid') is-invalid @enderror" name="tokenMurid" value="{{ old('tokenMurid') }}">
                                    @error('tokenMurid')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="btn btn-success col mt-4">
                                        Cari Data
                                    </button>
                                </form>
                            </div>
                            @if ($message_show)
                                <div class="px-5 py-3">
                                    <h4 class="mb-3 text-center">{{ $message }}</h4>
                                    <hr>
                                
                                    @if($murid)
                                    <div class="mb-3">
                                        <h6 class="fst-italic fw-bold"><span class="border-bottom">Nama:</span></h6> 
                                        {{ $murid->namaMurid }}
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="fst-italic fw-bold"><span class="border-bottom">Keterangan:</span></h6> 
                                        {!! $murid->keteranganMurid !!}
                                    </div>
                                    <div class="mb-3">
                                        @if (Storage::exists($murid->fileMurid))
                                            @if (pathinfo($murid->fileMurid, PATHINFO_EXTENSION) == 'png' || pathinfo($murid->fileMurid, PATHINFO_EXTENSION) == 'jpg' || pathinfo($murid->fileMurid, PATHINFO_EXTENSION) == 'jpeg')
                                                <div class="py-3 fst-italic">
                                                    <h6 class="fst-italic fw-bold"><span class="border-bottom">Download:</span></h6>
                                                    <a href="{{ asset('storage/' . $murid->fileMurid) }}" download>Download File Disini</a>
                                                </div>
                                                <div class="text-center">
                                                    <img src="{{ asset('storage/' . $murid->fileMurid) }}" class="img-fluid rounded-start border border-4 mb-2" alt="file keterangan"><br>
                                                </div>
                                            @endif
                                            @if(pathinfo($murid->fileMurid, PATHINFO_EXTENSION) == 'pdf')
                                                <div class="py-2 fst-italic">
                                                    <h6 class="fst-italic fw-bold"><span class="border-bottom">Download:</span></h6>
                                                    <a href="{{ asset('storage/' . $murid->fileMurid) }}" download>Download File Disini</a>
                                                </div>
                                                <div class="text-center">
                                                    <div class="ratio ratio-16x9">
                                                        <iframe src="{{ asset('storage/' . $murid->fileMurid) }}" title="File Keterangan" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-1 mb-5"></div>
                <div class="col-md-3 mb-5" data-aos="fade-left">
                    <h5>Link Terkait</h5>
                    <div class="border-bottom col-6 mb-2"></div>
                    <a href="{{ url('/profil/visi-misi-tujuan') }}" class="lh-1 text-black">
                        Visi, Misi, Tujuan
                    </a><br>
                    <a href="{{ url('/profil/struktur-sekolah') }}" class="lh-1 text-black">
                        Struktur Sekolah
                    </a><br>
                    <a href="{{ url('/profil/guru-staff') }}" class="lh-1 text-black">
                        Guru dan Staff
                    </a><br>
                    <a href="{{ url('/#smk-kharisma') }}" class="lh-1 text-black">
                        Mengapa SMK Kharisma?
                    </a><br>
                    <a href="{{ url('/#sarana-prasarana') }}" class="lh-1 text-black">
                        Sarana dan Prasarana
                    </a><br>
                    <a href="{{ url('/#ekstrakurikuler') }}" class="lh-1 text-black">
                        Ekstrakurikuler
                    </a><br>
                    <a href="{{ url('/#sambutan-pimpinan') }}" class="lh-1 text-black">
                        Sambutan Pimpinan
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
