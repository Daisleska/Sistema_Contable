<div class="modal fade" id="bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    {!! Form::open(['route' => ['diario.store'], 'method' => 'POST', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                    @csrf



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

                <?php
                $fecha_enviar= date('Y-m-d');
                ?>

                <input type="hidden" name="fecha" value="{{$fecha_enviar}}">

             <div class="modal-body">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <form>
                    <div class="row">
                        <div class="col-md-5">
                        <div class="form-group mt-3 mt-sm-0">
                            <label>Cuentas</label>
                            <select  name="de_cuentas" required="required" data-plugin="customselect" class="form-control" data-placeholder="Seleccione la cuenta">
                                 @foreach($cuentas as $key)
                                <option></option>
                                <option value="{{$key->id}}">{{$key->nombre}}-({{$key->codigo}})</option>
                                 @endforeach
                            </select>
                           
                        </div> 
                      </div>

                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <p>-A-</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <div class="col-md-5">
                        <div class="form-group mt-3 mt-sm-0">
                            <label>Cuentas</label>
                            <select  name="a_cuentas" required="required" data-plugin="customselect" class="form-control" data-placeholder="Seleccione la cuenta">
                                 @foreach($cuentas as $key)
                                <option></option>
                                <option value="{{$key->id}}">{{$key->nombre}}-({{$key->codigo}})</option>
                                 @endforeach
                            </select>
                           
                        </div> 


                      </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Monto</label>
                            <input type="number" class="form-control" name="monto" placeholder="Ingrese el monto">
                        </div>

                     <div class="col-md-4">
                            <label for="exampleInputEmail1">Descripción</label>
                             <input type="text" name="descripcion" class="form-control" maxlength="100" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Breve Descripción">
                       </div> 

                  
                        <div class="col-md-4">
                         <h4 class="font-size-15 mt-3">ELIGE (*)</h4>
                                        <div class="">
                                            <div class="custom-control custom-radio mb-2">
                                                <input type="radio" id="customRadio1" name="debe_haber" value="haber" 
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">HABER</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" value="debe" name="debe_haber"
                                                    class="custom-control-input" >
                                                <label class="custom-control-label" for="customRadio2">DEBE</label>
                                            </div>
                                        </div>
                                    </div>
                        
                    
                    </div>
                    <br>
                    <button  type="submit" class="btn btn-primary">Guardar</button>
                  {!! Form::close() !!}

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>




             </div>
        </div>
    </div>
</div>