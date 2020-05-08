<div class="modal fade" id="bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
              <div class="modal-header">
                <?php
                $fecha= date('d-m-Y');
                ?>
                <h5 class="modal-title" id="myExtraLargeModalLabel">Registro en libro Diario</h5><hr>                <h5 class="modal-title" id="myExtraLargeModalLabel">Fecha: {{$fecha}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                </div>
             <div class="modal-body">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <form>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group mt-3 mt-sm-0">
                            <label>Cuentas</label>
                            <select required="required" data-plugin="customselect" class="form-control" data-placeholder="Seleccione la cuenta">
                                <option></option>
                                <option value="0">Shreyu</option>
                                <option value="1">Greeva</option>
                                <option value="2">Dhyanu</option>
                                <option value="3">Caja</option>
                                <option value="4">Mannat</option>
                            </select>
                        </div> 

                      </div>

                      <div class="col-md-6">
                            <label for="exampleInputEmail1">Descripción</label>
                             <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese la Descripción">
                       </div>  
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Monto</label>
                            <input type="number" class="form-control" name="monto" placeholder="Ingrese el monto">
                        </div>
                    </div>
                    <br>
                    <button  type="submit" class="btn btn-primary">Guardar</button>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>




             </div>
        </div>
    </div>
</div>