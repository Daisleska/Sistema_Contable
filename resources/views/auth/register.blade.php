<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Registrar - Sistema contable</title>
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
                                                <img src="assets/images/logo.png" alt="" height="24" />
                                                <img src="{{ asset('Shreyu/assets/images/logo.png')}}" alt="" height="24" />
                                                <h3 class="d-inline align-middle ml-1 text-logo">Blatt</h3>
                                            </a>
                                        </div>

                                        <h6 class="h5 mb-0 mt-4">{{ __('Registrarse') }}</h6>
                                        <br>
                                       
                                @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>
                                <br>@endif
                                @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>
                                <br>@endif
                                        <form method="POST" action="{{ route('register') }}">
                                              @csrf

                                            <div class="form-group">
                                                <label class="form-control-label">{{ __('Nombre') }}</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="user"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" id="name"
                                                        placeholder="Nombre Completo" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                 @error('name')
                                                     <span class="invalid-feedback" role="alert">
                                                         <strong>{{ 'El nombre no puede llevar datos numericos' }}</strong>
                                                     </span>
                                                 @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-control-label">{{ __('Correo') }}</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email"  id="email" placeholder="usuario@mail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ 'Este correo ya esta registrado' }}</strong>
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
                                                        placeholder="Ingrese su Contraseña" minlength="8"  title="Minimo 8 digitos" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                              @error('password')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ 'La contraseña no coincide' }}</strong>
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

                                            <div class="form-group mb-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="checkbox-signup" checked>
                                                    <label class="custom-control-label" for="checkbox-signup">
                                                        Acepto <a href="javascript: void(0);">Los terminos y condiciones</a>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit">{{ __('Registrar') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="col-lg-6 d-none d-md-inline-block">
                                        <div class="auth-page-sidebar">
                                            <div class="overlay"></div>
                                             <div >
                                               <img src="{{ asset('Shreyu/assets/images/logoeiche.jpg')}}" alt="" width="450" height="650">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-primary font-weight-bold ml-1">Login</a></p>
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




