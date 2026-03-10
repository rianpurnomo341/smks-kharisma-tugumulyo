<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMK Kharisma Tugumulyo</title>
    <link rel="icon" href="{{ asset('media-sistem/logoSMK.png') }}">

    {{-- bootstrap 5 --}}
    <link rel="stylesheet" href="{{ asset('asset/bootstrap-5/css/bootstrap.min.css') }}">

    {{-- bootstrap 4 --}}
    <link rel="stylesheet" href="{{ asset('asset/bootstrap-4/dist/css/bootstrap.min.css') }}">

</head>

<body class="bg-primary">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-md-6">
                <div class="card bg-white shadow-lg">
                    <div class="card-body px-5">
                        <div class="text-center">
                            <div class="mb-3">
                                <img src="{{ asset('media-sistem/logoSMK.png') }}" alt="img-logo"
                                    style="width: auto; height: 110px;">
                            </div>
                            <h6 class="opacity-75">KONFIRMASI LUPA PASSWORD</h6>
                            <h5 class="fw-bold mt-2">SMK KHARISMA TUGUMULYO</h5>
                            <small class="opacity-75 fst-italic">Silahkan input Email anda yang terdaftar</small>
                        </div>
                        <div class="opacity-50 mb-3">
                            <hr>
                        </div>
                                     
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
        
                                <div class="mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukan Alamat Email...">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        
                                <div class="row text-center">
                                    <div class="col-md">
                                        <button type="submit" class="btn btn-primary col-md">
                                            Kirim link reset password
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <a href="/login" class="btn btn-danger col-md">
                                            Kembali login
                                        </a>
                                    </div>
                                </div>
                               
                            </form>
                        </div>
                                   
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- bootstrap 4 --}}
    <script src="{{ asset('asset/bootstrap-4/dist/js/bootstrap.bundle.min.js') }}"></script>

    {{-- bootstrap 5 --}}
    <script src="{{ asset('asset/bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Jquery --}}
    <script src="{{ asset('asset/jquery/jquery-3.6.0.min.js') }}"></script>
    
</body>

</html>
