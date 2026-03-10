@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/berita') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="mb-3">
                <h3>{{ $berita->judulBerita }}</h3>
                <small class="fs-6 opacity-75">{{ $berita->created_at->format('d M Y - H:i:s T') }}</small>
            </div>
            @if (Storage::exists($berita->fotoBerita))
                <img src="{{ asset('storage/' . $berita->fotoBerita) }}" class="img-fluid rounded-start border border-4"
                    alt="foto berita" style="object-fit: cover;" class="img-fluid">
            @else
                <img src="{{ asset('media-sistem/img-deafult.jpg') }}" class="img-fluid rounded-start border border-4"
                    alt="foto berita" style="object-fit: cover;" class="img-fluid">
            @endif
            <p class="pt-3">{!! $berita->deskripsiBerita !!}</p>
            <p class="fw-bold">Dilihat: 
                @if (!$berita->dilihat)
                    0
                @else
                    {{ $berita->dilihat }}
                @endif
            </p>
        </div>
    </div>
@endsection
