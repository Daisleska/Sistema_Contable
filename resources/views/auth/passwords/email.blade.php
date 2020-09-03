<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Blatt | Recuperar clave</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('Shreyu/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('Shreyu/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('Shreyu/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
        <meta name="csrf-token" content="{{ csrf_token() }}">


    </head>

 <body class="authentication-bg">
        
        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-lg-6 p-5">
                                        <div class="mx-auto mb-5">
                                            <a href="index.html">
                                                <img src="{{ asset('Shreyu/assets/images/logo.png')}}" alt="" height="24" />
                                                <h3 class="d-inline align-middle ml-1 text-logo">Blatt</h3>
                                            </a>

                                        </div>

                                     <h6 class="h5 mb-0 mt-4">Recuperar Contraseña</h6>
                                        <p class="text-muted mt-1 mb-4">Ingrese su correo electronico</p>
                        <div class="row">
                        
                                     <div class="col-md-12">
                                     @include('flash::message')
                                    </div>
                                </div>
                 
                                       

                                        <form method="POST" action="{{ route('recuperando_clave') }}">
                                            @csrf


                                            <div class="form-group">
                                                <label class="form-control-label">{{ __('Correo') }}</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                  @error('email')
                                                     <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                     </span>
                                                 @enderror
                                                </div>
                                            </div>

                                       

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit"> {{ __('Enviar') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="col-lg-6 d-none d-md-inline-block">
                                        <div class="auth-page-sidebar">
                                            <div class="overlay"></div>
                                            <div >
                                               <img src="{{ asset('Shreyu/assets/images/logoeiche.png')}}" alt="" width="455" height="455">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Regresar <a href="{{ route('login') }}" class="text-primary font-weight-bold ml-1">Iniciar Sesión</a></p>
                            </div> <!-- end col -->
                        </div>
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




