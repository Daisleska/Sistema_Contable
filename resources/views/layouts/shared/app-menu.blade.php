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
            <i data-feather="book"></i>
            <span> Proveedores </span>
        </a>
    </li>
     <li>
        <a href="{{ url('backup') }}">
            <i data-feather="book"></i>
            <span> backup </span>
        </a>
    </li>
    
  
    </ul>