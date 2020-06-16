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
    <div class="row">
        <div class="col-md-7" ></div>
        <div class="col-md-5">
            @include('flash::message')
        </div>
</div>
        
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
                                                <img src="assets/images/logo.png" alt="" height="24" />
                                                <h3 class="d-inline align-middle ml-1 text-logo">Shreyu</h3>
                                            </a>
                                        </div>

                                        <h6 class="h5 mb-0 mt-4">{{ __('Recuperar Contraseña') }}</h6>
                                        <p class="text-muted mt-0 mb-4">Ingrese los siguientes datos</p>

                                        <form action="{{ route('recuperando_clave') }}" method="POST">
                                             @csrf

                                          <input type="hidden" name="token" value="{{ $token }}">

                                            <div class="form-group">
                                                <label class="form-control-label">{{ __('Correo') }}</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email"  id="email" placeholder="hello@coderthemes.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                                  @error('email')
                                                     <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                     </span>
                                                 @enderror
                                                </div>
                                            </div>

                                           <div class="form-group ">
                                                <label class="form-control-label">{{ __('Contraseña') }}</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password"  id="password"
                                                        placeholder="Ingrese su Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                              @error('password')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                             @enderror
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="password-confirm" class="form-control-label">{{ __('Confirmar Contraseña') }}</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" id="password-confirm"
                                                        placeholder="Repita su Contraseña" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                              
                                                </div>
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit"> {{ __('Recuperar Contraseña') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="col-lg-6 d-none d-md-inline-block">
                                        <div class="auth-page-sidebar">
                                            <div class="overlay"></div>
                                            <div class="auth-user-testimonial">
                                                <p class="font-size-24 font-weight-bold text-white mb-1">I simply love it!</p>
                                                <p class="lead">"It's a elegent templete. I love it very much!"
                                                </p>
                                                <p>- Admin User</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Regresar <a href="{{ route('login') }}" class="text-primary font-weight-bold ml-1">Login</a></p>
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
