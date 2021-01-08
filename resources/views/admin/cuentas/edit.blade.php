@extends('layouts.app')
@section('css')

@endsection
@section('content-header')
<section class="content-header">
      <h1> 
        ...
        <small>...</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Cuentas</a></li>
        <li class="active">Registros</li>
      </ol>
    </section>
@endsection
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
           
                
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('cuentas.index') }}">Cuentas</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Editar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-md-7" ></div>
        <div class="col-md-5">
            @include('flash::message')
        </div>
</div>
<div class="content">
	<div class="row">
        <div class="col">
          <div class="box">
            <div class="box-header">
              
            </div>

            <!-- /.box-header -->
            <div class="box-body">

               <div class="card">
            <div class="card-body">
              <br>
              <h4 style="text-align: center;" class="header-title mt-0 mb-1">Modificar Cuenta</h4>
               <p style="color: black; padding-top: 10px;">Campos Obligatorios (*)</p>
              {!! Form::open(['route' => ['cuentas.update', $cuentas->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form', 'data-parsley-validate']) !!}
                @csrf
                    <div class="row">                       
                         <div class="col-md-4">
                            <label for="exampleInputEmail1">Nombre *</label>
                             <input required="required" value="{{$cuentas->nombre}}" type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese la Descripción">
                       </div>  

                          <div class="col-md-4">
                            <label for="exampleInputEmail1">Descripción</label>
                             <input type="text" value="{{$cuentas->descripcion}}" name="descripcion" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese la Descripción">
                       </div> 

                    
                       <div class="col-md-4">
                      <label>Tipo *</label>
                      <select name="tipo" id="tipo_cuenta" onchange="cargartipos();" required="required" class="form-control">
                      <option value="">Seleccione el tipo de cuenta</option>
                      <option value="pasivo">Pasivo</option>
                      <option value="activo">Activo</option>
                      <option value="capital">Capital</option>
                      <option value="egreso">Egreso</option>
                      <option value="ingreso">Ingreso</option>
                      
                      </select>

                       </div>
                      </div>
                    <br>
                    <div class="row">


                      <div class="col-md-4">
                            <label>Tipo *</label>
                            <select name="t_cuenta" id="t_cuenta" required="required" class="form-control">
                           <option value="">Seleccione</option>
                           </select>
                        </div> 
                    
                         <div class="col-md-4">
                            <label for="exampleInputEmail1">Código *</label>
                             <input value="{{$cuentas->codigo}}" required="required" type="text" name="codigo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese la Descripción">
                             <div class="valid-feedback"></div>
                       </div>  

                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Monto *</label>
                            <input value="{{$cuentas->saldo}}" required="required" name="saldo" type="number" class="form-control"  placeholder="Ingrese el monto">
                        </div>
                         <div class="valid-feedback"></div>
 
                    </div>
                    
                    <br>
                    <div class="border-top">
                        <div class="card-body" align="right">
                            <button style="align-content: center;" type="reset" class="btn btn-dark">Borrar</button>
                            <button style="align-content: center;" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>

            </div> <!-- end card-body-->
        </div> <!-- end card-->




              {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</div>
@endsection
@section('script')

<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
@endsection

@section('script-bottom')

@endsection

<script type="text/javascript">
  
  function cargartipos() {
    //
    var tiposCuentas = {
      pasivo: ["Circulante", "A largo plazo", "Crédito diferido", "Otros pasivos"],
      activo: ["Circulante", "Realizable", "Fijo tangible", "Cargo diferido", "Otros activos"],
      capital: [""],
      egreso: [""],
      ingreso: [""]
    }
    
    var tcuentas = document.getElementById('tipo_cuenta')
    var tdecuenta = document.getElementById('t_cuenta')
    var tipocuentasSeleccionada = tcuentas.value
    
    // Se limpian 
    tdecuenta.innerHTML = '<option value="">Seleccione un tipo de '+tipocuentasSeleccionada+'</option>'
    
    if(tipocuentasSeleccionada !== ''){
      // Se seleccionan y se ordenan
      tipocuentasSeleccionada = tiposCuentas[tipocuentasSeleccionada]
      tipocuentasSeleccionada.sort()
    
      // Insertamos 
      tipocuentasSeleccionada.forEach(function(t_cuenta){
        let opcion = document.createElement('option')
        opcion.value = t_cuenta
        opcion.text = t_cuenta
        tdecuenta.add(opcion)
      });
    }
    
  }
  
</script>
