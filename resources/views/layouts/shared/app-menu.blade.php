<ul class="metismenu" id="menu-bar">
    <li class="menu-title">Home</li>

    <li>
        <a href="{{ route('home') }}">
            <i data-feather="home"></i>
            <span class="badge badge-success float-right">1</span>
            <span> Inicio </span>
        </a>
    </li>

    <li class="menu-title">Registros</li>
    <li>
        <a href="{{route('empresa.index')}}">
            <i data-feather="briefcase"></i>
            <span>Empresa</span>
        </a>
    </li>
    <li>
        <a href="{{ route('proveedores.index') }}">
            <i data-feather="truck"></i>
            <span> Proveedores </span>
        </a>
   </li>
   <li>
        <a href="{{ route('productos.index') }}">
            <i data-feather="clipboard"></i>
            <span> Productos </span>
        </a>
    </li>
    <li>
        <a href="{{ route('clientes.index') }}">
            <i data-feather="user-plus"></i>
            <span> Clientes </span>
        </a>
    </li>
   
   <li class="menu-title">Facturas</li>
    <li>
        <a href="{{ route('facturav.index') }}">
            <i data-feather="log-out"></i>
            <span> Facturas de Ventas </span>
        </a>
    </li>
    <li>
        <a href="{{ route('facturac.index') }}">
         <i data-feather="log-in"></i>
            <span> Facturas de Compras </span>
        </a>
    </li>

    <li class="menu-title">Libros</li>
    <li>
        <a href="{{ route('compra.index') }}">
            <i data-feather="book-open"></i>  
            <span>Compra</span>
        </a>
    </li>
    <li>
         <a href="{{ route('venta.index') }}">
            <i data-feather="book-open"></i>
            <span>Venta</span>
        </a>
    </li>
    <li>
        <a href="{{ route('cajachica.index') }}">
            <i data-feather="book-open"></i>
            <span>Caja Chica</span>
        </a>
    </li>
    <li>
         <a href="{{ route('diario.index') }}">
            <i data-feather="book-open"></i>
            <span>Diario</span>
        </a>
    </li>

     
     <li class="menu-title">Seguridad</li>
     <li>
        <a href="{{ route('bitacoras.index') }}">
            <i data-feather="truck"></i>
            <span> Bitacora </span>
        </a>
    </li>
  </ul>