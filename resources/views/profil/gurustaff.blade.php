@extends('layout.main')

@section('content')
    <div class="container my-5">
        <div class="py-5">
            <div class="my-4 opacity-75 text-success" data-aos="fade-down">
                Home <i class="bi bi-chevron-right pe-1" style="font-size: 12px"></i>{{ $title }}
            </div>
            <div class="pb-5">
                <div class="row">
                    @foreach ($gurustaff as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card text-bg-dark" data-aos="flip-right">
                                @if (Storage::exists($item->fotoGuruStaff))
                                    <img src="{{ asset('storage/' . $item->fotoGuruStaff) }}" class="card-img img-fluid"
                                        alt="foto guru staff" style="width: auto; height: 352px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('media-sistem/img-deafult-gurustaff.jpg') }}"
                                        class="img-fluid rounded-start border border-4" alt="foto guru staff"
                                        style="width: auto; height: 352px; object-fit: cover;">
                                @endif
                                <div class="card-img-overlay text-center">
                                    <div class="bg-light py-3" style="margin-top: 240px">
                                        <small class="card-title fw-bold">{{ $item->namaGuruStaff }}</small><br>
                                        <small class="card-text fst-italic">{{ $item->jabatanGuruStaff }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
