<?php
 $fecha = date('Y-m-d');
?>

<h6 style="text-align: center; color: red;">IMPORTANTE</h6>
<h6 style="font-family: Arial" >El Balance de Ganancias y Pérdidas, es un reporte que se emite dos veces al año, en los meses de Junio y Diciembre.</h6> <br>

<h6 style="font-family: Arial" >Cuando sea la fecha indicada se podrá mostrar un formulario para completar la información requerida, y posteriormente se emitirá el balance del año actual.</h6> <br>

 @if(date('m')== '06' && date('m')== '12')
<center>
       <button type="button" class="btn btn-info" data-toggle="modal" data-target="#bs-example-modal-lg">Completar</button>
</center>
@endif
 
<img style="width: 500px; margin-left: 4cm;" src="{{ URL::asset('uploads/imagen1.jpg')}}">

  <!--  Modal content for the above example -->
<div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header">
      <h5 class="modal-title" id="myLargeModalLabel">Completar información</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
      <p>Nota: es importante ingresar los siguientes datos para completar el balance de ganancias y perdidas. Si alguno de los datos no los posee puede ingresar "0".</p>
      <br>
 {!! Form::open(['route' => ['balances.store'], 'method' => 'POST', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
             @csrf
      <input type="hidden" name="fecha" value="{{$fecha}}">

      <div class="row">
              <div class="form-group col-md-6">
              <label>Nombres</label>
                 <input readonly="readonly" name="nombres[]" value="Fletes de ventas" data-parsley-type="text" type="text"
                 class="form-control" required placeholder="Ej: Sueldos"/>
              </div>
              <div class=" form-group col-md-5"> 
              <label>Valores</label>
                 <input name="valor[]" data-parsley-type="number" type="number"
                 class="form-control" required placeholder="Ej: 0"/>
              </div>
      </div>
      <div class="row">
              <div class="form-group col-md-6">
                 <input readonly="readonly" name="nombres[]" value="Otros Gastos de Ventas" data-parsley-type="text" type="text"
                 class="form-control" required placeholder="Ej: Sueldos"/>
              </div>
              <div class=" form-group col-md-5">
                 <input name="valor[]" data-parsley-type="number" type="number"
                 class="form-control" required placeholder="Ej: 0"/>
              </div>
      </div>
      <div class="row">
              <div class="form-group col-md-6">
                 <input readonly="readonly" name="nombres[]" value="Sueldos y Salarios" data-parsley-type="text" type="text"
                 class="form-control" required placeholder="Ej: Sueldos"/>
              </div>
              <div class=" form-group col-md-5">
                 <input name="valor[]" data-parsley-type="number" type="number"
                 class="form-control" required placeholder="Ej: 0"/>
              </div>
      </div>
      <div class="row">
              <div class="form-group col-md-6">
                 <input readonly="readonly" name="nombres[]" value="Gastos de oficina" data-parsley-type="text" type="text"
                 class="form-control" required placeholder="Ej: Sueldos"/>
              </div>
              <div class=" form-group col-md-5">
                 <input name="valor[]" data-parsley-type="number" type="number"
                 class="form-control" required placeholder="Ej: 0"/>
              </div>
      </div>
      <div class="row">
              <div class="form-group col-md-6">
                 <input readonly="readonly" name="nombres[]" value="Gastos de Arrendamiento" data-parsley-type="text" type="text"
                 class="form-control" required placeholder="Ej: Sueldos"/>
              </div>
              <div class=" form-group col-md-5">
                 <input name="valor[]" data-parsley-type="number" type="number"
                 class="form-control" required placeholder="Ej: 0"/>
              </div>
      </div>
      <div class="row">
              <div class="form-group col-md-6">
                 <input readonly="readonly" name="nombres[]" value="Seguro Social" data-parsley-type="text" type="text"
                 class="form-control" required placeholder="Ej: Sueldos"/>
              </div>
              <div class=" form-group col-md-5">
                 <input name="valor[]" data-parsley-type="number" type="number"
                 class="form-control" required placeholder="Ej: 0"/>
              </div>
      </div>
      <div class="row">
              <div class="form-group col-md-6">
                 <input readonly="readonly" name="nombres[]" value="Otros Ingresos" data-parsley-type="text" type="text"
                 class="form-control" required placeholder="Ej: Sueldos"/>
              </div>
              <div class=" form-group col-md-5">
                 <input name="valor[]" data-parsley-type="number" type="number"
                 class="form-control" required placeholder="Ej: 0"/>
              </div>
      </div>
      <div class="row">
              <div class="form-group col-md-6">
                 <input readonly="readonly" name="nombres[]" value="Otros Egresos" data-parsley-type="text" type="text"
                 class="form-control" required placeholder="Ej: Sueldos"/>
              </div>
              <div class=" form-group col-md-5">
                 <input name="valor[]" data-parsley-type="number" type="number"
                 class="form-control" required placeholder="Ej: 0"/>
              </div>
      </div>
  </div>
  <div class="modal-footer">
    <div class="row">
        <div class="col-md-10">
          <p>Advertencia: Verifique que los datos ingresados son los correctos antes de guardar. Estos datos no pueden ser editados.</p>
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
  </div>
   {!! Form::close() !!}
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->