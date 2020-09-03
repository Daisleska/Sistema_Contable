<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Blatt System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('Shreyu/assets/images/favicon.ico')}}">

        <link rel="stylesheet" href="{{ URL::asset('Shreyu/assets/libs/smartwizard/smart_wizard.min.css') }}" type="text/css" />

        <!-- App css -->
        <link href="{{ asset('Shreyu/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('Shreyu/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('Shreyu/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg" {{-- style="background-image: url('Shreyu/assets/images/fondo1.jpg'); background-size: cover;  " --}}>
    @if (session()->has('flash'))
    <div class="container">
        <div class="alert alert-success">
            {{ session('flash')}}
        </div>
    </div>
    @endif  
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
                                        <p class="text-muted mt-1 mb-4">Ingrese su correo y su contraseña de acceso.</p>

                                @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>
                                <br>@endif
                                @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>
                                <br>@endif


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
                                                    <input type="email" id="email" placeholder="hello@coderthemes.com" class="form-control @if($errors->has('email')) is-invalid @endif" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                     @if($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                               <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                                </div>
                                            </div>

                                            <div class="form-group mt-4">
                                                <label class="form-control-label">Contraseña</label>
                                                 @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="float-right text-muted text-unline-dashed ml-1">{{ __('¿Olvidó su Contraseña?') }}</a>
                                                 @endif
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="lock">{{ __('Contraseña') }}</i>
                                                        </span>
                                                    </div>
                                                    <input type="password"  id="password"
                                                        placeholder="Ingrese su Contraseña"class="form-control @if($errors->has('email')) is-invalid @endif" name="password" required autocomplete="current-password">

                                        @if($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                                </div>
                                            </div>

                                        

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit">
                                                {{ __('Entrar') }}</button>

                                            </div>
                                        </form>
                                        <br>
                                        <?php
                                          $users= \DB::select('SELECT * FROM users');
                                         ?>
                                        @if(empty($users))
                                        <div class="form-group mb-0 text-center">
                                                <button class="btn btn-default btn-block"><a href="{{ route('register') }}"> {{ __('Registrarse') }}</a>
                                                </button>

                                            </div>
                                        @endif
                                        
                                    </div>
                                    <div class="col-lg-6 d-none d-md-inline-block">
                                        <div class="auth-page-sidebar">
                                            <div class="overlay"></div>

                                            <div >
                                               <img src="{{ asset('Shreyu/assets/images/logoeiche.png')}}" alt="" width="455" height="500">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->


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

        <script src="{{asset('Shreyu/assets/js/pages/form-wizard.init.js') }}"></script>

        <script src="{{asset('Shreyu/assets/libs/smartwizard/jquery.smartWizard.min.js') }}"></script>
        
    </body>
</html>