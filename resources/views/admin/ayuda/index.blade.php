@extends('layouts.app')

@section('css')
<!-- plugin css -->
<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<style type="text/css">
    .titulo_boton {
  float:left; 
  padding:5px;  
  background-color:#e6e6e6;
  width:300px;
  font-family:helvetica;
  font-size:13px;
  font-weight:bold;
}
.boton_mostrar {
  float:right;
  font-size:12px;
  line-height:20px;
  color:#DE7217;
}

</style>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-container navbar-wrapper">
    </div>

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-12">
                                <div class="page-header-breadcrumb">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <!-- Page body start -->
      <div class="page-body">
                       <!-- Zero config.table start -->
      <div class="card">
      <div class="card-body">
                                



                            <center>
                              <br>
                                <h4 style="text-align: center;" class="header-title mt-0 mb-1">AYUDA</h4>
        <!--manual-->                   </center>
        <div>
                    <a class="btn btn-info" href="{{ URL::asset('uploads/Manual.pdf')}}" class="dropdown-item notify-item">Manual de Usuario<i data-feather="download"></i>
                    </a>
                    <br>
        </div>
         <hr>    
        
        <!--video--> 
                <div class="col-md-10" align="center">
                  <video src="{{ URL::asset('uploads/video.mp4')}}" width="420"  controls></video>       
                </div>
           

         <!--preguntas-->  
          <hr>
          <center>
            <br>
           <h4 style="text-align: center;" class="header-title mt-0 mb-1">Preguntas Frecuentes</h4>
           </center>
      <br><br>

                     
                     
                       

<div class="titulo_boton" style="margin-right: 1cm; margin-left: 3cm;" >
    
  <a style='cursor: pointer; text-align: center;' onClick="muestra_oculta('contenido')" title="" class="boton_mostrar">¿Cuándo se muestra el Balance de Ganancias y Pérdidas?</a>


<div id="contenido" style="display: none; background: white; width: 290px;float:left; clear:both; border:2px solid #e6e6e6; margin-top:2px; padding:5px; overflow:auto; font-family:helvetica; font-size:14px; text-align: justify;">
<p style="text-align: center;">El Balance de Ganancias y Pérdidas, es un reporte que se emite dos veces al año, en los meses de Junio y Diciembre. Cuando sea la fecha indicada se podrá mostrar un formulario para completar la información requerida, y posteriormente se emitirá el balance del año actual.</p>
</div> 

</div>


<div class="titulo_boton" style="margin-right: 1cm;" >
    
  <a style='cursor: pointer; text-align: center;' onClick="muestra_oculta('d')" title="" class="boton_mostrar">¿Se puede abrir el Libro Diario luego de haberlo cerrado?</a>


<div id="d" style="display: none; background: white; width: 290px;float:left; clear:both; border:2px solid #e6e6e6; margin-top:2px; padding:5px; overflow:auto; font-family:helvetica; font-size:14px; text-align: justify;">Nooooo</p>
</div> 

</div>



</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>



@endsection

@section('script')

<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>


@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
@endsection


<script type="text/javascript">
    

function muestra_oculta(id){
if (document.getElementById){ //se obtiene el id

var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
}
}
window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
muestra_oculta(el);/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
}
</script>

