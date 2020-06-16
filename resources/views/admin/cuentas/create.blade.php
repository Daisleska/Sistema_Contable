<div class="modal fade" id="bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
              <div class="modal-header">
                <?php
                $fecha= date('d-m-Y');
                ?>
                <h5 class="modal-title" id="myExtraLargeModalLabel">Registro de cuentas</h5><hr>                <h5 class="modal-title" id="myExtraLargeModalLabel">Fecha: {{$fecha}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                </div>
             <div class="modal-body">
               
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                 {!! Form::open(['route' => ['cuentas.store'], 'method' => 'POST', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                    @csrf

                    <div class="row">                       
                         <div class="col-md-6">
                            <label for="exampleInputEmail1">Nombre *</label>
                             <input required="required" type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese la Descripción">
                       </div>  

                          <div class="col-md-6">
                            <label for="exampleInputEmail1">Descripción</label>
                             <input type="text" name="descripcion" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese la Descripción">
                       </div> 

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                        <div class="form-group mt-3 mt-sm-0">
                            <label>Tipo *</label>
                            <select required="required" data-plugin="customselect" name="tipo" class="form-control" data-placeholder="Seleccione la cuenta">
                                <option selected="selected" readonly>Seleccionar</option>
                                <option value="pasivo">Pasivo</option>
                                <option value="activo">Activo</option>
                                <option value="capital">Capital</option>
                                <option value="egreso">Egreso</option>
                                <option value="ingreso">Ingreso</option>
                            </select>
                        </div> 

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
                    <p style="color: black; padding-top: 10px;">Campos Obligatorios (*)</p>
                    <br>
                    <button  type="submit" class="btn btn-primary">Guardar</button>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
       {!! Form::close() !!}
                  
    </div>


