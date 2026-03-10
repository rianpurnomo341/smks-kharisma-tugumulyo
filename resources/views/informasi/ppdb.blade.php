@extends('layout.main')

@section('content')
    <div class="container my-5">
        <div class="py-5">
            <div class="my-4 opacity-75 text-success" data-aos="fade-down">
                Home <i class="bi bi-chevron-right pe-1" style="font-size: 12px"></i>{{ $title }}
            </div>
            <div class="row">
                <div class="col-md-8">
                    @foreach ($ppdb as $item)
                        <div data-aos="fade-right">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    @if (Storage::exists($item->fotoPpdb))
                                        <img src="{{ asset('storage/' . $item->fotoPpdb) }}" alt="Foto Ppdb"
                                            style="width: 160px; height: 180px; object-fit: cover;" class="img-fluid">
                                    @else
                                        <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                                            class="img-fluid rounded-start border border-4 mb-2" alt="foto Ppdb"
                                            style="width: 160px; height: 180px; object-fit: cover;"><br>
                                    @endif
                                </div>
                                <div class="col-md-9">
                                    <a href="{{ url('/informasi/ppdb/detail-ppdb/' . Crypt::encryptString($item->idPpdb)) }}"
                                        class="lh-1 hov-text text-black text-decoration-none">
                                        <h4>{{ $item->judulPpdb }}</h4>
                                    </a>
                                    <small class="fs-6 opacity-75">
                                        {{ $item->updated_at->format('d M Y') }} | {{ $item->updated_at->diffForHumans() }}
                                    </small>
                                    <div class="berita-des opacity-75 lh-lg fs-6 text-justify">
                                        {!! $item->deskripsiPpdb !!}
                                    </div>
                                    <a href="{{ url('/informasi/ppdb/detail-ppdb/' . Crypt::encryptString($item->idPpdb)) }}">
                                        <small>Read more...</small>
                                    </a>
                                </div>
                            </div>
                            <div class="mb-5 pt-3">
                                <div class="border-bottom"></div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-between my-2 opacity-75 fst-italic">
                        <p>
                            Showing {{ $ppdb->firstItem() }} to {{ $ppdb->lastItem() }} of {{ $ppdb->total() }}
                            entries
                        </p>
                        {{ $ppdb->links() }}
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
