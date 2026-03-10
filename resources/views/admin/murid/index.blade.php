@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $kategoriPengumuman->judulKategoriPengumuman }}</h4>
        <div>
            <a href="{{ url('/admin/kategori-pengumuman/') }}" class="btn btn-danger btn-icon-split mb-md-0 mb-2">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
            <a href="{{ url('/admin/kategori-pengumuman/murid/create/'. Crypt::encryptString($kategoriPengumuman->idKategoriPengumuman)) }}" class="btn btn-primary btn-icon-split">
                <span class="text">Tambah Item</span>
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                @if (count($murid))
                    <table class="table table-hover table-bordered dataTable">
                        <thead class="bg-light text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Murid</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($murid as $item)
                                <tr>
                                    <th class="text-center aksi-button" scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->namaMurid }}</td>
                                    <td class="aksi-button text-center">
                                        <a href="{{ url('/admin/kategori-pengumuman/murid/show/' . Crypt::encryptString($item->idMurid)) }}"
                                            class="btn btn-info btn-icon-split mt-1">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                        </a>
                                        <a href="{{ url('/admin/kategori-pengumuman/murid/edit/' . Crypt::encryptString($item->idMurid)) }}"
                                            class="btn btn-success btn-icon-split mt-1">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <form id="myForm" class="d-inline"
                                            action="{{ url('/admin/kategori-pengumuman/murid/destroy/' . Crypt::encryptString($item->idMurid)) }}"
                                            method="POST">
                                            @csrf
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
