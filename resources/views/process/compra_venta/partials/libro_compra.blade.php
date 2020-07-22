 <table class="table dt-responsive nowrap" >
                        <thead>
                           
                            <tr style="color: black;">
                                <th COLSPAN="6" style="text-align: left;">LIBRO DE COMPRAS</th>

                                <th COLSPAN="3">     
                                  <div class="btn-group">

                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Descargar
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                   <a href="{{ route('inventario_view') }}" class="dropdown-item notify-item">
                        <i data-feather="book-open" class="icon-dual icon-xs mr-2"></i>
                        <span>Excel</span>
                    </a>
                    <a href="{{ route('inventario.pdf') }}" class="dropdown-item notify-item">
                        <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                        <span>PDF</span>
                    </a>
                    <a href="javascript:window.print()" class="dropdown-item notify-item">
                        <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                        <span>Imprimir</span>
                    </a>
                </div>
            </div></th>

                            </tr>

                

                            <tr style="color: black; font-size: 10px;">
                               {{--  <th>N°</th> --}}
                                <th>FEC</th>
                                <th>N° FACT.</th>
                                <th>N° CONT</th>
                                <th>PROVEEDOR</th>
                                <th>RUT</th>
                                <th>COMPRAS IVA</th>
                                <th>MONTO B</th>
                                <th>%</th>
                                <th>IMPUEST</th>
                                <th>COMPRAS NO GRAV.</th>
                                <th>TOTAL COMPRA</th>           
                            </tr>
                        </thead>
                    
                    
                        <tbody style="font-size: 10px;">
                           
                      @foreach($compra as $item)
                <tr>
                 
                  {{-- <td>{{ $num++ }}</td> --}}
                  <td>{{$item->fecha}}</td>
                  <td>0{{ $item->n_factura}}</td>
                  <td>0{{ $item->n_control}}</td>
                  <td>{{ $item->nombre}}</td>
                  <td>{{$item->tipo_documento}}-{{$item->ruf}}</td>
                  <td>{{number_format($item->iva, 2,',','.')}}</td>
                  <td>{{number_format($item->sub_total, 2,',','.')}}</td>
                  <td>0,{{$item->p_iva}}</td>
                  <td></td>
                  <td></td>
                  <td>{{number_format( $item->total, 2,',','.')}}</td>
             
             
                
                </tr>

                          @endforeach

                <tr style="color: black;">

                      <th COLSPAN="5" style="text-align: right;">TOTAL:</th>
                      <?php
                      if ($total_total>0) {
                            //TOTALES
                         $total_compra=array_sum($total_total);
                         $sub_total=array_sum($total_subtotal);
                         $iva_total=array_sum($total_IVA);
                      //---------------------------------------
                      }else{
                             //TOTALES
                         $total_compra=0;
                         $sub_total=0;
                         $iva_total=0;
                      //---------------------------------------
                      }
                 
                        ?>


                      <th style="color: black;" >{{number_format( $iva_total, 2,',','.')}}</th>
                      <th style="color: black;" >{{number_format( $sub_total, 2,',','.')}}</th>
                      <th></th>
                      <th></th>
                      <th></th>
                     
                      <th COLSPAN="6" style="color: black;">{{number_format( $total_compra, 2,',','.')}}</th>
                      
                   
                </tr>
           
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