@extends('layout.main')

@section('content')
    <div class="container my-5">
        <div class="py-5">
            <div class="my-4 opacity-75 text-success" data-aos="fade-down">
                Home <i class="bi bi-chevron-right pe-1" style="font-size: 12px"></i>{{ $title }}
            </div>
            <div class="pb-5" data-aos="fade-right">
                @if (Storage::exists($fotosejarah))
                    <img src="{{ asset('storage/' . $fotosejarah) }}" alt="foto sejarah"
                        style="height: 390px; width: auto object-fit: cover;" class="img-fluid">
                @else
                    <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                        class="img-fluid rounded-start border border-4 mb-2" alt="foto sejarah"
                        style="width: 70px; height: 100px; object-fit: cover;"><br>
                @endif
                <p class="pt-3">{!! $deskripsisejarah !!}</p>
            </div>
        </div>
    </div>
@endsection
