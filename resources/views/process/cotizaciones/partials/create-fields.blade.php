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
                                <th colspan="2"></th>
                           


                            <tr>
                                <th>Nombre</th>
                                <th><input style="width: 350px;" type="text" id="nomb" name="nombre" readonly="readonly" class="form-control"  value="" ></th>
                                <th colspan="2"></th>

                            </tr>
                            <tr>
                                <th>Dirección</th>
                                <th><input style="width: 350px;" type="text" name="direccion" id="dir" readonly="readonly" class="form-control"  value=""></th>
                                <th colspan="2"></th>

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

                                <th>Divisa</th>
                                <th><select style="width: 50" name="divisa" class="form-control">
                                <option value="Bs.S">VEF</option>
                                <option value="£">GBP</option>
                                <option value="¥">JPY</option>
                               <option value="¥">CNY</option>
                               <option value="€">EUR</option>
                               <option selected="selected" value="$">USD</option>
     
                                </select></th>
                            

                            
                            </tr>
                        </thead>
                    
    </table>
</div>
 
                     

<div class="row">
  <button type="button" id="boton" style="margin-left: 1cm;" class="btn btn-info" data-toggle="modal" data-target="#mySmallModalLabel"><i data-feather="plus"></i>Agregar Producto</button>
          <input type="hidden" id="ListaPro" name="ListaPro" value="" required />
       <table style="margin-left: 1cm; margin-right: 1cm;" id="TablaPro" class="table dt-responsive nowrap"><div class="row mb-3">
                           

                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Descripción del producto</th>
                                <th>Cantidad</th>
                                <th>Valor de unidad</th>
                                <th>Importe</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>

     <tbody id="ProSelected">

            </tbody>
              <tfoot>
                                   
                   <tr><th colspan="3"></th><th>SUB TOTAL<span id="total"></span></th><th><input  style="width: 100px;" type="text" name="sub_total" id="sub_total"  class="form-control" readonly="readonly" value="" > </th></tr>

                  @foreach($descuento as $key)
                  <tr><th colspan="3"></th><th><button type="button" class="btn btn-info" data-toggle="modal" data-target="#bs-example-modal-sm2">DESC  {{$key->porcen}}%</button><span></span></th>
                  <th><input style="width: 100px;" type="text" name="descuento" id="descuent" class="form-control" readonly="readonly" value=""></th>

                  <input type="hidden" name="p_des" id="porcen" value="{{$key->porcen}}">
                  @endforeach
                  </tr>

                  @foreach($iva as $key)

                  <tr><th colspan="3"></th><th><button type="button" class="btn btn-info" data-toggle="modal" data-target="#bs-example-modal-sm">I.V.A {{$key->porcentaje}}% </button><span></span></th>
                  <th><input style="width: 100px;" type="text" name="iva" id="IVA" class="form-control" readonly="readonly" value=""></th>
                    
                  <input type="hidden" name="p_iva" id="iva" value="{{$key->porcentaje}}">
                  @endforeach
                  </tr>

                  <tr><th colspan="3"></th><th>TOTAL<span id=""></span></th><th><input  style="width: 100px;" type="text" name="total" id="monto_total"  class="form-control" readonly="readonly" value="" ></th></tr>
                  </tfoot>
                           
                 <tr>

             </td>
                
           </tr>

    </tbody>
  </table>
</div>
                    
                    <button style="margin-left: 1cm;" class="btn btn-info" type="submit" id=guardar>Guardar</button>
                  



  
</div>

<!-- Modal -->
        <div class="modal fade" id="mySmallModalLabel" role="dialog">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" style="text-align: center;">Producto</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                    </div>
                    <div class="modal-body">
                         <div class="form-group">
                               
                             
                                    <th>Código <input type="text" name="cod" class="form-control" id="codi"></th>
                                    <th>Nombre<input type="text" name="nom" id="nom" class="form-control" readonly="readonly"></th>
                                    <th>Precio<input type="text" name="pre" id="pre" class="form-control" readonly="readonly"></th>
                                    <th>Cantidad<input type="text" name="canti" id="canti" class="form-control"></th>
                             
                                    <input type="hidden" name="imp" id="impor">

                                    <input type="hidden" name="productos_id" id="productos_id" value="">


                    <div class="modal-footer">
                        <!--Uso la funcion onclick para llamar a la funcion en javascript-->
                       <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                       <button type="button" onclick="agregarProducto()" id="boton" class="btn btn-info" data-dismiss="modal">Agregar</button>
                    </div>
                </div>

            </div>
        </div>

    </div>


                                        
<script src="{{ URL::asset('js/feather.min.js')}}"></script>
<script src="{{ URL::asset('js/jquery/dist/jquery.min.js')}}
"></script>
 

<script>
     

  //agregar producto
