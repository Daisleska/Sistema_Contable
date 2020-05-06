<div class="row">
 <table style="margin-left: 1cm; margin-right: 1cm;" id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
 
            
                             <tr>
                              <input type="hidden" name="clientes_id" id="clientes_id">

                                <th>Fecha</th>
                                <th><input style="width: 160px;" type="date" readonly="readonly" name="fecha" class="form-control"  value="<?php echo date("Y-m-d");?>"  required></th>


                                <?php 

                                use App\facturav;

                                $factura=DB::table ('facturav')->select('id')->take(1)->orderBy('id', 'desc')->first();

                                 if($factura) {
                            ?>

                                <th>N° Factura</th>
                                <th><input style="width: 160px;" type="text" readonly="readonly" name="n_factura" class="form-control" value="000<?php  echo $factura->id +1; ?>"></th>

                          
                            </tr>
                          <?php }else{
                            ?>
                                
                                <th>N° Factura</th>
                                <th><input style="width: 160px;" type="text" readonly="readonly" name="n_factura" class="form-control" value="0001"></th>

                                
                            </tr>
                            <?php
                          }?>
                           
                                
                            <tr>

                               

                                <th>RUT</th>
                                <th><input style="width: 200px;"  type="text" id="ruf" name="rut" class="form-control"  value=""> 
                             
                    <small><span id="mensaje" style="color:red"></span></small>
                                </th>
                         
                                

                            </tr>


                            <tr>
                                <th>Nombre</th>
                                <th><input style="width: 350px;" type="text" id="nomb" name="nombre" readonly="readonly" class="form-control"  value="" ></th>

                            </tr>
                            <tr>
                                <th>Dirección</th>
                                <th><input style="width: 350px;" type="text" name="direccion" id="dir" readonly="readonly" class="form-control"  value=""></th>
                            </tr>
                                                 
                        </tbody>
                </table>


</div>
<div class="row">

     <table style="margin-left: 1cm; margin-right: 1cm;" id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Domicilio</th>
                                <th><input style="width: 150px;" type="text" name="domicilio" id="domicilio" class="form-control"  value="" required></th>
                                <th>Forma de pago</th>
                                <th>
                            <select name="f_pago" data-plugin="customselect" class="form-control" data-placeholder="Elige">
                                  <option selected="selected" disabled="disabled">Selecciona una opción</option>
                                  <option value="transferencia">Tranferencia</option>
                                  <option value="efectivo">Efectivo</option>
                                  <option value="cheque">Cheque</option>
                                </select></th>
                            

                            
                            </tr>
                        </thead>
                    
                </table>
</div>

<div class="row">
       <table style="margin-left: 1cm; margin-right: 1cm;" id="tablaprueba" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Descripción del producto</th>
                                <th>Cantidad</th>
                                <th>Valor de unidad</th>
                                <th>Importe</th>
                                <th>Agregar</th>
                              

                            
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                           
                <tr>
                  <input type="hidden" name="productos_id" id="productos_id">
                  <td><input style="width: 100px;" type="text" name="codigo" id="cod" class="form-control"  value=""><small><span id="mensaje2" style="color:red"></span></small></td>
                  <td><input style="width: 180px;" type="text" name="nombre" id="nombre" readonly="readonly" class="form-control"  value=""></td>
                  <td><input style="width: 100px;" type="text" name="cantidad" id="cantidad" class="form-control"  value=""><span id="mensaje3" style="color:red"></span></small></td>
                  <td><input style="width: 100px;" type="text" name="precio" id="precio" readonly="readonly" class="form-control"  value=""></td>
                  <td><input style="width: 100px;" type="text" name="importe" id="importe" class="form-control"  readonly="readonly" value=""></td>

                  <td><button onclick="agregarFila()" type="button" class="btn btn-info btn-sm">+</button>
            
                  

                  </td>
                
                </tr>

    </tbody>
  </table>
</div>

<div class="row">
       <table style="margin-left: 1cm; margin-right: 1cm;"  class="table dt-responsive nowrap">
                        <thead>


                <tr>
                    
                    <td COLSPAN="2" style="text-align: right;"><strong>CANTIDAD DE ARTÍCULOS</strong></td>
                    <td><input style="width: 100px;" type="text" name="cantidad" id="canti"  class="form-control" readonly="readonly" value=""></td>
                    <td><strong style="text-align: left;">SUBTOTAL</strong></td>
                    <td><input style="width: 100px;" type="text" name="sub_total" id="sub_total"  class="form-control" readonly="readonly" value=""></td>
                    <td></td>
                    

                    
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    @foreach($iva as $key)
                    <td align="left"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#bs-example-modal-sm">IVA {{$key->porcentaje}} %</button></td>
                    
                    <td><input style="width: 100px;" type="text" name="domi" id="IVA" class="form-control" readonly="readonly" value=""></td>
                    <input type="hidden" name="iva" id="iva" value="{{$key->porcentaje}}">
                    <td></td>

                    
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="left"><strong>TOTAL</strong></td>
                    <td><input  style="width: 100px;" type="text" name="total" id="monto_total"  class="form-control" readonly="readonly" value="" ></td>
                    <td></td>
                </tr>

             
                        </tbody>

                </table>  



                    
                    <button style="margin-left: 1cm;" class="btn btn-primary" type="submit" id=guardar>Guardar</button>
                  



  
</div>




                                        
<script src="{{ URL::asset('js/feather.min.js')}}"></script>
<script src="{{ URL::asset('js/jquery/dist/jquery.min.js')}}
"></script>
<script src="{{ URL::asset('js/jquery/dist/jquery.maskedinput.js')}}
"></script> 

