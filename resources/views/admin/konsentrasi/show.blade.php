@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/konsentrasi') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="pb-2">{{ $konsentrasi->namaKonsentrasi }}</h5>
            <div class="pb-2">
                <p>{!! $konsentrasi->deskripsiKonsentrasi !!}</p>
            </div>
            <div class="pb-2">
                <h6 class="border-bottom pb-2 fst-italic fw-normal">Keunggulan {{ $konsentrasi->namaKonsentrasi }}</h6>
                <p>{!! $konsentrasi->keunggulanKonsentrasi !!}</p>
            </div>
            <h6 class="border-bottom pb-2 fst-italic fw-normal">Apa yang dipelajari di {{ $konsentrasi->namaKonsentrasi }}</h6>
            <p>{!! $konsentrasi->dipelajariKonsentrasi !!}</p>
        </div>
    </div>
@endsection
