<footer class="text-white" style="background-color: rgb(42, 83, 34)">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md py-3">
                <li class="media mb-3 d-md-flex flex-lg-row flex-md-column">
                    <img src="{{ asset('media-sistem/logoSMK.png') }}" alt="Logo" width="70"
                        class="d-inline-block align-text-top">
                    <div class="media-body fs-4 fw-bold ms-lg-3 mt-lg-0 ms-md-0 mt-md-2 ms-3">
                        SMK KHARISMA<br>
                        TUGUMULYO<br>
                    </div>
                </li>
                <p class="fs-6">
                    SMKS Kharisma Tugumulyo adalah salah satu satuan pendidikan dengan jenjang SMK di Mataram, Kecamatan
                    Tugumulyo, Kabupaten Musi rawas, Sumatera Selatan. Dalam menjalankan kegiatannya, SMKS Kharisma
                    Tugumulyo berada di bawah naungan Kementrian Pendidikan dan Kebudayaan.
                </p>
            </div>
            <div class="col-md py-3">
                <h6 class="text-uppercase mb-4">Berita</h6>
                @foreach ($footerberduaberita as $item)
                    <li class="media mb-3">
                        @if (Storage::exists($item->fotoBerita))
                            <img src="{{ asset('storage/' . $item->fotoBerita) }}" alt="Foto Berita"
                                style="width: 50px; height: 70px; object-fit: cover;" class="img-fluid mt-2">
                        @else
                            <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                                class="img-fluid rounded-start border border-4 mt-2" alt="foto Berita"
                                style="width: 50px; height: 70px; object-fit: cover;"><br>
                        @endif
                        <div class="media-body fs-6 ms-3">
                            <small class="opacity-75">
                                {{ $item->updated_at->diffForHumans() }}
                            </small> <br>
                            <a class="text-warning"
                                href="{{ url('/informasi/berita/detail-berita/' . Crypt::encryptString($item->idBerita)) }}">{{ $item->judulBerita }}
                            </a><br>
                        </div>
                    </li>
                @endforeach
            </div>
            <div class="col-md py-3">
                <h6 class="text-uppercase mb-4">link</h6>
                <small class="fs-6">
                    <a href="{{ url('/profil/sejarah') }}" class="lh-1 text-white">
                        Sejarah
                    </a><br>
                    <a href="{{ url('/profil/visi-misi-tujuan') }}" class="lh-1 text-white">
                        Visi, Misi, Tujuan
                    </a><br>
                    <a href="{{ url('/profil/struktur-sekolah') }}" class="lh-1 text-white">
                        Struktur Sekolah
                    </a><br>
                    <a href="{{ url('/profil/guru-staff') }}" class="lh-1 text-white">
                        Guru dan Staff
                    </a><br>
                    <a href="{{ url('/#smk-kharisma') }}" class="lh-1 text-white">
                        Mengapa SMK Kharisma?
                    </a><br>
                    <a href="{{ url('/#sarana-prasarana') }}" class="lh-1 text-white">
                        Sarana dan Prasarana
                    </a><br>
                    <a href="{{ url('/#ekstrakurikuler') }}" class="lh-1 text-white">
                        Ekstrakurikuler
                    </a><br>
                    <a href="{{ url('/#sambutan-pimpinan') }}" class="lh-1 text-white">
                        Sambutan Pimpinan
                    </a>
                </small>
            </div>
        </div>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        Copyright <i class="bi bi-c-circle"></i> 2022 SMK Kharisma Tugumulyo. All Rights Reserved
    </div>
</footer>
