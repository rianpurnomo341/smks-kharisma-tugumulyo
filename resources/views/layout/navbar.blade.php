<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-success shadow" data-aos="nav-animation" id="nav-hide">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand nav-item fw-bold">
            <img src="{{ asset('media-sistem/logoSMK.png') }}" alt="Logo" width="30"
                class="d-inline-block align-text-top mx-1">
            SMK Kharisma
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto" id="scrol-active">
                <li class="nav-item px-2 {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link text-white" href="{{ url('/') }}">Home</a>
                </li>
                <li class="px-2 dropdown {{ Request::is('profil*') ? 'active' : '' }}">
                    <a class="nav-item nav-link text-white dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <small><a class="dropdown-item" href="{{ url('/profil/sejarah') }}">Sejarah</a></small>
                        </li>
                        <li>
                            <small><a class="dropdown-item" href="{{ url('/profil/visi-misi-tujuan') }}">Visi, Misi dan Tujuan</a></small>
                        </li>
                        <li>
                            <small><a class="dropdown-item" href="{{ url('/profil/struktur-sekolah') }}">Struktur Sekolah</a></small>
                        </li>
                        <li>
                            <small><a class="dropdown-item" href="{{ url('/profil/guru-staff') }}">Guru dan Staff</a></small>
                        </li>
                    </ul>
                </li>
                <li class="px-2 dropdown {{ Request::is('informasi*') ? 'active' : '' }}">
                    <a class="nav-item nav-link text-white dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <small><a class="dropdown-item" href="{{ url('/informasi/berita') }}">Berita</a></small>
                        </li>
                        <li>
                            <small><a class="dropdown-item" href="{{ url('/program/bkk/detail-bkk/' . Crypt::encryptString($bkkNavbar->idBkk)) }}">BKK News</a></small>
                        </li>
                        <li>
                            <small><a class="dropdown-item" href="{{ url('/kategori-pengumuman') }}">Pengumuman</a></small>
                        </li>
                        <li>
                            <small><a class="dropdown-item" href="{{ url('/informasi/info') }}">Info</a></small>
                        </li>
                        <li>
                            <small><a class="dropdown-item" href="{{ url('/informasi/ppdb') }}">PPDB</a></small>
                        </li>
                    </ul>
                </li>
                <li class="px-2 dropdown {{ Request::is('program*') ? 'active' : '' }}">
                    <a class="nav-item nav-link text-white dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Program
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <small><a class="dropdown-item" href="{{ url('/program/bkk') }}">Bursa Kerja Khusus (BKK)</a></small>
                        </li>
                        <li>
                            <small><a class="dropdown-item" href="{{ url('/program/up') }}">Unit Produksi (UP)</a></small>
                        </li>
                        <li>
                            <small><a class="dropdown-item" href="{{ url('/program/ukk') }}">Uji Kopetensi Keahlian (UKK)</a></small>
                        </li>
                        <li>
                            <small><a class="dropdown-item" href="{{ url('/program/ts') }}">Tracer Study</a></small>
                        </li>
                    </ul>
                </li>
                <li class="px-2 dropdown {{ Request::is('konsentrasi') ? 'active' : '' }}">
                    <a class="nav-item nav-link text-white dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Konsentrasi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($konsentrasi as $item)
                            <li>
                                <small><a class="dropdown-item" href="{{ url('/konsentrasi/' . Crypt::encryptString($item->idKonsentrasi)) }}">{{ $item->namaKonsentrasi }}</a></small>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item px-2 {{ Request::is('galeri') ? 'active' : '' }}">
                    <a class="nav-link text-white" href="{{ url('/galeri') }}">Galeri</a>
                </li>
                <li class="nav-item px-2 {{ Request::is('kontak') ? 'active' : '' }}">
                    <a class="nav-link text-white" href="{{ url('/kontak') }}">Kontak Kita</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
