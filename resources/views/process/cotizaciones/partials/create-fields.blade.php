<div class="row">
 <table style="margin-left: 1cm; margin-right: 1cm;" id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
 
            
                             <tr>
                           

                                <th>Fecha</th>
                                <th><input style="width: 160px;" type="date" readonly="readonly" name="fecha" class="form-control"  value="<?php echo date("Y-m-d");?>"  required></th>


                                <?php 

                                use App\cotizacion;

                                $cotizacion=DB::table ('cotizaciones')->select('id')->take(1)->orderBy('id', 'desc')->first();

                                 if($cotizacion) {
                            ?>

                                <th>N° Cotización</th>
                                <th><input style="width: 160px;" type="text" readonly="readonly" name="n_cotizacion" class="form-control" value="0000<?php  echo $cotizacion->id +1; ?>"></th>

                          
                            </tr>
                          <?php }else{
                            ?>
                                
                                <th>N° Cotización</th>
                                <th><input style="width: 160px;" type="text" readonly="readonly" name="n_cotizacion" class="form-control" value="00001"></th>

                                
                            </tr>
                            <?php
                          }?>
                           
                                
                            <tr>

                               
                             <input type="hidden" name="clientes_id" id="clientes_id">  
                                <th>RUT</th>
                                <th><input style="width: 200px;"  type="text" id="ruf" name="rut" class="form-control"  value=""><small><span id="mensaje" style="color:red"></span></small>
                                </th>
                           


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
                              <th>Condiciones de pago</th>
                              <th><select name="c_pago" data-plugin="customselect" class="form-control" data-placeholder="Elige">
                                  
                                  <option value="contado" selected="selected">Contado</option>
                                  <option value=""></option>
                                  <option value=""></option>
                                </select></th>

                                <th>Validez de la oferta</th>
                                <th><select style="width: 50" name="validez" class="form-control">
                                <option value="15" selected="selected">15 días</option>
                                <option value="30">30 días</option>
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

                    <td></td>
                    <td></td>
                    <td></td>
                    <td>SUB TOTAL</td>
                    <td><input  style="width: 100px;" type="text" name="sub_total" id="sub_total"  class="form-control" readonly="readonly" value="" ></td> 
                    <td></td>

                    
                </tr>

                <tr>
                   
                    
                    <td colspan="3"></td>
                    @foreach($descuento as $key)

                    <td align="left"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#bs-example-modal-sm2">DESC  {{$key->porcen}} %</button></td>
                    
                    <td><input style="width: 100px;" type="text" name="descuento" id="descuent" class="form-control" readonly="readonly" value=""></td>
                    
                    <input type="hidden" name="d" id="porcen" value="{{$key->porcen}}">
                    <td></td>

                      @endforeach
                   
                  
              
                </tr>

                <tr>
                   
                    <td></td>
                    <td></td>
                    <td></td>
                    @foreach($iva as $key)

                    <td align="left"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#bs-example-modal-sm">IVA {{$key->porcentaje}} %</button></td>
                    
                    <td><input style="width: 100px;" type="text" name="iva" id="IVA" class="form-control" readonly="readonly" value=""></td>
                    
                    <input type="hidden" name="IVA" id="iva" value="{{$key->porcentaje}}">
                    <td></td>

                      @endforeach
                 

                  
                </tr>

                <tr>
                    
                    <td colspan="3"></td>
                    <td align="left"><strong>TOTAL</strong></td>
                    <td><input  style="width: 100px;" type="text" name="total" id="monto_total"  class="form-control" readonly="readonly" value="" ></td>
                   <td></td>
                  
                </tr>

             
                 </thead>    

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
  var des= $("#porcen").val();

  console.log(cantidad);

  //campo precio por unidad 

  var preciot =$("#precio").val();
  var iva =$("#iva").val();

  console.log(preciot);
   //importe
   var total = cantidad*preciot;
   //sub_total
   var sub_total=total;
    
    var descu=des/100;
  

   //iva 
   iva=iva*sub_total/100;


   //total
   var monto_t=sub_total+iva;

   var descuent=monto_t*descu;

   var monto_total=monto_t-descuent;

   //cantidad
   var canti=cantidad;

   console.log(total);

   if (total>0) {
    $('#mensaje3').text('');
    $('#importe').val(total);
    $('#sub_total').val(sub_total);
    $('#IVA').val(iva);
    $('#monto_total').val(monto_total);
    $('#descuent').val(descuent);
    $('#canti').val(canti);
    

   }else{
    $('#mensaje3').text('Debe ingresar la cantidad');
    $('#importe').val('');
    $('#sub_total').val('');
    $('#IVA').val('');
    $('#monto_total').val('');
    $('#descuent').val('');
    $('#canti').val('');
    
   }
   



  });




    </script>



 


