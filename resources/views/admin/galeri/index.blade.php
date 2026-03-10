@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/galeri/create') }}" class="btn btn-primary btn-icon-split">
            <span class="text">Tambah Item</span>
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                @if (count($galeri))
                    <table class="table table-hover table-bordered dataTable">
                        <thead class="bg-light text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Title</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galeri as $item)
                                <tr>
                                    <th class="text-center aksi-button" scope="row">{{ $no++ }}</th>
                                    <td class="text-center aksi-button">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="text-center aksi-button">{{ $item->titleGaleri }}</td>
                                    <td class="text-center">
                                        @if (Storage::exists($item->namaGaleri))
                                        <div class="d-flex justify-content-center">
                                            <img src="{{ asset('storage/' . $item->namaGaleri) }}"
                                            class="img-fluid rounded-start border border-4" alt="foto galeri"
                                            style="height: 125px; object-fit: cover;">
                                        </div>
                                        @else
                                            <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                                                class="img-fluid rounded-start border border-4" alt="foto galeri"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                        @endif
                                    </td>
                                    <td class="aksi-button">
                                        <a href="{{ url('admin/galeri/' . Crypt::encryptString($item->idGaleri) . '/edit') }}"
                                            class="btn btn-success btn-icon-split mt-1">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <form id="myForm" class="d-inline"
                                            action="{{ url('/admin/galeri/' . Crypt::encryptString($item->idGaleri)) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="nameGaleri" value="{{ $item->nameGaleri }}">
                                            <button type="submit" class="btn btn-danger btn-icon-split mt-1"
                                                id="btn_delete">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash-alt"></i>
                                                </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h6 class="text-center">Data {{ $title }} Tidak Ada!</h6>
                @endif
            </div>
        </div>
    </div>
@endsection
