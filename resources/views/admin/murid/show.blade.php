@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/kategori-pengumuman/murid/index/'. Crypt::encryptString($murid->idKategoriPengumuman)) }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">Form {{ $title }}</div>
        <div class="card-body">
            <form action="{{ url('/admin/kategori-pengumuman/murid/update/' . Crypt::encryptString($murid->idMurid)) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    @if (Storage::exists($murid->fileMurid))
                        @if (pathinfo($murid->fileMurid, PATHINFO_EXTENSION) == 'png' || pathinfo($murid->fileMurid, PATHINFO_EXTENSION) == 'jpg' || pathinfo($murid->fileMurid, PATHINFO_EXTENSION) == 'jpeg')
                            <div class="text-center">
                                    <img src="{{ asset('storage/' . $murid->fileMurid) }}" class="img-fluid rounded-start border border-4 mb-2" alt="file keterangan"><br>
                            </div>
                            <div class="pt-3 fst-italic">
                                <h6 class="fst-italic fw-bold"><span class="border-bottom">Download:</span></h6>
                                <a href="{{ asset('storage/' . $murid->fileMurid) }}" download>Download File Disini</a>
                            </div>
                        @endif
                        @if(pathinfo($murid->fileMurid, PATHINFO_EXTENSION) == 'pdf')
                            <div class="text-center">
                                <div class="ratio ratio-16x9">
                                    <iframe src="{{ asset('storage/' . $murid->fileMurid) }}" title="File Keterangan" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="pt-2 fst-italic">
                                <h6 class="fst-italic fw-bold"><span class="border-bottom">Download:</span></h6>
                                <a href="{{ asset('storage/' . $murid->fileMurid) }}" download>Download File Disini</a>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="mb-2">
                    <h6 class="fst-italic fw-bold"><span class="border-bottom">Token:</span></h6>
                    <p>{{  $murid->tokenMurid  }}</p>
                </div>
                <div class="mb-2">
                    <h6 class="fst-italic fw-bold"><span class="border-bottom">Nama:</span></h6>
                    <p>{{  $murid->namaMurid  }}</p>
                </div>
                <div class="mb-2">
                    <h6 class="fst-italic fw-bold"><span class="border-bottom">Deskripsi:</span></h6>
                    <p>{!! $murid->keteranganMurid !!}</p>
                </div>
            </form>
        </div>
    </div>
@endsection
