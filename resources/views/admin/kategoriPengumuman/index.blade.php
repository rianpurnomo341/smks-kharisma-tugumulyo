@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/kategori-pengumuman/create') }}" class="btn btn-primary btn-icon-split">
            <span class="text">Tambah Item</span>
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                @if (count($kategoriPengumuman))
                    <table class="table table-hover table-bordered dataTable">
                        <thead class="bg-light text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori Pengumuman</th>
                                <th scope="col">Show / Hidden</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoriPengumuman as $item)
                                <tr>
                                    <th class="text-center aksi-button" scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->judulKategoriPengumuman }}</td>
                                    <td class="text-center aksi-button">
                                        <a href="{{ url('admin/kategori-pengumuman/show-or-hidden/' . $item->idKategoriPengumuman ) }}">
                                            @if ($item->showorhidden == true)
                                                <i class="bi bi-eye text-primary" style="font-size: 30px"></i>
                                            @else
                                                <i class="bi bi-eye-slash text-danger" style="font-size: 30px"></i>
                                            @endif
                                        </a>
                                    </td>
                                    <td class="aksi-button text-center">
                                        <a href="{{ url('admin/kategori-pengumuman/murid/index/' . Crypt::encryptString($item->idKategoriPengumuman )) }}" class="btn btn-warning btn-icon-split mt-1">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-user-plus"></i>
                                            </span>
                                        </a>
                                        <a href="{{ url('admin/kategori-pengumuman/' . Crypt::encryptString($item->idKategoriPengumuman ) . '/edit') }}" class="btn btn-success btn-icon-split mt-1">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <form id="myForm" class="d-inline"
                                            action="{{ url('/admin/kategori-pengumuman/' . Crypt::encryptString($item->idKategoriPengumuman )) }}" method="POST">
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
