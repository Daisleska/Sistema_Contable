@extends('layouts.app')

@section('css')
<!-- plugin css -->
<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

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
                                <h4 class="box-title">Ayuda</h4>
                            </center>
      <dir>
                    <a class="btn btn-info" href="{{ URL::asset('uploads/Manual.pdf')}}" class="dropdown-item notify-item">Manual de Usuario<i data-feather="download"></i>
                    </a>
                    <br>
        </dir>
            

                <div class="col-md-10" align="center">
                  <video src="{{ URL::asset('uploads/video.mp4')}}" width="420"  controls></video>       
                </div>
           

          <br> 
          <div>  

          <center>
           <h4 class="box-title">Preguntas y Respuestas</h4>
           </center>
      <button type="button" class="btn btn-link" onclick="Mostrar_Ocultar()">¿Cuando se muestra el Balance de Ganancias y Perdidas?</button>
     
      </div> <br>
<section id="caja" style="width: 400px; height: 200px; display: none;"><p>El Balance de Ganancias y Pérdidas, es un reporte que se emite dos veces al año, en los meses de Junio y Diciembre. Cuando sea la fecha indicada se podrá mostrar un formulario para completar la información requerida, y posteriormente se emitirá el balance del año actual.</p> <br></section>

                     
                     
                       

                
                    </div></div></div>
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
    function Mostrar(){
        document.getElementById("caja").style.display="block";
        
    }

     function Ocultar(){
        document.getElementById("caja").style.display="none";
        
    }

    function Mostrar_Ocultar(){
        var caja= document.getElementById("caja");

        if (caja.style.display == "none") {
            Mostrar();
        }else{
            Ocultar();
        }
    }
</script>