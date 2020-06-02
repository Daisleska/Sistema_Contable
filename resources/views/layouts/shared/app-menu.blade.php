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

<?php
   $x_empresa=\DB::select('SELECT * FROM empresa ');

  if ($x_empresa) {

   ?>
    <li>
        <a href="{{route('empresa.index')}}">
            <i data-feather="briefcase"></i>
            <span>Empresa</span>
        </a>
    </li>
    <?php }elseif (empty($x_empresa)) { ?>

     <li>
        <a onclick="alert_empresa()">
            <i data-feather="briefcase"></i>
            <span>Empresa</span>
        </a>
    </li>

    <?php } ?>

<?php
   $x_proveedores=\DB::select('SELECT * FROM proveedores ');

  if ($x_proveedores) { ?>
    <li>
        <a href="{{ route('proveedores.index') }}">
            <i data-feather="truck"></i>
            <span> Proveedores </span>
        </a>
   </li>
    <?php }elseif (empty($x_proveedores)) {  ?>
   <li>
        <a href="{{ route('proveedores.create') }}">
            <i data-feather="truck"></i>
            <span> Proveedores </span>
        </a>
   </li>
   <?php } ?>


   <?php
   $x_producto=\DB::select('SELECT * FROM productos ');

  if ($x_producto) {

   ?>
   <li>
        <a href="{{ route('productos.index') }}">
            <i data-feather="clipboard"></i>
            <span> Productos </span>
        </a>
    </li>

    <?php }elseif (empty($x_producto)) {
    ?>
   <li>
        <a href="{{ route('productos.create') }}">
            <i data-feather="clipboard"></i>
            <span> Productos </span>
        </a>
    </li>
    <?php } ?>
    <?php
   $x_clientes=\DB::select('SELECT * FROM clientes ');

  if ($x_clientes) {

   ?>
    <li>
        <a href="{{ route('clientes.index') }}">
            <i data-feather="user-plus"></i>
            <span> Clientes </span>
        </a>
    </li>
<?php }elseif (empty($x_clientes)) { ?>
 <li>
        <a href="{{ route('clientes.create') }}">
            <i data-feather="user-plus"></i>
            <span> Clientes </span>
        </a>
    </li>
  <?php } ?>
  
    <li>
        <a href="{{ route('cuentas.index') }}">
            <i data-feather="plus"></i>
            <span> Cuentas </span>
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
            <span>Compra - Venta</span>
        </a>
    </li>

<?php
   $x=\DB::select('SELECT * FROM cuentas ');

  if ($x) {

   ?>

    <li>
        <a href="{{ route('cajachica.index') }}">
            <i data-feather="book-open"></i>
            <span>Caja Chica</span>
        </a>
    </li>
<?php }elseif (empty($x)) {
         ?>
         <li>
        <a onclick="alert_cajachica() ">
            <i data-feather="book-open"></i>
            <span>Caja Chica</span>
        </a>
    </li>
    <?php } ?>


<?php 
$x_inventario=\DB::select('SELECT * FROM inventario');

if ($x_inventario) {
    ?>
  <li>
        <a href="{{ route('inventario.index') }}">
            <i data-feather="book-open"></i>  
            <span>Inventario</span>
        </a>
    </li>
    <?php }elseif (empty($x_inventario)) {
        ?>
        <li>
        <a onclick="alert_inventario()">
            <i data-feather="book-open"></i>  
            <span>Inventario</span>
        </a>
    </li>
    <?php } ?>
    

    <li>
         <a href="{{ route('diario.index') }}">
            <i data-feather="book-open"></i>
            <span>Diario</span>
        </a>
    </li>

     <li>
         <a href="{{ route('cotizacion.index') }}">
            <i data-feather="file"></i>
            <span>Cotizaciones</span>
        </a>
    </li>

     
     <li class="menu-title">Seguridad</li>
     <li>
        <a href="{{ route('bitacoras.index') }}">
            <i data-feather="activity"></i>
            <span> Bitacora </span>
        </a>
    </li>
  </ul>


  @include('layouts.shared.alertas')