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

    {{-- sweetalert2 --}}
    <link rel="stylesheet" href="{{ asset('asset/sweetalert2/sweetalert2.min.css') }}">

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
                            <h6 class="opacity-75">LOGIN ADMIN</h6>
                            <h5 class="fw-bold mt-2">SMK KHARISMA TUGUMULYO</h5>
                            <small class="opacity-75 fst-italic">Silahkan Login dengan Email dan Password anda</small>
                        </div>
                        <div class="opacity-50 mb-4">
                            <hr>
                        </div>
                        
                        <form class="mb-4" method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukan Alamat Email...">
                                
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  
        
                            <div class="mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukan Password...">
                                <input type="checkbox" class="m-2 mt-3" onclick="pass_eyes()">Show Password
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <button type="submit" class="btn btn-primary col-md mb-3">
                                {{ __('Login') }}
                            </button>
                            
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-check m-2">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Lupa Password?
                                        </a>
                                    @endif 
                                </div>
                            </div>
                        
                        </form>
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

    <!-- eyes password -->
    <script>
        function pass_eyes() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    {{-- sweetalert2 --}}
    <script src="{{ asset('asset/sweetalert2/sweetalert2.min.js') }}"></script>
    
</body>

</html>
