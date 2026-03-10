@extends('layout.main')

@section('content')
    {{-- jumbotron --}}
    <div class="jumbotron text-white" id="home">
        <div class="container text-sh">
            <div class="header-area">
                <p class="fs-1 fw-bold nav-item"><span class="runText"></span></p>
            </div>
            <p class="fs-5 nav-item">SMK Kharisma Tugumulyo adalah Sekolah Menengah Kejuruan (Vokasional) pertama di Kabupaten Musi Rawas (Tahun 1996), berlokasi di Jalan Utama Tugumulyo, kondusif, memiliki andil dalam penyediaan tenaga kerja tingkat menengah (mekanik dan operator), lantas kenapa harus pilih sekolah kejuruan lain.</p>
            <p>
                <a class="btn btn-success shadow-sm" href="#berita" role="button">
                    Lebih Lanjut
                    <i class="fas fa-arrow-right px-1"></i>
                </a>
            </p>
        </div>
        <div id="smk-kharisma"></div>
    </div>

    {{-- Panel --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 panel">
                <div class="row py-1 row justify-content-center">
                    <div class="col-md py-2 mx-4 bg-white shadow rounded-3" data-aos="fade-down">
                        <img src="{{ asset('media-sistem/murid.png') }}" alt="Logo Panel 1" width="80px"
                            class="float-left px-1">
                        <h5 class="pt-3 fw-bold fs-6 text-uppercase">
                            Siswa / Siswi
                        </h5>
                        <p>{{ $jmlsiswasiswi }}</p>
                    </div>
                    <div class="col-md py-2 mx-4 bg-white shadow rounded-3" data-aos="fade-down">
                        <img src="{{ asset('media-sistem/kelas.png') }}" alt="Logo Panel 2" width="80px"
                            class="float-left px-1">
                        <h5 class="pt-3 fw-bold fs-6 text-uppercase">
                            Ruang Kelas
                        </h5>
                        <p>{{ $jmlruangkelas }}</p>
                    </div>
                    <div class="col-md py-2 mx-4 bg-white shadow rounded-3" data-aos="fade-down">
                        <img src="{{ asset('media-sistem/gurustaff.png') }}" alt="Logo Panel 3" width="80px"
                            class="float-left px-1">
                        <h5 class="pt-3 fw-bold fs-6 text-uppercase">
                            Guru / Staff
                        </h5>
                        <p>{{ $jmlgurustaff }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Mengapa SMK Kharisma --}}
    <section class="py-2">
        <div class="container mt-md-5">
            <div class="row">
                <div class="col-md my-4" data-aos="fade-right">
                    @if (Storage::exists($fotomengapasmkkharisma))
                        <img src="{{ asset('storage/' . $fotomengapasmkkharisma) }}" style="object-fit: cover; width: 520px"
                            alt="foto mengapa smk kharisma" class="img-fluid">
                    @else
                        <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                            class="img-fluid rounded-start border border-4 mb-2" alt="foto mengapa smk kharisma"
                            style="width: 70px; height: 100px; object-fit: cover;"><br>
                    @endif
                </div>
                <div class="col-md pt-md-5" data-aos="fade-up">
                    <h3 class="mb-4"> 
                    <div data-aos="fade-up">Mengapa Sekolah di SMK Kharisma?</div></h2>
                        <ul class="list-unstyled">
                            @foreach ($mengapasmkkharisma as $item)
                                <li class="media my-3">
                                    <img src="{{ asset('media-sistem/check.png') }}" class="mr-3" alt="..."
                                        width="37px">
                                    <div class="media-body">
                                        {{ $item->deskripsiMengapaSmkkharisma }}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- berita terbaru --}}
    <section id="berita" class="cs-section py-5 bg-section-genap">
        <div class="container pt-5 text-center">
            <div data-aos="fade-down">
                <h3 class="fw-bold text-center">Berita Terbaru</h3>
                <div class="row justify-content-center pb-5">
                    <div class="card me-1 bg-success" style="width: 3rem;"></div>
                    <div class="card me-1 bg-success" style="width: 3rem;"></div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($enamberita as $item)
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="flip-left">
                        <div class="card-body">
                            <a href="{{ url('/informasi/berita/detail-berita/' . Crypt::encryptString($item->idBerita)) }}" class="text-decoration-none text-black">
                                <div class="border shadow">
                                    @if (Storage::exists($item->fotoBerita))
                                        <img src="{{ asset('storage/' . $item->fotoBerita) }}" class="card-img-top img-fluid"
                                            alt="foto berita" style="width: 330px; height: 200px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                                            class="img-fluid rounded-start border border-4 mb-2" alt="foto berita"
                                            style="width: 330px; height: 200px;"><br>
                                    @endif
                                    <p class="card-text" style="margin-top: -30px;">
                                        <div class="row">
                                            <div class="col text-start ms-2">
                                                <span class="rounded-pill bg-light border border-success py-2 px-3">
                                                    <i class="bi bi-eye">
                                                        @if (!$item->dilihat)
                                                            0
                                                        @else
                                                            {{ $item->dilihat }}
                                                        @endif
                                                    </i>
                                                </span>
                                            </div>
                                            <div class="col text-end">
                                                <span class="fst-italic rounded-pill bg-light border border-success py-2 px-3 bg-light me-2">
                                                    {{ $item->created_at->format('d M Y') }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            {!! $item->judulBerita !!}
                                        </div>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{ url('/informasi/berita') }}">
                <h6>Lihat Berita Lainnya <i class="bi bi-arrow-right"></i></h6>
            </a>
        </div>
    </section>

    {{-- sarana dan prasarana --}}
    <section id="sarana-prasarana" class="cs-section py-5">
        <div class="container pt-5 text-center" data-aos="zoom-in">
            <h3 class="fw-bold">Sarana dan Prasarana</h3>
            <div class="row justify-content-center pb-5">
                <div class="card me-1 bg-success" style="width: 3rem;"></div>
                <div class="card me-1 bg-success" style="width: 3rem;"></div>
            </div>
            <p class="mb-3">
                SMK Kharisma menyediakan sarana dan prasarana sesuai dengan kebutuhan, pengelolaan sarana dan prasarana bertujuan untuk memberikan layanan secara profesional dibidang sarana dan prasarana pendidikan agar terselenggaranya proses pendidikan secara efektif dan efisien dan memperlancar dan mempermudah proses belajar mengajar.
            </p>
            <div class="slide owl-carousel">
                @foreach ($saranaprasarana as $item)
                    <div class="align-middle p-2">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <div class="row justify-content-center my-4">
                                    @if (Storage::exists($item->fotoSaranaPrasarana))
                                        <img src="{{ asset('storage/' . $item->fotoSaranaPrasarana) }}"
                                            alt="foto sarana prasarana" style="width: 120px;">
                                    @else
                                        <img src="{{ asset('media-sistem/img-deafult-gurustaff.jpg') }}"
                                            class="img-fluid rounded-start border border-4 mb-2"
                                            alt="foto sarana prasarana"
                                            style="width: 70px; height: 100px; object-fit: cover;"><br>
                                    @endif
                                </div>
                                <h5 class="card-text opacity-75">
                                    {{ $item->namaSaranaPrasarana }}
                                </h5>
                                <hr class="mx-5 bg-success">
                                <p class="opacity-75">{{ $item->deskripsiSaranaPrasarana }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ekstrakurikuler --}}
    <section id="ekstrakurikuler" class="cs-section py-5 bg-section-genap">
        <div class="container pt-5 text-center">
            <div data-aos="fade-down">
                <h3 class="fw-bold">Ekstrakurikuler</h3>
                <div class="row justify-content-center pb-5">
                    <div class="card me-1 bg-success" style="width: 3rem;"></div>
                    <div class="card me-1 bg-success" style="width: 3rem;"></div>
                </div>
            </div>
            <p class="mb-4" data-aos="fade-down">
                SMK Kharisma mengadakan kegiatan tambahan yang dilakukan di luar jam pelajaran yang dilakukan baik di sekolah atau di luar sekolah dengan tujuan untuk mendapatkan tambahan pengetahuan, keterampilan dan wawasan serta membentuk karakter peserta didik sesuai dengan minat dan bakat masing. Kegiatan ekstrakurikuler sebagai wadah pengembangan potensi peserta didik yang dapat memberikan dampak positif dalam non-pelajaran formal.
            </p>
            <div class="row justify-content-center">
                @foreach ($ekstrakurikuler as $item)
                    <div class="col-xl-3 col-md-4 mb-3" data-aos="flip-left">
                        <div class="card bg-success shadow-sm h-100">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto ps-1">
                                    <img src="{{ asset('storage/' . $item->fotoEkstrakurikuler) }}"
                                        alt="gambar icon pramuka" width="110px">
                                </div>
                                <div class="col text-start">
                                    <div class="text-xs font-weight-bold text-uppercase text-white">
                                        {{ $item->namaEkstrakurikuler }}<br>
                                        <span class="text-capitalize small fst-italic">
                                            {{ $item->kepanjanganEkstrakurikuler }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- sambutan pimpinan --}}
    <section id="sambutan-pimpinan" class="cs-section py-5">
        <div class="container pt-5 text-center">
            <div data-aos="fade-down">
                <h3 class="fw-bold">Sambutan Pimpinan</h3>
                <div class="row justify-content-center pb-5">
                    <div class="card me-1 bg-success" style="width: 3rem;"></div>
                    <div class="card me-1 bg-success" style="width: 3rem;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md mb-2" data-aos="fade-right">
                    <div class="ratio ratio-16x9">
                        <video controls class="img-thumbnail mb-2">
                            <source src="{{ asset('storage/' . $videosambutanpimpinan) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                <div class="col-md mb-2" data-aos="fade-up">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-quote" style="color: khaki; font-size: 30px;"></i>
                            <p class="fs-6 opacity-75">
                                <i>{!! $deskripsisambutanpimpinan !!}</i>
                            </p>
                            <hr class="mx-5 bg-success">
                            <h5 class="card-text opacity-75">
                                {{ $namasambutanpimpinan }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-bottom: 120px"></div>
    </section>
@endsection
