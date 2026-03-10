@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/berita/create') }}" class="btn btn-primary btn-icon-split">
            <span class="text">Tambah Item</span>
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                @if (count($berita))
                    <table class="table table-hover table-bordered dataTable">
                        <thead class="bg-light text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Dibuat</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Dilihat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berita as $item)
                                <tr>
                                    <th class="text-center aksi-button" scope="row">{{ $no++ }}</th>
                                    <td class="text-center aksi-button">
                                        {{ $item->created_at->format('d M Y') }}
                                    </td>
                                    <td>{{ $item->judulBerita }}</td>
                                    <td class="text-center">
                                        @if (!$item->dilihat)
                                            0
                                        @else
                                            {{ $item->dilihat }}
                                        @endif
                                    </td>
                                    <td class="aksi-button text-center">
                                        <a href="{{ url('/admin/berita/' . Crypt::encryptString($item->idBerita)) }}"
                                            class="btn btn-info btn-icon-split mt-1">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                        </a>
                                        <a href="{{ url('admin/berita/' . Crypt::encryptString($item->idBerita) . '/edit') }}"
                                            class="btn btn-success btn-icon-split mt-1">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <form id="myForm" class="d-inline"
                                            action="{{ url('/admin/berita/' . Crypt::encryptString($item->idBerita)) }}"
                                            method="POST">
                                            @method('DELETE')
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
