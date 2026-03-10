@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/ppdb') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="mb-3">
                <h3>{{ $ppdb->judulPpdb }}</h3>
                <small class="fs-6 opacity-75">{{ $ppdb->updated_at->format('d M Y - H:i:s T') }}</small>
            </div>
            @if (Storage::exists($ppdb->fotoPpdb))
                <img src="{{ asset('storage/' . $ppdb->fotoPpdb) }}" alt="foto ppdb"
                    style="object-fit: cover;" class="img-fluid">
            @else
                <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                    class="img-fluid rounded-start border border-4 mb-2" alt="foto ppdb"
                    style="width: 160px; height: 180px; object-fit: cover;"><br>
            @endif
            <br><br>
            @if (Storage::exists($ppdb->filePpdb))
                File:<br>
                <a href="{{ asset('storage/' . $ppdb->filePpdb) }}" download><i class="text-decoration">Download disini!</i></a><br>
            @endif
            <p class="pt-3">{!! $ppdb->deskripsiPpdb !!}</p>
        </div>
    </div>
@endsection
