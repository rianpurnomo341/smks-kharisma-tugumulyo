<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }} - SMK Kharisma Tugumulyo</title>
    <link rel="icon" href="{{ asset('media-sistem/logoSMK.png') }}">

    {{-- bootstrap 5 --}}
    <link rel="stylesheet" href="{{ asset('asset/bootstrap-5/css/bootstrap.min.css') }}">

    {{-- bootstrap 4 --}}
    <link rel="stylesheet" href="{{ asset('asset/bootstrap-4/dist/css/bootstrap.min.css') }}">

    {{-- icon bootstrap --}}
    <link rel="stylesheet" href="{{ asset('asset/bootstrap-icon/font/bootstrap-icons.css') }}">

    {{-- icon font awesome --}}
    <link rel="stylesheet" href="{{ asset('asset/icon/css/all.min.css') }}">

    {{-- template adminLte --}}
    <link rel="stylesheet" href="{{ asset('asset/css/admin-template.css') }}">

    {{-- datatable --}}
    <link rel="stylesheet" href="{{ asset('asset/datatables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css') }}">

    {{-- tric css --}}
    <link rel="stylesheet" href="{{ asset('asset/css/trix.css') }}">

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        .active {
            margin-left: -3px;
            border-left: 3px solid rgb(22, 172, 218);
            background-color: rgb(174, 203, 212);
        }
    </style>

    {{-- sweetalert2 --}}
    <link rel="stylesheet" href="{{ asset('asset/sweetalert2/sweetalert2.min.css') }}">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.layout.sidebar')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar  navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-lg-inline text-gray-600 small">
                                    {{ auth()->user()->name }}
                                    <i class="fas fa-solid fa-caret-down ps-1"></i>
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ url('admin/profil-admin') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    <span class="text-gray-600">Profile</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('logout') }}" id="btn_logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    <span class="text-gray-600">Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            @include('admin.layout.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
    {{-- Jquery --}}
    <script src="{{ asset('asset/jquery/jquery-3.6.0.min.js') }}"></script>

    {{-- bootstrap 4 --}}
    <script src="{{ asset('asset/bootstrap-4/dist/js/bootstrap.bundle.min.js') }}"></script>
    
    {{-- bootstrap 5 --}}
    <script src="{{ asset('asset/bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>

    {{-- template adminLte --}}
    <script src="{{ asset('asset/js/sb-admin-2.min.js') }}"></script>

    {{-- scroll bar --}}
    <script src="{{ asset('asset/jquery-scrollbar/jquery.easing.min.js') }}"></script>

    {{-- trix JS --}}
    <script src="{{ asset('asset/js/trix.js') }}"></script>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>

    {{-- datatable --}}
    <script src="{{ asset('asset/datatables/DataTables-1.11.3/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/datatables/DataTables-1.11.3/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable();
        });
    </script>

    {{-- sweetalert2 --}}
    <script src="{{ asset('asset/sweetalert2/sweetalert2.min.js') }}"></script>

    {{-- notifikasi success store/update/destroy --}}
    @if (session()->get('name'))
        <script>
            setTimeout(function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: {!! session()->get('time') !!},
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: '{!! session()->get('icon') !!}',
                    title: '{!! session()->get('title') !!}'
                })
            }, );
        </script>
    @endif

    {{-- confirmasi destroy --}}
    <script>
        $(document).on('click', '#btn_delete', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: 'Data akan terhapus secara permanen',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parent().submit();
                }
            })
        });
    </script>

    {{-- confirmasi logout --}}
    <script>
        $(document).on('click', '#btn_logout', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');

            Swal.fire({
                title: 'Yakin anda yakin?',
                text: 'Anda akan keluar dari Form ini',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Keluar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = link;
                }
            })
        });
    </script>

</body>

</html>