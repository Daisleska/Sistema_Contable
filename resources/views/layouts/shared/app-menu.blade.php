<ul class="metismenu" id="menu-bar">
    <li class="menu-title">Home</li>

    <li>
        <a href="{{ route('home') }}">
            <i data-feather="home"></i>
            <span class="badge badge-success float-right">1</span>
            <span> Inicio </span>
        </a>
    </li>

    <li class="menu-title">Apps</li>
    <li>
        <a href="{{ route('proveedores.index') }}">
            <i data-feather="truck"></i>
            <span> Proveedores </span>
        </a>
    </li>

    <li class="menu-title">Apps</li>
    <li>
        <a href="{{ route('productos.index') }}">
            <i data-feather="clipboard"></i>
            <span> Productos </span>
        </a>
    </li>

    <li class="menu-title">Apps</li>
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
        <a href="">
         <i data-feather="log-in"></i>
            <span> Facturas de Compras </span>
        </a>
    </li>



     
     <li class="menu-title"></li>
     <li>
        <a href="{{ url('backup') }}">
            <i data-feather="book"></i>
            <span> backup </span>
        </a>
    </li>
    
  
    </ul>