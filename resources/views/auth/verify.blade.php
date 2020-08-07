<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Blatt | Confirmar email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('Shreyu/assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{ asset('Shreyu/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Shreyu/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Shreyu/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg">

    <div class="account-pages my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                          @endif
                            <div class="text-center">
                                <div class="mx-auto">
                                    <a href="{{ route('login')}}">
                                        <img src="{{ asset('Shreyu/assets/images/logo.png')}}" alt="" height="24" />
                                        <h3 class="d-inline align-middle ml-1 text-logo">Blatt System</h3>
                                    </a>
                                </div>

                                <h6 class="h5 mb-0 mt-5">Confirma tu Correo</h6>
                                <br>

                               

                                

                                {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
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
    <script src="{{ asset('Shreyu/assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('Shreyu/assets/js/app.min.js')}}"></script>


</body>

</html>


