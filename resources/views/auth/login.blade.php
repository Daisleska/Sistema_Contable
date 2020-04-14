<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Sistema Contable</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('Shreyu/assets/images/favicon.ico')}}">

        <!-- App css -->
        <link href="{{ asset('Shreyu/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('Shreyu/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('Shreyu/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg" {{-- style="background-image: url('Shreyu/assets/images/fondo1.jpg'); background-size: cover;  " --}}>
        
        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-6 p-5">
                                        <div class="mx-auto mb-5">
                                             <a href="{{ url('/login') }}"><b></b>
                                                <img src="{{ asset('Shreyu/assets/images/logo.png')}}" alt="" height="24" />
                                                <h3 class="d-inline align-middle ml-1 text-logo">Blatt</h3>

                                            </a>
                                        </div>

                                        <h6 class="h5 mb-0 mt-4">¡Bienvenido!</h6>
                                        <p class="text-muted mt-1 mb-4">Ingrese su correo y su contraseña de acceso</p>

                            <form method="POST" action="{{ route('login') }}">
                        @csrf
                                            <div class="form-group">
                                                <label class="form-control-label">Correo</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="mail"> {{ __('E-Mail') }}</i>
                                                        </span>
                                                    </div>
                                                    <input type="email" id="email" placeholder="hello@coderthemes.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                      @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ 'El correo ingresado no es correcto' }}</strong>
                                        </span>
                                        @enderror
                                                </div>
                                            </div>

                                            <div class="form-group mt-4">
                                                <label class="form-control-label">Contraseña</label>
                                                 @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="float-right text-muted text-unline-dashed ml-1">{{ __('Olvidó su Contraseña?') }}</a>
                                                 @endif
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="lock">{{ __('Contraseña') }}</i>
                                                        </span>
                                                    </div>
                                                    <input type="password"  id="password"
                                                        placeholder="Ingrese su Contraseña"class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                        @error('password')
                                           <span class="invalid-feedback" role="alert">
                                        <strong>{{ 'La contraseña ingresada no es correcta' }}</strong>
                                          </span>
                                          @enderror
                                                </div>
                                            </div>

                                            {{-- <div class="form-group mb-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="checkbox-signin" checked>
                                                    <label class="custom-control-label" for="checkbox-signin">Recuerdame</label>
                                                </div>
                                            </div> --}}

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit">
                                                {{ __('Entrar') }}</button>

                                            </div>
                                        </form>
                                        <br>
                                        <div class="form-group mb-0 text-center">
                                                <button class="btn btn-default btn-block"><a href="{{ route('register') }}"> {{ __('Registrarse') }}</a>
                                                </button>

                                            </div>
                                        
                                    </div>
                                    <div class="col-lg-6 d-none d-md-inline-block">
                                        <div class="auth-page-sidebar">
                                            <div class="overlay"></div>

                                            <div >
                                               <img src="{{ asset('Shreyu/assets/images/logoeiche.jpg')}}" alt="" width="453" height="550">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        {{-- <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">No posee una cuenta? <a href="{{ route('register') }}" class="text-primary font-weight-bold ml-1">Registrarse</a></p>
                            </div> <!-- end col -->
                        </div> --}}
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="{{asset('Shreyu/assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('Shreyu/assets/js/app.min.js')}}"></script>
        
    </body>
</html>
