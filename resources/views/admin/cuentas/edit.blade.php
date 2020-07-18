@extends('layouts.app')
@section('css')
<!-- plugin css -->
<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
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
              <h4 style="text-align: center;">Modificar cuentas</h3>
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
                       </div>  

                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Monto *</label>
                            <input value="{{$cuentas->saldo}}" required="required" name="saldo" type="number" class="form-control"  placeholder="Ingrese el monto">
                        </div>
 
                    </div>
                    
                    <br>
                    <button  type="submit" class="btn btn-primary">Guardar</button>

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

<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
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
