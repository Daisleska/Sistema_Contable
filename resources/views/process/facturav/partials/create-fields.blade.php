<div class="row">
 <table style="margin-left: 1cm; margin-right: 1cm;" id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
 
            
                             <tr>
                              <input type="hidden" name="clientes_id" id="clientes_id">

                                <th>Fecha</th>
                                <th><input style="width: 160px;" type="date" readonly="readonly" name="fecha" class="form-control"  value="<?php echo date("Y-m-d");?>"  required></th>


                                <?php 

                                use App\facturav;

                                $factura=DB::table ('facturav')->select('n_factura')->take(1)->orderBy('n_factura', 'desc')->first();

                                 if($factura) {
                            ?>

                                <th>N° Factura</th>
                                <th><input style="width: 160px;" type="text" readonly="readonly" name="n_factura" class="form-control" value="000<?php  echo $factura->n_factura +1; ?>"></th>

                          
                            </tr>
                          <?php }else{
                            ?>
                                
                                <th>N° Factura</th>
                                <th><input style="width: 160px;" type="text" readonly="readonly" name="n_factura" class="form-control" value="0001"></th>

                                
                            </tr>
                            <?php
                          }?>
                           
                                
                            <tr>

                               

                                <th><b style="color:red;">*</b>RUT </th>
                                <th><input style="width: 200px;"  type="text" id="ruf" name="rut" class="form-control"  value=""> 
                             
                                <small><span id="mensaje" style="color:red"></span></small>
                                </th>


                                <?php 

                                 if($factura) {
                                ?>

                                <th>N°control</th>
                                <th><input style="width: 160px;" type="text" name="n_control" class="form-control" readonly="readonly" value="000000<?php  echo $factura->n_factura +1; ?>" ></th>
                         
                            </tr>
                             <?php }else{
                            ?>
                              
                              <th>N°control</th>
                                <th><input style="width: 160px;" type="text" name="n_control" class="form-control" readonly="readonly" value="0000001" ></th>



                             </tr>
                            <?php
                          }?>
                           


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
                                <th>Domicilio</th>
                                <th><input style="width: 150px;" type="text" name="domicilio" id="domicilio" class="form-control"  value="" required></th>
                                <th><b style="color:red;">*</b>Forma de pago</th>
                                <th>
                            <select name="f_pago" data-plugin="customselect" class="form-control" data-placeholder="Elige">
                                  
                                  <option value="transferencia" selected="selected">Tranferencia</option>
                                  <option value="efectivo">Efectivo</option>
                                  <option value="cheque">Cheque</option>
                                </select></th>

                                <th><b style="color:red;">*</b>Divisa</th>
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
                                            <tr><th colspan="3" style="text-align: right;">CANTIDAD DE ARTÍCULOS: </th><th colspan="2" ><span id="total"></span></th><input type="hidden" name="total_cantidad" id="total_amount" class="total_amount">
                                            <span id="totalsub"></span><input type="hidden" name="subtotales" id="subtotales"></tr>

                                        </tfoot>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
<div class="row">
       <table style="margin-left: 1cm; margin-right: 1cm;"  class="table dt-responsive nowrap">
                        <thead>


                <tr>
                    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="right"><strong >SUBTOTAL</strong></td>
                    <td><input style="width: 200px;" type="text" name="sub_total" id="sub_total_amount"  class="sub_total_amount form-control" readonly="readonly" value=""></td>
                    <td></td>
                    
                </tr>

                <tr>
                    
                     <td></td>
                    <td></td>
                    <td></td>
                    @foreach($iva as $key)

                    <td align="right"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#bs-example-modal-sm">I.V.A {{$key->porcentaje}}%</button></td>
                    
                    <td><input style="width: 200px;" type="text" name="iva" id="IVA" class="form-control" readonly="readonly" value=""></td>
                    
                    <input type="hidden" name="p_iva" id="iva" value="{{$key->porcentaje}}">
                  

                      @endforeach
              
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="right"><strong>TOTAL</strong></td>
                    <td><input  style="width: 200px;" type="text" name="total" id="monto_total"  class="monto_total form-control" readonly="readonly" value=""></td>
      </tr>

             
                        </tbody>

                </table>  

                    
                    <button style="margin-left: 20cm;" class="btn btn-primary" type="submit" id=guardar>Guardar</button>
                  



  
</div>


<script src="{{ URL::asset('Shreyu/assets/js/app.min.js') }}"></script>
<!-- Plugin js-->
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsley.min.js') }}"></script>

<!-- jQuery CDN -->
<script src="{{ URL::asset('js/jquery/dist/jquery.min.js') }}"></script>

<script src="{{ URL::asset('js/jquery/dist/jquery.maskedinput.js')}}
"></script>


                                        
<script src="{{ URL::asset('js/feather.min.js')}}"></script>

<script>



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

$(document).ready( function(){
    var LineNum=0;
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
                    $("#lista_productos").append('<tr id="Line'+LineNum+'"><td><input type="hidden" name="product_id[]" id="product_id" value="'+ data[i].id + '">' + data[i].nombre +'</td><td>' + data[i].unidad +'</td><td>'+ data[i].precio +'</td><td><input onchange="add_amount(this)" type="number" name="amount[]" class="amount form-control" id="amount" required="required"></td><td><button type="button" onclick="EliminarLinea('+LineNum+','+data[i].id+');"  class="btn btn-danger btn-sm"><i class="m-r-10 mdi mdi-delete"><code class="m-r-10"></code><i class="uil-minus"></i></button></td></tr>');
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

    setInterval("add_amount", 1000);
function add_amount(argument) {
    //console.log(argument.value+"vbnm,");
 var total=0;
 var sub_total= Number($("#subtotales").val());
 /*  console.log(sub_total);*/
 var total_amount=0;
 var IVA_total=0;
 var iva = $("#iva").val();
 var f_total =0;
 var id= $('#products_select').find(':selected').val();

     $.get("/products/"+id+"/add",function (data) {
        
        var precio=data[0].precio;

      var cantidad = argument.value;
  $(".amount").each(function() {
   /* console.log($(this).val()+"dfghjkl");*/
    if (isNaN(parseFloat($(this).val()))) {

       total += 0;
       sub_total += 0;
       total_amount += 0;
       IVA_total += 0;
       f_total += 0;
    } else {

        total += parseFloat($(this).val()); 

    }
  });
        sub_total +=  parseFloat(precio) * parseFloat(cantidad); 
        IVA_total += parseFloat(sub_total) * parseFloat(iva) / 100;
        f_total = parseFloat(sub_total) + parseFloat(IVA_total);    
        console.log(f_total);


var locale = 'de';
var options = { minimumFractionDigits: 2, maximumFractionDigits: 2};
var formatter = new Intl.NumberFormat(locale, options);
//cantidad de productos///
  $(".total_amount").val(total);
  document.getElementById('total').innerHTML = total;
  $(".monto_total").val(formatter.format(f_total));
  document.getElementById('monto_total').innerHTML = f_total;
  $("#subtotales").val(sub_total);
  document.getElementById('totalsub').innerHTML = sub_total;
  $("#IVA").val(formatter.format(IVA_total));
  document.getElementById('IVA').innerHTML = IVA_total;
  $(".sub_total_amount").val(formatter.format(sub_total));
  document.getElementById('sub_total').innerHTML = sub_total;

});



      /*var cantidad= parseFloat($(this).val());*/
}

    </script>