<script>
function agregarFila(){
  document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<td><input style="width: 100px;" type="text" name="codigo" class="form-control" id="cod" value=""><span id="mensaje2" style="color:red"></span></small></td><td><input style="width: 180px;" type="text" name="nombre" id="nombre" disabled="disabled" class="form-control"  value=""></td><td><input style="width: 100px;" type="text" name="cantidad" id="cantidad" class="form-control"  value=""><span id="mensaje3" style="color:red"></span></small></td><td><input style="width: 100px;" type="text" name="precio" id="precio" disabled="disabled" class="form-control"  value=""></td><td><input style="width: 100px;" type="text" name="importe" id="importe" disabled="disabled" class="form-control"  value=""></td><td><button onclick="eliminarFila()" type="button" class="btn btn-danger btn-sm">-</button></td>';
}

function eliminarFila(){
  var table = document.getElementById("tablaprueba");
  var rowCount = table.rows.length;
  //console.log(rowCount);
  
  if(rowCount <= 1)
    alert('No se puede eliminar el encabezado');
  else
    table.deleteRow(rowCount -1);
}





feather.replace();

      $("#ruf").on('keyup',function (event) {

        //asignar evento a la variable ruf
        var ruf = event.target.value;
   // aignar el valor de ruf a la variable $cliente
    var cliente=$("#ruf").val();
    //si cliente es mayor que 0
    if(cliente>0){
    //envio de datos a la ruta en web
    $.get('/clientes/'+cliente+'/buscar_cliente',function(data){
      //resive el valor data de lo consultado en el controlador

      // asignar a la variable result el valor de data
      var result = data;

    /*  console.log(result);*/

    //si result es menor o igual a 0 mostrar ese  mensaje
      if (result<=0) {

        $("#mensaje").text('Los datos no existen en el registro');

      } else {

        //en el campo nombre ingresar el valor del array nombre
        $('#nomb').val(result[0].nombre);
        //en el campo direccion ingresar el valor del array direccion
        $('#dir').val(result[0].direccion);

        $('#clientes_id').val(result[0].id);

      }
    });
    }else{
      $("#mensaje").text('');
      $("#nomb").val('');
      $("#dir").val('');
    
    }
  });


//Producto
feather.replace();

      $("#cod").on('keyup',function (event) {

        //asignar evento a la variable codigo
        var cod = event.target.value;
   // aignar el valor de codigo a la variable $producto
    var product=$("#cod").val();
    //si producto es mayor que 0
    if(product.length>0){
    //envio de datos a la ruta en web
    $.get('/productos/'+product+'/buscar_producto',function(data){
      //resive el valor data de lo consultado en el controlador

      // asignar a la variable result el valor de data
      var resul = data;



    /*  console.log(result);*/

    //si result es menor o igual a 0 mostrar ese  mensaje
      if (resul<=0) {
        $("#mensaje2").text('Los datos no existen en el registro');


      } else {
        
        $("#mensaje2").text('');

        $('#nombre').val(resul[0].nombre);
        
        $('#precio').val(resul[0].precio);

        $('#productos_id').val(resul[0].id);


        

      
      }
    });
    }else{
      $("#mensaje2").text('');
      $("#nombre").val('');
      $("#precio").val('');
      
    }
  });



  $("#cantidad").on('keyup', function(event){

  var cantidad = event.target.value;
  var cantidad = $("#cantidad").val();

  console.log(cantidad);

  //campo precio por unidad 

  var preciot =$("#precio").val();
  var iva =$("#iva").val();

  console.log(preciot);
   //importe
   var total = cantidad*preciot;
   //sub_total
   var sub_total=total;


   //iva 
   iva=iva*sub_total/100;


   //total
   var monto_total=sub_total+iva;

   //cantidad
   var canti=cantidad;

   console.log(total);

   if (total>0) {
    $('#mensaje3').text('');
    $('#importe').val(total);
    $('#sub_total').val(sub_total);
    $('#IVA').val(iva);
    $('#monto_total').val(monto_total);
    $('#canti').val(canti);
    

   }else{
    $('#mensaje3').text('Debe ingresar la cantidad');
    $('#importe').val('');
    $('#sub_total').val('');
    $('#IVA').val('');
    $('#monto_total').val('');
    $('#canti').val('');
    
   }
   



  });


//=========STOCK DISPONIBLE --------------------------------
    $("#cod").on('keyup',function (event) {
        //asignar evento a la variable ruf
        var cod = event.target.value;
     
    var product = $("#cod").val();
    if(product.length>3){
    $.get('/inventario/'+product+'/buscar_inventario',function(data){
 
      var res = data;

      console.log(res);
    
      if (res<=0) {
        $("#mensaje2").text('No existe es producto registrado');
      } else {
        $("#mensaje2").text('');
        var exis = res[0].existencia;
        var stock_min = res[0].stock_min;

        var nueva_existencia = event.target.value;
        var nueva_existencia=$("#cantidad").val();
   if (nueva_existencia.value > 0) {
    console.log('holaaaaa');
         var rest = parseInt(exis) - parseInt(nueva_existencia);
         console.log(rest);
         if ( rest < 0) {
          $("#mensaje3").text('No hay suficiente cantidad en el inventario');
          $('#guardar').prop('disabled',true);
         }else{   
           $('#guardar').prop('disabled',false);
        }

        }
        
      

    }
    });
    }
  });



    </script>

<div class="modal fade" id="bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mySmallModalLabel">IVA</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <td>% <input type="text" name="porcentaje" value="{{$key->porcentaje}}"></td>

                                                       <button class="btn btn-info" id="other"></button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        @endforeach


 


