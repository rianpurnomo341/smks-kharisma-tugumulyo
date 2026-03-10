@extends('layout.main')

@section('content')
    <div class="container my-5">
        <div class="py-5">
            <div class="my-4 opacity-75 text-success" data-aos="fade-down">
                Home <i class="bi bi-chevron-right pe-1" style="font-size: 12px"></i>{{ $title }}
            </div>
            <div class="pb-5">
                <div class="row">
                    @foreach ($galeri as $item)
                        <div class="col-lg-4 col-md-6" style="  position: relative; text-align: center; color: white;">
                            @if (Storage::exists($item->namaGaleri))
                            <div data-aos="flip-right">
                                <img src="{{ asset('storage/' . $item->namaGaleri) }}" alt="foto galeri"
                                    style="width: 365px; height: 220px; object-fit: cover;" class="img-fluid p-2 zoom">
                                    @if ($item->titleGaleri)
                                        <div class="bg-white p-2 border" style="color: black; font-style: italic; position: absolute; top: 8px; right: 8px;">{{ $item->titleGaleri }}</div>
                                    @endif
                                    <div style="color: white; font-style: italic; position: absolute; bottom: 8px; left: 16px;">{{ $item->created_at->format('d M Y') }}</div>
                            </div>
                            @else
                                <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                                    class="img-fluid rounded-start border border-4 mb-2" alt="foto galeri"
                                    style="width: 70px; height: 100px; object-fit: cover;"><br>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
