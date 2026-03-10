@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-md-0">{{ $title }}</h4>
        <a href="{{ url('/admin/kotak-saran') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fas fa-arrow-left"></i>
            </span>
            <span class="text">Back Page</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="mb-3">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td class="px-3">: {{ $kotak_saran->namaKontak }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td class="px-3">: {{ $kotak_saran->created_at->format('d M Y - H:i:s T') }}</td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td class="px-3">: {{ $kotak_saran->teleponKontak }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td class="px-3">: {{ $kotak_saran->emailKontak }}</td>
                    </tr>
                </table>
            </div>
            <p>
                {{ $kotak_saran->pesanKontak }}
            </p>
        </div>
    </div>
@endsection
