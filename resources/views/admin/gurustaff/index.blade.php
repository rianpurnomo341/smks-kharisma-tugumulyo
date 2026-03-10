@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/guru-staff/create') }}" class="btn btn-primary btn-icon-split">
            <span class="text">Tambah Item</span>
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                @if (count($gurustaff))
                    <table class="table table-hover table-bordered dataTable">
                        <thead class="bg-light text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gurustaff as $item)
                                <tr>
                                    <th class="text-center aksi-button" scope="row">{{ $no++ }}</th>
                                    <td class="text-center aksi-button px-4">
                                        @if (Storage::exists($item->fotoGuruStaff))
                                            <img src="{{ asset('storage/' . $item->fotoGuruStaff) }}" alt="foto Guru Staff"
                                                style="width: 70px; height: 100px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('media-sistem/img-deafult-gurustaff.jpg') }}"
                                                alt="foto Guru Staff"
                                                style="width: 70px; height: 100px; object-fit: cover;">
                                        @endif
                                    </td>
                                    <td>{{ $item->namaGuruStaff }}</td>
                                    <td class="text-center">{{ $item->jabatanGuruStaff }}</td>
                                    <td class="aksi-button text-center">
                                        <a href="{{ url('/admin/guru-staff/' . Crypt::encryptString($item->idGuruStaff)) . '/edit' }}"
                                            class="btn btn-success btn-icon-split mt-1">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <form id="myForm" class="d-inline"
                                            action="{{ url('/admin/guru-staff/' . Crypt::encryptString($item->idGuruStaff)) }}"
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
