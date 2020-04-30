 <table id="buscar" class="table dt-responsive nowrap" >
                        <thead>
                           
                            <tr style="color: black;">
                                <th COLSPAN="8" style="text-align: center;">LIBRO DE COMPRAS</th>
                                <th COLSPAN="8" style="text-align: left;">MES:{{$mesactual}}</th>
                            </tr>

                <div class="row">
                    <div class="col-md-3">
                      <input type="date" id="dia" name="dia" class="form-control">
                    </div>

                    <div class="col-md-2">
                      <select id="mes" name="mes" class="form-control">
                        <option readonly >Mes</option>
                      @foreach($meses as $mes)
                          <option value="{{$x++}}">
                            {{$mes}}
                           </option> 
                           @endforeach
                      </select>
                    </div>

                    <div class="col-md-2">
                      <select id="anio" name="anio" class="form-control">
                        <option disabled="disabled" selected="selected">Año</option>
                        <?php for ($i=2018; $i <=2030; $i++) { ?>
                          <option value="{{$i}}">
                            {{$i}}
                           </option> 
                           <?php } ?>
                      </select>
                    </div>
                    <button class="btn btn-primary" onclick="buscador();">Buscar</button>
                </div>
              

                            <tr style="color: black;">
                                <th>N° OPE.</th>
                                <th>FECHA</th>
                                <th>N° FACT.</th>
                                <th>N° CONTROL</th>
                                <th>PROVEEDOR</th>
                                <th>RUT</th>
                                <th>COMPRAS IVA</th>
                                <th>MONTO B</th>
                                <th>%</th>
                                <th>IMPUEST</th>
                                <th>COMPRAS NO GRAV.</th>
                                <th>TOTAL COMPRAS</th>           
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                           
                      @foreach($compra as $item)
                <tr>
                  <?php $x=1;?>
                  <td>{{ $x++ }}</td>
                  <td>{{ $item->fecha}}</td>
                  <td>000{{ $item->n_factura}}</td>
                  <td>{{ $item->n_control}}</td>
                  <td>{{ $item->nombre}}</td>
                  <td>{{$item->tipo_documento}}-{{$item->ruf}}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>{{number_format( $item->total, 2,',','.')}}</td>
             
             
                
                </tr>
                <tr style="color: black;">
                
                      <th COLSPAN="5" style="text-align: right;">TOTAL COMPRAS $</th>
                     
                      <td COLSPAN="7"></td>
                      
                   
                </tr>
           
                          @endforeach
                             </tbody>
                    </table>

  <script type="text/javascript">
   function buscador(){
      $(document).ready(function(){
        $("select[name=mes]").change & $("select[name=anio]").change & $("input[name=dia]").change(function(){
          var mes =$('select[name=mes]').val();
          var anio =$('select[name=anio]').val();
          var dia =$('input[name=dia]').val();      
          console.log(mes);
          console.log(anio);
          console.log(dia);

       $.get('/compras/'+mes+'/'+anio+'/'+dia+'/buscador',function(data)
      {
        var result = data;
        console.log(result);

       });
        });
       /**/

      })
    }



   /*  $("select[name=anio]").change(function(){
          var anio =$('select[name=anio]').val();  
        console.log(anio);
        });

         $("input[name=dia]").change(function(){
          var dia =$('input[name=dia]').val();
          
          console.log(dia);
        });*/





     /*   jQuery=result.val().keyup(function(){
      if ( result(this).val() != "") {
        jQuery("#buscar tbody>tr").hide();
        jQuery("#buscar td:contiene-data('" + jQuery(this).val() + "')").parent("tr").show();
      }
      else{
        jQuery("#buscar tbody>tr").show(); 
      }
    });

      Jquery.extend(Jquery.expr[":"],
      {
        "contiene-data":function(elem,i,match,array){
          return (elem.textContent || elem.innerText || Jquery(elem).text() || "").toLowerCase().indexOF((match[3] ||"").toLowerCase()) >=0;
        }

      });*/
  </script>