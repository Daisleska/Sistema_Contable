@extends('layouts.app')

@section('sub-title')
<title>Blatt | Actualizar Usuarios</title>
@endsection


@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Usuarios</h4>
                
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

 <?php 
    $user=\Auth::User()->id; 
    ?> 
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
            <div class="card">
                {!! Form::open(['route' => ['cambiar_clave',$user], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Actualizar Usuarios <br> <p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p></h4>
                    	

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right"><b style="color:red;">*</b>Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right"><b style="color:red;">*</b>Confirma Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        

                                
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
		</div>
	</div>
</div>
</div>
@endsection

@section('scripts')
@endsection