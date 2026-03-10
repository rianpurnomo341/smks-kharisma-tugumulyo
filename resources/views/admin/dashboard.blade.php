@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="my-1">{{ $title }}</h4>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Guru dan Staff</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $gurustaff }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-person-rolodex fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-2">Berita</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $berita }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-2">Galeri</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $galeri }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-solid fa-images fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-2">Konsentrasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $konsentrasi }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-calendar2-event fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
