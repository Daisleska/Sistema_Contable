@extends('layouts.app')

@section('css')
<!-- plugin css -->
{{-- <link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" /> --}}
@endsection

@section('content')
<div class="row">
        <div class="col-md-7" ></div>
        <div class="col-md-5">
            @include('flash::message')
        </div>
</div>
<div class="row" style="align-content: center;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 style="text-align: center;" class="header-title mt-0 mb-1">Registro de Cotización</h4>
                <p class="sub-header"></p>

                <form  action="{{route('cotizacion.store')}}" class="needs-validation" method="post"  novalidate>
                    
                    @csrf
                   <div class="card-body">
                        <h4 class="card-title"> <p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p></h4>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                
                             <p>Fecha</p>
                                <input style="width: 160px;" type="date" readonly="readonly" name="fecha" class="form-control"  value="<?php echo date("Y-m-d");?>"  required>
                            </div>


                                <?php 

                                use App\cotizacion;

                                $cotizacion=DB::table ('cotizaciones')->select('id')->take(1)->orderBy('id', 'desc')->first();

                                 if($cotizacion) {
                            ?>
                                <div class="col-lg-4">
                                    
                                <p>N° Cotización</p>
                               <input style="width: 160px;" type="text" readonly="readonly" name="n_cotizacion" class="form-control" value="0000<?php  echo $cotizacion->id +1; ?>">
                                </div>

                          
                            </tr>
                          <?php }else{
                            ?>
                                <div class="col-lg-4"> 
                                <p>N° Cotización</p>
                                    
                                <input style="width: 160px;" type="text" readonly="readonly" name="n_cotizacion" class="form-control" value="00001">
                                </div>

                           
                            <?php
                          }?>
                        </div>
                        {{-- @if(\Auth::getUser()->user_type=="Administrador")
                        <div class="row mb-3">
                            <div class="col-lg-8">
                                <label for="price"> <b style="color:red;">*</b>Usuarios:</label>
                                <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="user_id" id="user_id">
                                    <option value="">Seleccione un usuario</option>
                                    @foreach($users as $key)
                                        <option value="{{ $key->id }}">{{ $key->name }} | {{ $key->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div> --}}
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <label for="name"> <b style="color:red;">*</b>Clientes:</label>
                                <select  class="select2 form-control custom-select" style="width: 100%; height:36px;" name="clientes_id" id="client_id">
                                    <option selected="selected" disabled="disabled" readonly>Seleccione el Cliente</option>
                                    @foreach($clients as $key)
                                        <option value="{{ $key->id }}">{{ $key->nombre }} | {{ $key->ruf }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                      {{--   @else --}}
                        <input type="hidden" name="user_id" value="{{ \Auth::getUser()->id }}">
                        {{-- <div class="row mb-3">
                            <div class="col-lg-8">
                                <label for="name"> <b style="color:red;">*</b>Clientes:</label>
                                <select  class="select2 form-control custom-select" style="width: 100%; height:36px;" name="clientes_id" id="client_id">
                                    @foreach($clients as $key)
                                        <option value="{{ $key->id }}">{{ $key->nombre }} | {{ $key->ruf }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                        @endif --}}
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <label for="name"> <b style="color:red;">*</b>Productos:</label>
                                <select  class="select2 form-control custom-select" style="width: 100%; height:36px;" name="productos_id" id="products_select">
                                    <option selected="selected" disabled="disabled" readonly>Seleccione el Producto</option>
                                    @foreach($products as $key)
                                        <option value="{{ $key->id }}">{{ $key->nombre }} | {{ $key->unidad }} | {{ $key->existencia }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <label for="cedula"> <b style="color:red;">*</b>Lista de Productos:</label>
                                <div class="table-responsive">
                                    <table id="lista_productos" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Unidad</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr><th colspan="4"></th><th>Total: <span id="total"></span></th><th><input type="hidden" name="total_cantidad" id="total_amount" class="total_amount"></th></tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="Comentarios">Comentarios:</label>
                                <input type="text" class="form-control" placeholder="Ej: Todo Bien" name="comentarios" id="comments" value="{{ old('comments') }}">
                            </div>
                            <div class="col-lg-4">
                                <label for="Descuento"> Descuento:</label>
                                <input type="number" class="form-control" name="p_des" id="discount" value="{{ old('discount') }}">
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <div class="col-lg-8">
                                <label for="Comentarios">Archivos:</label>
                                <input type="file" multiple="multiple" class="form-control" placeholder="Ej: Todo Bien" name="files[]" id="files" >
                            </div>
                        </div> --}}
                        <div class="row mb-3">
                            <div class="col-lg-4">
                            <label for="Comentarios"><b>Condiciones Generales:</b></label>  
                            </div>
                        </div>
                        <div class="row mb-3">
                        <div class="col-lg-4" >  
                        <p>Validez de oferta</p>   
                          <select style="width: 50" name="validez" class="form-control">
                                <option value="15" selected="selected">15 días</option>
                                <option value="30">30 días</option>
                               </select>
                            </div>
                            <div class="col-lg-4">
                                 <p>Divisa</p>
                                <select style="width: 50" name="divisa" class="form-control">
                                <option value="Bs.S">VEF</option>
                                <option value="£">GBP</option>
                                <option value="¥">JPY</option>
                               <option value="¥">CNY</option>
                               <option value="€">EUR</option>
                               <option selected="selected" value="$">USD</option>
     
                                </select>
                            </div>
                            <div class="col-lg-4">
                                 <p>Forma de pago</p>
                              <select name="c_pago" data-plugin="customselect" class="form-control" data-placeholder="Elige">
                                  
                                  <option value="efectivo" selected="selected">Efectivo</option>
                                  <option value="transferencia">Transferencia</option>
                                  
                                </select>
                            </div>
                        </div>
                      
                        <div class="row mb-3">
                            <div class="col-lg-4">
                            <label for="Comentarios"><b>Adiciones al Correo:</b></label>    
                            </div>
                        </div>
                        <div class="row mb-3">
                            
                            <div class="col-lg-4">
                                <label for="adiciones">Dirigido a:</label>
                                <input type="text"  value="{{old('address_to')}}" required="required"  class="form-control" placeholder="Ej: José Quintero" name="address_to" id="address_to">
                            </div>
                            <div class="col-lg-6">
                                <label for="Comentarios Correo">Comentarios del Correo:</label>
                                <textarea class="form-control" name="email_comments" id="email_comments"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

 @endsection

@section('script')
<script src="{{ URL::asset('Shreyu/assets/js/app.min.js') }}"></script>
<!-- Plugin js-->
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsley.min.js') }}"></script>

<!-- jQuery CDN -->
<script src="{{ URL::asset('js/jquery/dist/jquery.min.js') }}"></script>

<script src="{{ URL::asset('js/jquery/dist/jquery.maskedinput.js')}}
"></script>

<script type="text/javascript">

$(document).ready( function(){
    var LineNum=0;
    $("#user_id").on("change", function (event) {
        var id = event.target.value;


        $.get("/clients/"+id+"/search",function (data) {
        

           $("#client_id").empty();
           $("#client_id").append('<option value="" selected disabled> Seleccione el Cliente</option>');
            
            if(data.length > 0){

                for (var i = 0; i < data.length ; i++) 
                {  
                    $("#client_id").removeAttr('disabled');
                    $("#client_id").append('<option value="'+ data[i].id + '">' + data[i].nombre +'|'+ data[i].ruf +'</option>');
                }

            }else{
                
                $("#client_id").attr('disabled', false);

            }
        });
        $.get("/products/"+id+"/search",function (data) {
        

           $("#products_select").empty();
           $("#products_select").append('<option value="0" selected disabled> Seleccione un Producto</option>');
            
            if(data.length > 0){

                for (var i = 0; i < data.length ; i++) 
                {  
                    $("#products_select").removeAttr('disabled');
                    $("#products_select").append('<option value="'+ data[i].id + '">' + data[i].nombre +' | ' + data[i].unidad +' | ' + data[i].precio +'</option>');
                }

            }else{
                
                $("#products_select").attr('disabled', false);

            }
        });
    });
    $("#products_select").on("change", function (event) {
        var id = event.target.value;


        $.get("/products/"+id+"/add",function (data) {
        

           //$("#lista_productos").empty();
           
            
            if(data.length > 0){
                LineNum++;
                for (var i = 0; i < data.length ; i++) 
                {
                    //$('#products_select').children('option[value="'+id+'"]').attr('disabled',true);
                    //$("#lista_productos").append('<tr>'); 
                    //$("#products").removeAttr('disabled');
                    $("#lista_productos").append('<tr id="Line'+LineNum+'"><td><input type="hidden" name="product_id[]" id="product_id" value="'+ data[i].id + '">' + data[i].nombre +'</td><td>' + data[i].unidad +'</td><td>'+ data[i].precio +'</td><td><input onchange="add_amount(this)" type="number" name="amount[]" class="amount" id="amount required="required"></td><td><button type="button" onclick="EliminarLinea('+LineNum+','+data[i].id+');"  class="btn btn-danger btn-sm"><i class="m-r-10 mdi mdi-delete"><code class="m-r-10"></code></button></td></tr>');
                    //$("#lista_productos").append('</tr>');
                }

            }else{
                
                //$("#client_id").attr('disabled', false);

            }
        });
    });

    
});
function EliminarLinea(rnum,id_opcion) {
    var next=id_opcion-1;
    //console.log(id_opcion+" siguiente "+next);
    /*$('#products_select').children('option[value="'+next+'"]').attr('selected',true);
    $('#products_select').children('option[value="'+id_opcion+'"]').removeAttr('disabled');*/
    $('#Line'+rnum).remove();
        return true;
}

function add_amount(argument) {
    //console.log(argument.value+"vbnm,");
    var total=0;
    
    
  $(".amount").each(function() {
    console.log($(this).val()+"dfghjkl");
    if (isNaN(parseFloat($(this).val()))) {

      total += 0;

    } else {

      total += parseFloat($(this).val());

    }

  });

  //alert(total);
  $(".total_amount").val(total);
  document.getElementById('total').innerHTML = total;



}
</script>

@endsection