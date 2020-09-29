<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        <img src="{{ asset('uploads/avatars/'.Auth::user()->avatar) }}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="{{ asset('uploads/avatars/'.Auth::user()->avatar) }}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">{{ Auth::user()->name }}</h6>
            <span class="pro-user-desc">{{ Auth::user()->user_type }}</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                <a href="{{ route('profile') }}" class="dropdown-item notify-item">
                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                    <span>Mi Cuenta</span>
                </a>
    @if(buscar_p('Empresa','Registrar')=="Si" || buscar_p('Empresa','Modificar')=="Si") 
                       <?php
   $x_empresa=\DB::select('SELECT * FROM empresa ');

  if ($x_empresa) {

   ?>
                <a href="{{route('empresa.index')}}" class="dropdown-item notify-item">
                    <i data-feather="briefcase" class="icon-dual icon-xs mr-2"></i>
                    <span>Empresa</span>
                </a>
     <?php }elseif (empty($x_empresa)) { ?>
                <a onclick="alert_empresa()" class="dropdown-item notify-item">
                    <i data-feather="briefcase" class="icon-dual icon-xs mr-2"></i>
                    <span>Empresa</span>
                </a>
     <?php } ?>
     @endif

      @if(buscar_p('Configuracion','Data Base')=="Si")

                <a href="{{ url('backup') }}" class="dropdown-item notify-item">
                    <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                    <span>Configuración</span>
                </a>
        @endif

         @if(buscar_p('ayuda','Ver')=="Si" )
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                    <span>Ayuda</span>
                </a>
        @endif
                <div class="dropdown-divider"></div>

                <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="preventDefault()">
                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                    <span>Salir</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            @include('layouts.shared.app-menu')
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

<script type="text/javascript">
      function preventDefault(){
       swal({
        icon : "warning",
        title : "¿Esta seguro que desea salir?",
        buttons : {
            cancel: {
                text: "Cancelar",
                value : null,
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: "Salir",
                value: true,
                visible: true,      
            },
             
        },

       }).then(function(confirm){
        if (confirm) {

        document.getElementById('logout-form').submit();
          }
       });

    }
</script>
