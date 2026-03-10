@extends('layout.main')

@section('content')
    <div class="container my-5">
        <div class="py-5">
            <div class="my-4 opacity-75 text-success" data-aos="fade-down">
                Home <i class="bi bi-chevron-right pe-1" style="font-size: 12px"></i> BKK <i
                    class="bi bi-chevron-right pe-1" style="font-size: 12px"></i> {{ $title }}
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="pb-5" data-aos="fade-right">
                        <div class="mb-3">
                            <h3>{{ $bkk->judulBkk }}</h3>
                            <small class="fs-6 opacity-75">{{ $bkk->updated_at->format('d M Y') }}</small>
                        </div>
                        @if (Storage::exists($bkk->fotoBkk))
                            File:<br>
                            <a href="{{ asset('storage/' . $bkk->fotoBkk) }}" download><i class="text-decoration">Download disini!</i></a><br>
                        @endif
                        <p>{!! $bkk->deskripsiBkk !!}</p>
                    </div>
                </div>
                <div class="col-md-1 mb-5"></div>
                <div class="col-md-3" data-aos="fade-left">
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
