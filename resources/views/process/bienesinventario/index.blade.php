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
                    <table style="color: black;">
    <th style="align-content: right;">                  
<button  type="button" class="btn btn-secondary" data-toggle="modal" title="" data-target="#bs-example-modal-sm1"><i data-feather="plus"></i></button>
                    

                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Descargar
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="" class="dropdown-item notify-item">
                        <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                        <span>PDF</span>
                    </a>
                
                    </div></div>
              

                    </table>
                  <br>
              

                    <table style="border-color: black; border: 1px;  " border="1" id="basic-datatable" class="table dt-responsive nowrap" >
                        <thead>
                            <tr style="color: black;">
                                <th COLSPAN="2" style="text-transform: uppercase; text-align: center;">INVENTARIO DE BIENES PÚBLICOS</th>
                            </tr>
                            <tr>
                                <th COLSPAN="6" style="margin-right: 10cm;"><select name="departamento" id="departamento" data-plugin="customselect" class="form-control" data-placehol class="form-control" data-placeholder="Elige" style="width: 8cm;">
                                    <option selected="selected" disabled="disabled">Seleccione un departamento</option>
                                @foreach($departamento as $key)
                                        
                                        <option value="{{ $key->id }}" id="id">{{ $key->tipo }} de {{ $key->nombre }}</option>
                                @endforeach
     
                                </select>

                               <!--<button type="button" class="btn btn-primary" id="actu">Actualizar</button>-->
                              
                         <table style="border-color: black; border: 1px;  " border="1" class="table"><br>
                        
                                 <thead style="font-size: 12px;" id="thead">
                                     
                                 </thead>
                                 <tbody style="font-size: 12px;" id="tbody">
                                     
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
 <div class="modal fade" id="bs-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm3">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="margin-left: 3cm;" class="modal-title" id="mySmallModalLabel">Asignar a Departamento</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form  action="{{route('bienesinventario.asignar_departamentos')}}" class="needs-validation" method="GET">
                                                    <div class="modal-body">
                                                       
                                                          <th>
                                                            Fecha <input type="date" name="fecha" value="<?php echo date("Y-m-d");?>" readonly="readonly" class="form-control" required="required">

                                                          </th>
                                                          <br>

                                                          <th>
                                                           Departamento <select name="departamento_id" data-plugin="customselect" title="Seleccione el departamento" required="required" class="form-control" data-placeholder=""  >
                                  
                                                           
                                                           @foreach($departamento as $key)
                                                          <option value="{{$key->id}}">{{ $key->tipo}} {{ $key->nombre}}
                                                          </option>


                                                          @endforeach




                                                       </select>
                                                        
                                                          </th>
                                                          <br>
                                                         <th>
                                                        Bienes<select  class="select2 form-control custom-select"  name="bienes_id" id="bienes_select">
                                                        <option selected="selected" disabled="disabled" readonly>Seleccione el Bien</option>
                                                        @foreach($bienes as $key)
                                                        <option value="{{ $key->id }}">{{ $key->codigo }} {{ $key->nombre }}</option>
                                                        @endforeach
                                                         </select>
                                           
                                           </th>
                                           <br> 
                                           <th>
                                            <table id="lista_bienes" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>N° de Ident</th>
                                                <th >Descripción</th>
                                                <th>Opción</th>
                                            </tr>
                                        </thead> 
                                    </table>
                                               
                                           </th>   
                                           <br>           
                                                        
                                                        <div class="modal-footer">
                                                     <button type="button" class="btn btn-dark btn-xs remove-item" data-dismiss="modal">Cerrar</button>
                                                     <button type="submit" id="asignar_bien" class="btn btn-primary btn-xs remove-item">Guardar</button>
                                                     </div>
                                                     </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->



@endsection

@section('script')
<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/multiselect/jquery.multi-select.js') }}"></script>

@endsection

<script src="{{ URL::asset('js/jquery/dist/jquery.min.js') }}"></script>
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/js/pages/form-advanced.init.js') }}"></script>


<script>
$(document).ready( function(){
    var LineNum=0;
    $("#bienes_select").on("change", function (event) {
        var id = event.target.value;


        $.get("/bienes/"+id+"/add",function (data) {
        

           //$("#lista_productos").empty();
       
            
            if(data.length > 0){
                LineNum++;
                for (var i = 0; i < data.length ; i++) 
                {
                    //$('#products_select').children('option[value="'+id+'"]').attr('disabled',true);
                    //$("#lista_productos").append('<tr>'); 
                    //$("#products").removeAttr('disabled');
                    $("#lista_bienes").append('<tr id="Line'+LineNum+'"><td><input type="hidden" name="bienes_id[]" id="bienes_id" value="'+ data[i].id + '">' + data[i].codigo +'</td><td>' + data[i].nombre +'</td><td><button type="button" onclick="EliminarLinea('+LineNum+','+data[i].id+');"  class="btn btn-danger btn-sm"><i class="m-r-10 mdi mdi-delete"><code class="m-r-10"></code><i class="uil-minus"></i></button></td></tr>');
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
</script>




<script>
$(document).ready(function(){
    $("select[name=departamento]").change(function(){
       var departamento= document.getElementById("departamento").value;
        tabla(departamento);
    });
})

    function tabla(departamento){
          
                $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/busquedaAjax/'+departamento+'/buscar',
            type: 'POST',
            success: function(res){ 
               

               var locale = 'de';
                        var options = { minimumFractionDigits: 2, maximumFractionDigits: 2};
                        var formatter = new Intl.NumberFormat(locale, options);
               var cuent=res;
               var tabla;
               var i =0;
               
              
              
                nom='<tr style="color: black;"><th colspan="6" style="text-transform: uppercase;">&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;'+cuent[i].tipo+' de '+cuent[i].nombre+'&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<a href="bienesinven/'+cuent[i].id+'/depart" class="btn btn-info btn-sm" data-toggle="tooltip" title="Inventario"><i data-feather="save"></i></a>&nbsp; &nbsp; &nbsp;&nbsp;<a href="responsablesporuso/'+cuent[i].id+'/acta" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Acta de Asignación"><i data-feather="save"></i></a></th></tr><tr style="color: black;"><th style="text-align: center; text-transform: uppercase;">N° de Ident</th><th style="text-align: center; text-transform: uppercase;">Descripción</th><th style="text-align: center; text-transform: uppercase;">Valor Unitario</th></tr>';


 for (var i =0; i<cuent.length; i++) {


  

tabla+='<tr style="color: black;"><td style="text-align: justify; font-size: 9">'+cuent[i].codigo+'</td><td style="text-align: justify; font-size: 9">'+cuent[i].bien+'</td><td style="text-align: justify; font-size: 9">'+formatter.format(cuent[i].valor_u)+' Bs</td></tr>';

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