@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/ekstrakurikuler/create') }}" class="btn btn-primary btn-icon-split">
            <span class="text">Tambah Item</span>
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                @if (count($ekstrakurikuler))
                    <table class="table table-hover table-bordered dataTable">
                        <thead class="bg-light text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kepanjangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ekstrakurikuler as $item)
                                <tr>
                                    <th class="text-center aksi-button" scope="row">{{ $no++ }}</th>
                                    <td class="text-center aksi-button">
                                        @if (Storage::exists($item->fotoEkstrakurikuler))
                                            <img src="{{ asset('storage/' . $item->fotoEkstrakurikuler) }}"
                                                class="rounded-start border border-4" alt="Foto Ekstrakurikuler"
                                                style="width: 100px; height: 100px;">
                                        @else
                                            <img src="{{ asset('media-sistem/img-deafult.jpg') }}"
                                                class="rounded-start border border-4" alt="Foto Ekstrakurikuler"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                        @endif
                                    </td>
                                    <td class="aksi-button">{{ $item->namaEkstrakurikuler }}</td>
                                    <td>{{ $item->kepanjanganEkstrakurikuler }}</td>
                                    <td class="aksi-button text-center">
                                        <a href="{{ url('admin/ekstrakurikuler/' . Crypt::encryptString($item->idEkstrakurikuler) . '/edit') }}"
                                            class="btn btn-success btn-icon-split mt-1">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <form id="myForm" class="d-inline"
                                            action="{{ url('/admin/ekstrakurikuler/' . Crypt::encryptString($item->idEkstrakurikuler)) }}"
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
