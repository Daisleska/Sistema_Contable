@extends('layouts.app')

@section('css')
<!-- plugin css -->

<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('Shreyu/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('Shreyu/assets/libs/multiselect/multi-select.css') }}" rel="stylesheet" type="text/css" />

<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumb')

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Shreyu</a></li>
                <li class="breadcrumb-item"><a href="">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Advanced</li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0"></h4>
    </div>
</div>
@endsection

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1"></h4>
                    <table style="color: black;">
                      <?php
                      use App\empresa;

  $empresa=DB::table ('empresa')->select('nombre', 'tipo_documento','ruf')->get();

                       
                      foreach($empresa as $key){
                        ?>
                        <tr >
                            <th>NOMBRE DE LA EMPRESA:</th>
                            <th><?php echo e($key->nombre)?></th>
                        </tr>
                        <tr>
                            <th>MES:
                            <script style="text-align: right;" type="text/javascript">document.write("" + months[month] + " " + year);</script></th>
                        </tr>
                        <tr>
                            <th>RUT:
                            <?php echo e($key->tipo_documento)?>-<?php echo e($key->ruf)?></th>
                         <?php
                        }
                        ?>
                    </tr>

                    <th style="align-content: right;">

                       <div class="btn-group">                           
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Descargar
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                   <a href="#" class="dropdown-item notify-item">
                        <i data-feather="book-open" class="icon-dual icon-xs mr-2"></i>
                        <span>Excel</span>
                    </a>
                    <a href="#" class="dropdown-item notify-item">
                        <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                        <span>PDF</span>
                    </a>
                    <a href="javascript:window.print()" class="dropdown-item notify-item">
                        <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                        <span>Imprimir</span>
                    </a>
                
                    </div></div></th>
                  </tr>

                    </table>
                  <br>
              

                    <table style="border-color: black; border: 1px;  " border="1" id="basic-datatable" class="table dt-responsive nowrap" >
                        <thead>
                            <tr style="color: black;">
                                <th COLSPAN="2" style="text-align: center;">LIBRO MAYOR</th>
                            </tr>
                            <tr>
                                <th COLSPAN="6" style="margin-right: 10cm;"><select name="cuenta" id="cuenta" data-plugin="customselect" name="tipo" class="form-control" data-placehol class="form-control" data-placeholder="Elige" style="width: 8cm;">
                                    <option selected="selected" disabled="disabled">Seleccione una cuenta</option>
                                @foreach($cuentas as $key)
                                        
                                        <option value="{{ $key->id }}" id="id">{{ $key->nombre }}</option>
                                @endforeach
     
                                </select>

                               <!--<button type="button" class="btn btn-primary" id="actu">Actualizar</button>-->
                              
                        <table style="border-color: black; border: 1px;  " border="1" class="table"><br>
                        
                                 <thead id="thead">
                                     
                                 </thead>
                                 <tbody id="tbody">
                                     
                                 </tbody>
                             </table></th>
                         </tr>
                        </thead>
                          


                          
                             
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

<!-- llamado al Modak----->


@endsection

<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/multiselect/jquery.multi-select.js') }}"></script>
<script src="{{ URL::asset('js/jquery/dist/jquery.min.js') }}"></script>



<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/js/pages/form-advanced.init.js') }}"></script>


<script type="text/javascript">

function makeArray() {
for (i = 0; i<makeArray.arguments.length; i++)
this[i + 1] = makeArray.arguments[i];}
var months = new makeArray('Enero','Febrero','Marzo','Abril','Mayo',
'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;

//]]>
</script>
<script>
$(document).ready(function(){
    $("select[name=cuenta]").change(function(){
       var cuenta= document.getElementById("cuenta").value;
        tabla(cuenta);
    });
})

    function tabla(cuenta){
          
                $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/busquedaAjax/'+cuenta+'/buscar',
            type: 'POST',
            success: function(res){
               
               //res me trae 3 arreglos, para acceder a cada uno por separado utilizo el punto (.)
                console.log(res.cuen);
                console.log(res.buscar);
                console.log(res.buscar2);
                var cuent=res.cuen;
                var buscar=res.buscar;
                var bus=res.buscar2;
                var debe =[];
                var haber =[];
                var tabla;

 
                nom='<tr style="color: black;"><th colspan="6"><span style=" color: black;" id="titulo_cuenta"></span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;'+cuent[0].nombre+' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N°'+cuent[0].codigo+'</th></tr><tr style="color: black;"><th style="text-align: center;">Debe</th><th style="text-align: center;">Haber</th></tr>';
                
                //como el debe y haber vienen separado necesito saber quien es mayor para mediante un ciclo recorrerlo y así se puedan mostrar todos los datos 

                //compruebo a traves de su longitud  
                if (buscar.length < bus.length) {
                //recorro el ciclo con el mayor
                for (var i = 0; i < bus.length; i++) {
                //como bus es el mayor, quiere decir que hay más haber que debe, entonces mientras i sea menor a buscar (debe), se mostraran uno de cada uno
                    if (i < buscar.length ) {
                       //codigo JavaScript para formatear los montos//
                        var d =buscar[i].debe;
                        var h =bus[i].haber;
                        
                        var locale = 'de';
                        var options = { minimumFractionDigits: 2, maximumFractionDigits: 2};
                        var formatter = new Intl.NumberFormat(locale, options);
                        //________________________________________________//

                    //Muestro en la tabla 
                     tabla+= '<tr><td style="text-align: center;">'+formatter.format(d)+'</td><td style="text-align: center;">'+formatter.format(h)+'</td></tr>';
                     //Guardo en el array para luego sumar y tener los totales y saldo    
                        debe[i]=buscar[i].debe;
                        haber[i]=bus[i].haber;


                    } else {
                        //Aquí es cuando ya no hay debe y solo quedan haber, para que se muestre solo el ultimo mencionado  

                        //codigo JavaScript para formatear los montos//
                        var h =bus[i].haber;
                        
                        var locale = 'de';
                        var options = { minimumFractionDigits: 2, maximumFractionDigits: 2};
                        var formatter = new Intl.NumberFormat(locale, options);
                        //_________________________________________________//

                        tabla+= '<tr><td style="text-align: center;"></td><td style="text-align: center;">'+formatter.format(h)+'</td></tr>';
                       
                        haber[i]=bus[i].haber;
                       

                    }



                
                }//Fin del primer ciclo 
                        
                        //codigo JavaScript para formatear los montos//
                        var locale = 'de';
                        var options = { minimumFractionDigits: 2, maximumFractionDigits: 2};
                        var formatter = new Intl.NumberFormat(locale, options);
                        //________________________________________________//

                //Totales: suma los arreglos del debe y del haber 
                if (debe.length >0) { 
                // Funcion JavaScript para sumar array
                var saldod=(new Function("return " +debe.join('+')))();
                tabla+= '<tr><th  style="text-align: center; color:black;">'+formatter.format(saldod)+'</th>';

                }else{
                //En caso que este vacio 
                var saldod=0;
                tabla+= '<tr><th style="text-align: center;"></th>';
                }
                

                //Lo mismo que en el debe obvio
                if (haber.length >0) { 
                var saldoh=(new Function("return " +haber.join('+')))();
                tabla+= '<th style="text-align: center; color:black; ">'+formatter.format(saldoh)+'</th></tr>';
                }else{
                var saldoh=0;
                tabla+= '<th style="text-align: center;"></th></tr>';
                }
 
                
                
                $('#tbody').html(tabla);
                

                //Fin del primer If
                }else {

                //Aquí se recorrera buscar porque es el array que trae más 

                for (var i = 0; i < buscar.length; i++) {
                //El principio del ciclo... 
                
                //
                if (i < bus.length) {
                //como buscar es el mayor, quiere decir que hay más debe que haber, entonces mientras i sea menor a bus (haber), se mostraran uno de cada uno
                        //codigo JavaScript para formatear los montos//
                        var d =buscar[i].debe;
                        var h =bus[i].haber;
                        
                        var locale = 'de';
                        var options = { minimumFractionDigits: 2, maximumFractionDigits: 2};
                        var formatter = new Intl.NumberFormat(locale, options);
                        //____________________________________________________//

                    //Se muestran y se guardan en el array
                    tabla+= '<tr><td style="text-align: center;">'+formatter.format(d)+'</td><td style="text-align: center;">'+formatter.format(h)+'</td></tr>';
                        
                        debe[i]=buscar[i].debe;
                        haber[i]=bus[i].haber;

                        

                    } else{

                        //Aquí es cuando ya no hay haber y solo quedan debe, para que se muestre solo el ultimo mencionado  

                        //codigo JavaScript para formatear los montos//
                         var d =buscar[i].debe;
                        
                        var locale = 'de';
                        var options = { minimumFractionDigits: 2, maximumFractionDigits: 2};
                        var formatter = new Intl.NumberFormat(locale, options);
                        //_____________________________________________________//

                    tabla+= '<tr><td style="text-align: center;">'+formatter.format(d)+'</td><td style="text-align: center;"></td></tr>';

                     debe[i]=buscar[i].debe;
                    

                    }


                }
                
                
                        //codigo JavaScript para formatear los montos//
                        var locale = 'de';
                        var options = { minimumFractionDigits: 2, maximumFractionDigits: 2};
                        var formatter = new Intl.NumberFormat(locale, options);
                        //____________________________________________________// 
                

                //Esto es lo de totales que es lo mismo de arriba pero para otra condición 
                if (debe.length >0) {  
                var saldod=(new Function("return " +debe.join('+')))();
                tabla+= '<tr><th  style="text-align: center; color:black;">'+formatter.format(saldod)+'</th>';
                }else{
                var saldod=0;
                tabla+= '<th><td style="text-align: center;"></th>';
                }
            
                if (haber.length >0) { 
                var saldoh=(new Function("return " +haber.join('+')))();
                tabla+= '<th  style="text-align: center; color:black;">'+formatter.format(saldoh)+'</th></tr>';
                }else{
                var saldoh=0;
                tabla+= '<th style="text-align: center;"></th></tr>';
                }
 
                //Esto es para el saldo 

                if (cuent[0].tipo=="activo" || cuent[0].tipo=="egreso") {

                    //Aquí van los activos, egresos...
                    //Para el saldo del activo, el saldo debe tiene que ser mayor que el saldo haber
                    if (saldod>saldoh) {

                        //se realiza la resta y se muestra dando un saldo positivo 
                        var saldo=saldod-saldoh;
               
                        tabla+= '<tr><th style="text-align: center; color: black;">'+formatter.format(saldo)+'</th><th style="text-align: center; color: black;"></th></tr>';


                    }else {
                        //Esto dara un saldo negativo (error), por ello se emite el mensaje 

                        tabla+= '<tr><th style="text-align: center; color: black;">saldo credito revisar</th><th style="text-align: center; color: black;"></th></tr>';
                    }

                    $('#tbody').html(tabla);

                }else {

                    //Aquí entran los pasivos, patrimonios...
                    //Para el saldo del pasivo, el saldo haber tiene que ser mayor que el saldo debe

                  if (saldoh>saldod) {
                        
                         //se realiza la resta y se muestra dando un saldo positivo 
                        var saldo=saldoh-saldod;

                        tabla+= '<tr><th style="text-align: center; color: black;"></th><th style="text-align: center; color: black;">'+formatter.format(saldo)+'</th></tr>';

                    }else{

                        //Esto dara un saldo negativo (error), por ello se emite el mensaje 
                        
                        tabla+= '<tr><th style="text-align: center; color: black;"></th><th style="text-align: center; color: black;">saldo debito revisar</th></tr>';
                      

                    }
                    
                    $('#tbody').html(tabla);

                }
               
                 $('#tbody').html(tabla);
                }




                
                $('#thead').html(nom);


                
               
            }

        });
    }
/*    $('#actu').click(function(){
        tabla();
    });*/
</script>

