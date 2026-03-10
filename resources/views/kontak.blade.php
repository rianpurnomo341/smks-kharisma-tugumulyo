@extends('layout.main')

@section('content')
    {{-- sweetalert2 --}}
    <link rel="stylesheet" href="{{ asset('asset/sweetalert2/sweetalert2.min.css') }}">

    <div class="container my-5">
        <div class="py-5">
            <div class="my-4 opacity-75 text-success" data-aos="fade-down">
                Home <i class="bi bi-chevron-right pe-1" style="font-size: 12px"></i>{{ $title }}
            </div>
            <div class="pb-5">
                <div class="row">
                    <div class="col-md mb-5" data-aos="fade-right">
                        <h5 class="mb-3">Peta Sekolah</h5>
                        {{-- <div id="map-container-google-3" class="z-depth-1-half map-container-3 img-fluid"> --}}
                        <div class="embed-responsive embed-responsive-16by9">
                            @php
                                echo $peta;
                            @endphp
                        </div>
                    </div>
                    <div class="col-md mb-5" data-aos="fade-up">
                        <h5 class="mb-3">Kontak</h5>
                        <div id="map-container-google-3" class="z-depth-1-half map-container-3">
                            <li class="media mb-3">
                                <h1>
                                    <i class="bi bi-envelope-fill pe-3 pt-1"></i>
                                </h1>
                                <div class="media-body">
                                    Email<br>
                                    {{ $email }}
                                </div>
                            </li>
                            <li class="media mb-3">
                                <h1>
                                    <i class="bi bi-telephone-fill pe-3 pt-1"></i>
                                </h1>
                                <div class="media-body">
                                    Telepon<br>
                                    {{ $telepon }}
                                </div>
                            </li>
                            <li class="media mb-3">
                                <h1>
                                    <i class="bi bi-map-fill pe-3 pt-1"></i>
                                </h1>
                                <div class="media-body">
                                    Alamat<br>
                                    {!! $alamat !!}
                                </div>
                            </li>
                        </div>
                    </div>

                    <div data-aos="fade-right">
                        <h5 class="mb-3">Kotak Saran</h5>
                        <form action="{{ url('kontak') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama*</label>
                                <input type="text" class="form-control" name="namaKontak" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email*</label>
                                <input type="email" class="form-control" name="emailKontak" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telepon*</label>
                                <input type="text" class="form-control" name="teleponKontak" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pesan*</label>
                                <textarea class="form-control" name="pesanKontak" style="height: 100px" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- sweetalert2 --}}
    <script src="{{ asset('asset/sweetalert2/sweetalert2.min.js') }}"></script>

    {{-- notifikasi success store/update/destroy --}}
    @if (session()->get('name'))
        <script>
            setTimeout(function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: {!! session()->get('time') !!},
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: '{!! session()->get('icon') !!}',
                    title: '{!! session()->get('title') !!}'
                })
            }, );
        </script>
    @endif
@endsection
