@extends('layouts.app')

@section('content')
<div class="row" style=" align-items: center; justify-content: center;">
    <div class="col-lg-12">                
        <div class="card">
            <div class="card-body">
                <?php
                $fecha= date('d-m-Y');
                ?>
                <h4 style="text-align: center;" class="header-title mt-0 mb-1">Registro de Cuentas</h4> <p style="color: black; padding-top: 10px;">Fecha: {{$fecha}}</p>
                <p class="sub-header"></p>
                <p style="color: black; padding-top: 10px;">Campos Obligatorios (*)</p>

                 {!! Form::open(['route' => ['cuentas.store'], 'method' => 'POST', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                    @csrf

                    <div class="row">                       
                         <div class="col-md-4">
                            <label for="exampleInputEmail1">Nombre *</label>
                             <input required="required" type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese la Descripción">
                    </div>  
                    

                          <div class="col-md-4">
                            <label for="exampleInputEmail1">Descripción</label>
                             <input type="text" name="descripcion" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese la Descripción">
                       </div> 

                   
                    
                        <div class="col-md-4">
                      <label>Tipo *</label>
                      <select name="tipo" id="tipo_cuenta" onchange="cargartipos();" required="required" class="form-control" >
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
                             <input required="required" type="text" name="codigo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese la Descripción">
                       </div>  

                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Monto *</label>
                            <input required="required" name="saldo" type="number" class="form-control"  placeholder="Ingrese el monto">
                        </div>
 
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
                  

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    @endsection

@section('script')
<script src="{{ URL::asset('Shreyu/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/multiselect/jquery.multi-select.js') }}"></script>
<!-- Plugin js-->
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>

<script src="{{ URL::asset('Shreyu/assets/js/pages/form-advanced.init.js') }}"></script>

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
















