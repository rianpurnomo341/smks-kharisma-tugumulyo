@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/ts') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="mb-3">
                <h3>{{ $ts->judulTs }}</h3>
                <small class="fs-6 opacity-75">{{ $ts->updated_at->format('d M Y - H:i:s T') }}</small>
            </div>
            @if (Storage::exists($ts->fotoTs))
                File:<br>
                <a href="{{ asset('storage/' . $ts->fotoTs) }}" download><i class="text-decoration">Download disini!</i></a><br>
            @else
                <i class="text-danger">File Tidak Tersedia!</i><br>
            @endif
            <p class="pt-3">{!! $ts->deskripsiTs !!}</p>
        </div>
    </div>
@endsection
