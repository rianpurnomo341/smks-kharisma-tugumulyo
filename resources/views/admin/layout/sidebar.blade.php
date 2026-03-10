<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('media-sistem/logoSMK.png') }}" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;" alt="img logo">
        </div>
        <div class="sidebar-brand-text" style="font-size: 14px;">smk kharisma tugumulyo</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
            <i class="fas fa-th-large"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item
    @php
        if( Request::is('admin/sejarah*') || Request::is('admin/visi-misi-tujuan*') || Request::is('admin/struktur-sekolah*') || Request::is('admin/guru-staff*') || Request::is('admin/sambutan-pimpinan*') ||  Request::is('admin/panel*') || Request::is('admin/kontak-kita*')) {
            echo "active";
        }
    @endphp
    ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#profilSekolah"
            aria-expanded="true" aria-controls="profilSekolah">
            <i class="fa fa-solid fa-building"></i>
            <span>Profil Sekolah</span>
        </a>
        <div id="profilSekolah" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/sejarah*') ? 'active' : '' }}" href="{{ url('admin/sejarah') }}">Sejarah</a>
                <a class="collapse-item {{ Request::is('admin/visi-misi-tujuan*') ? 'active' : '' }}" href="{{ url('admin/visi-misi-tujuan') }}">Visi, Misi dan Tujuan</a>
                <a class="collapse-item {{ Request::is('admin/struktur-sekolah*') ? 'active' : '' }}" href="{{ url('admin/struktur-sekolah') }}">Struktur Sekolah</a>
                <a class="collapse-item {{ Request::is('admin/guru-staff*') ? 'active' : '' }}" href="{{ url('admin/guru-staff') }}">Guru dan Staff</a>
                <a class="collapse-item {{ Request::is('admin/sambutan-pimpinan*') ? 'active' : '' }}" href="{{ url('admin/sambutan-pimpinan') }}">Sambutan Pimpinan</a>
                <a class="collapse-item {{ Request::is('admin/panel*') ? 'active' : '' }}" href="{{ url('admin/panel') }}">Panel</a>
                <a class="collapse-item {{ Request::is('admin/kontak-kita*') ? 'active' : '' }}" href="{{ url('admin/kontak-kita') }}">Kontak Kita</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Request::is('admin/sarana-prasarana*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/sarana-prasarana') }}">
            <i class="bi bi-calendar2-event"></i>
            <span>Sarana dan Prasarana</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('admin/ekstrakurikuler*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/ekstrakurikuler') }}">
             <i class="bi bi-calendar-minus"></i>
            <span>Ekstrakurikuler</span>
        </a>
    </li>

    <li class="nav-item
    @php
        if( Request::is('admin/berita*') || Request::is('admin/info*') || Request::is('admin/ppdb*') || Request::is('admin/kategori-pengumuman') ) {
            echo "active";
        }
    @endphp
    ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#informasi"
            aria-expanded="true" aria-controls="informasi">
            <i class="bi bi-newspaper"></i>
            <span>Informasi</span>
        </a>
        <div id="informasi" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/berita*') ? 'active' : '' }}" href="{{ url('admin/berita') }}">Berita</a>
                <a class="collapse-item {{ Request::is('admin/kategori-pengumuman*') ? 'active' : '' }}" href="{{ url('admin/kategori-pengumuman') }}">Pengumuman</a>
                <a class="collapse-item {{ Request::is('admin/info*') ? 'active' : '' }}" href="{{ url('admin/info') }}">Info</a>
                <a class="collapse-item {{ Request::is('admin/ppdb*') ? 'active' : '' }}" href="{{ url('admin/ppdb') }}">PPDB</a>
            </div>
        </div>
    </li>
    
    <li class="nav-item
    @php
        if( Request::is('admin/bkk*') || Request::is('admin/up*') || Request::is('admin/ukk*') || Request::is('admin/ts*') ) {
            echo "active";
        }
    @endphp
    ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#program"
            aria-expanded="true" aria-controls="program">
            <i class="bi bi-folder2"></i>
            <span>Program</span>
        </a>
        <div id="program" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/bkk*') ? 'active' : '' }}" href="{{ url('admin/bkk') }}">Bursa Kerja Khusus (BKK)</a>
                <a class="collapse-item {{ Request::is('admin/up*') ? 'active' : '' }}" href="{{ url('admin/up') }}">Unit Produksi (UP)</a>
                <a class="collapse-item {{ Request::is('admin/ukk*') ? 'active' : '' }}" href="{{ url('admin/ukk') }}">Uji Kop Keahlian (UKK)</a>
                <a class="collapse-item {{ Request::is('admin/ts*') ? 'active' : '' }}" href="{{ url('admin/ts') }}">Tracer Study</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Request::is('admin/konsentrasi') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/konsentrasi') }}">
            <i class="bi bi-inboxes-fill"></i>
            <span>Konsentrasi</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Addons
    </div>

    <li class="nav-item {{ Request::is('admin/mengapa-smk-kharisma*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/mengapa-smk-kharisma') }}">
            <i class="fas fa-solid fa-list"></i>
            <span>Mengapa SMK Kharima</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('admin/galeri') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/galeri') }}">
            <i class="fa fa-solid fa-images"></i>
            <span>Galeri</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('admin/kotak-saran') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/kotak-saran') }}">
            <i class="fas fa-solid fa-address-card"></i>
            <span>Kotak Saran</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>