<div class="modal fade" id="bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    {!! Form::open(['route' => ['diario.store'], 'method' => 'POST', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                    @csrf



    <div class="modal-dialog modal-xl">
        <div class="modal-content">
              <div class="modal-header">
                <?php
                $fecha= date('d-m-Y');
                ?>
             <h5 style="margin-left: 1cm;" class="modal-title" id="myExtraLargeModalLabel">Registro en Libro Diario  </h5><h6 style="margin-left: 1cm;">Fecha: {{$fecha}} </h6>
          

                <div class="modal-title" id="myExtraLargeModalLabel"><label>   </label></div>
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

                     @include('process.diario.registro')

                    <div class="row">
              
                     <div class="col-md-12">
                            <label for="exampleInputEmail1">Descripción</label>
                             <input type="text" name="descripcion" class="form-control" required="required" maxlength="100" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Breve Descripción">
                       </div> 
                                              
                    
                    </div>
                    <br>
                    <div class="border-top">
                        <div class="card-body" align="right">
                            <button style="align-content: center;" type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                            <button style="align-content: center;" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                  {!! Form::close() !!}

               

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>




             </div>
        </div>
    </div>
</div>