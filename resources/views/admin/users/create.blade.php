@extends('layouts.app')

@section('sub-title')
<title>Blatt | Registrar Usuarios</title>
@endsection

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
           
                
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('users.index') }}">Usuarios</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Registrar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
	<div class="row" style=" align-items: center; justify-content: center;">
		<div class="col-6">
            <div class="card">
                <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="card-body">
                        <br>
                        <h4 style="text-align: center;" class="header-title mt-0 mb-1">REGISTRO DE USUARIO</h4> <br> 

                        <p style="margin-left: 1cm;">Todos los campos son requeridos *</p>

                    <div class="row" style="margin-left: 1cm;">
                    	<div class="form-group  mb-3">
                             <label style="margin-left: 0.3cm;">Nombre *</label>

                          
                                <input style="width: 310px; margin-left: 0.3cm;" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Ej: Martin Ferrer">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>

                        <div class="row" style="margin-left: 1cm;">
                        <div class="form-group  mb-3">
                             <label style="margin-left: 0.3cm;">Correo *</label>

                                <input style="width: 310px; margin-left: 0.3cm;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ej: micorreo@gmail.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                 

                         <div class="row" style="margin-left: 1cm;">
                        <div class="form-group  mb-3">
                             <label style="margin-left: 0.3cm;">Contraseña *</label>

                           
                                <input style="width: 310px; margin-left: 0.3cm;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row" style="margin-left: 1cm;">
                        <div class="form-group  mb-3">
                             <label style="margin-left: 0.3cm;">Confirmar Contraseña *</label>

                            
                                <input style="width: 310px; margin-left: 0.3cm;" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                         <div class="row" style="margin-left: 1cm;">
                        <div class="form-group  mb-3">
                             <label style="margin-left: 0.3cm;">Tipo de usuario *</label>

                             
                             <select  style="width: 310px; margin-left: 0.3cm;" name="user_type" class="form-control" >
                                <option value="Administrador">Administrador</option>
                                <option value="Jefe">Jefe</option>
                                <option value="Contador">Contador</option>
                            </select>
                             </div>
                        </div>          
                               
           				{{-- <div class="form-group row">
                            <label for="Empresa" class="col-md-3 col-form-label text-md-right">Nombre de la Empresa</label>

                            <div class="col-md-6">
                                <input id="Empresa" type="text" class="form-control @error('log_enterprise') is-invalid @enderror" name="Empresa" value="{{ old('log_enterprise') }}" autocomplete="Empresa" autofocus placeholder="Ej: Inversiones Martín C.A.">

                                @error('log_enterprise')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>     --}}         
                    <div class="border-top">
                        <div class="card-body" align="right">
                            <button style="align-content: center;" type="reset" class="btn btn-dark">Borrar</button>
                            <button style="align-content: center;" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>
@endsection
@section('script')
<!-- Plugin js-->
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
@endsection