function RefrescaProducto(){
        var ip = [];
        var i = 0;
        $('#guardar').attr('disabled','disabled'); //Deshabilito el Boton Guardar
        $('.iProduct').each(function(index, element) {
            i++;
            ip.push({ id_pro : $(this).val() });
        });
        // Si la lista de Productos no es vacia Habilito el Boton Guardar
        if (i > 0) {
            $('#guardar').removeAttr('disabled','disabled');
        }
        var ipt=JSON.stringify(ip); //Convierto la Lista de Productos a un JSON para procesarlo en tu controlador
        $('#ListaPro').val(encodeURIComponent(ipt));
    }
       function agregarProducto() {

             
            var sel = $('#pro_id').find(':selected').val(); 
            //Capturo el Value del Producto
            var text = $('#pro_id').find(':selected').text();
            //Capturo el Nombre del Producto- Texto dentro del Select
           var cod=document.getElementById("codi").value;
           var nom=document.getElementById("nom").value;
            var pre=document.getElementById("pre").value;
             var cant=document.getElementById("canti").value;
              var impor=document.getElementById("impor").value;
             
            
            var sptext = text.split();
            
            var newtr = '<tr class="item"  data-id="'+sel+'">';

            newtr = newtr + '<td><input style="width: 100px;" type="text" name="codigo[]" disabled="disabled" class="form-control" id="cod" value="'+cod+'"></td>';

            newtr = newtr + '<td><input style="width: 180px;" type="text" name="nombre[]" id="nombre" disabled="disabled" class="form-control"  value="'+nom+'"></td>';
            newtr = newtr + '<td><input style="width: 100px;" type="text" name="cantidad[]" id="cantidad" class="form-control" disabled="disabled" value="'+cant+'"></td>';

            newtr = newtr + '<td><input style="width: 100px;" type="text" name="precio[]" id="precio" disabled="disabled" class="form-control"  value="'+pre+'"></td>';

            newtr = newtr + '<td><input style="width: 100px;" type="text" name="importe[]" id="importe" disabled="disabled" class="form-control"  value="'+impor+'"></td>';

            newtr = newtr + '<td><button type="button" class="btn btn-danger btn-xs remove-item">x</button></td></tr>';
            
            $('#ProSelected').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected

            RefrescaProducto();//Refresco Productos
                
            $('.remove-item').off().click(function(e) {
                $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
                if ($('#ProSelected tr.item').length == 0)
                    $('#ProSelected .no-item').slideDown(300); 
                RefrescaProducto();
            });        
           $('.iProduct').off().change(function(e) {
                RefrescaProducto();
           });
    }

//Producto
feather.replace();

      $("#codi").on('keyup',function (event) {

        //asignar evento a la variable codigo
        var cod = event.target.value;
   // aignar el valor de codigo a la variable $producto
    var product=$("#codi").val();
    //si producto es mayor que 0
    if(product.length>0){
    //envio de datos a la ruta en web
    $.get('/cotizacion/'+product+'/buscar_producto',function(data){
      //resive el valor data de lo consultado en el controlador

      // asignar a la variable result el valor de data
      var resul = data;



    /*  console.log(result);*/

    //si result es menor o igual a 0 mostrar ese  mensaje
      if (resul<=0) {
        $("#mensaje2").text('Los datos no existen en el registro');


      } else {
        
        $("#mensaje2").text('');

        $('#nom').val(resul[0].nombre);

        $('#pre').val(resul[0].precio);

        $('#impor').val(importe);

        $('#productos_id').val(resul[0].id);
      
      }
    });
    }else{
      $("#mensaje2").text('');
      $("#nombre").val('');
      $("#precio").val('');
      $("#impor").val('');

      
    }
  });

//importe

feather.replace();

      $("#canti").on('keyup',function (event) {

        //asignar evento a la variable codigo
        var canti = event.target.value;
   // aignar el valor de codigo a la variable $producto
    var canti=$("#canti").val();
    var preciot=$("#pre").val();
    var importe =canti*preciot;

/*
    if (importe.length = 1) {
     var nuevo_importe =[canti*preciot];
    Array.prototype.push.apply(importe, nuevo_importe);
    console.log(importe);
    }*/
    if (importe>0) {

    $('#impor').val(importe);

    
   }else{
   
    $('#impor').val('');  
   }
  });






$(document).ready(function() {
    $("#boton").click(function(event) {
   
      $("#mySmallModalLabel input").val("");
     
    });
    
  });

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


 
$("#canti").on('keyup', function(event){

  var cantidad = event.target.value;
  var cantidad = $("#canti").val();

  var importe = $("#impor").val();


  var des= $("#porcen").val();

  var x=[];
  x.push(importe);


let to = x.reduce((a, b)=> parseInt(a) + parseInt(b), 0);

  //campo precio por unidad 

   var sub_total = x;

  //var preciot =$("#pre").val();
  var iva =$("#iva").val();

    var descu=des/100;

   //iva 
   iva=iva*sub_total/100;

   //total
   var monto_t=sub_total+iva;

   var descuent=monto_t*descu;

   var monto_total=monto_t-descuent;

   if (monto_t>0) {
    $('#mensaje3').text('');
    $('#sub_total').val(sub_total);
    $('#IVA').val(iva);
    $('#monto_total').val(monto_total);
    $('#descuent').val(descuent);

    

   }else{
    $('#mensaje3').text('Debe ingresar la cantidad');
    $('#sub_total').val('');
    $('#IVA').val('');
    $('#monto_total').val('');
    $('#descuent').val('');
   
    
   }

  });
    </script>



 


