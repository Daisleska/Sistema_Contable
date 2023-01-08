<ul class="metismenu" id="menu-bar">
    <li class="menu-title">Home</li>

    <li>
        <a href="{{ route('home') }}">
            <i data-feather="home"></i>
            <span class="badge badge-info float-right">5</span>
            <span> Inicio </span>
        </a>
    </li>

    <li class="menu-title">Registros</li>

  <li>
   @if(buscar_p('Registros Generales','Listado')=="Si" || buscar_p('Registros Generales','Registrar')=="Si")
     <a href="javascript: void(0);">
            <i data-feather="edit"></i>
            <span> Registros Generales </span>
            <span class="menu-arrow"></span>
        </a>
     @endif
        <ul class="nav-second-level" aria-expanded="false">


<?php
   $x_empleado=\DB::select('SELECT * FROM empleado');

  if ($x_empleado) { ?>
    <li>
        <a href="{{ route('empleado.index') }}">
            <i data-feather="clipboard"></i>
            <span> Empleados </span>
        </a>
   </li>
    <?php }elseif (empty($x_empleado)) {  ?>
   <li>
        <a href="{{ route('empleado.create') }}">
            <i data-feather="clipboard"></i>
            <span> Empleados </span>
        </a>
   </li>
   <?php } ?>


   <?php
   $x_cargos=\DB::select('SELECT * FROM cargos');

  if ($x_cargos) { ?>
    <li>
        <a href="{{ route('cargos.index') }}">
            <i data-feather="clipboard"></i>
            <span> Cargos </span>
        </a>
   </li>
    <?php }elseif (empty($x_cargos)) {  ?>
   <li>
        <a href="{{ route('cargos.create') }}">
            <i data-feather="clipboard"></i>
            <span> Cargos </span>
        </a>
   </li>
   <?php } ?>


<?php
   $x_bienes=\DB::select('SELECT * FROM bienes');

  if ($x_bienes) { ?>
    <li>
        <a href="{{ route('bienes.index') }}">
            <i data-feather="clipboard"></i>
            <span> Bienes </span>
        </a>
   </li>
    <?php }elseif (empty($x_bienes)) {  ?>
   <li>
        <a href="{{ route('bienes.create') }}">
            <i data-feather="clipboard"></i>
            <span> Bienes </span>
        </a>
   </li>
   <?php } ?>



<?php
   $x_departamento=\DB::select('SELECT * FROM departamento');

  if ($x_departamento) { ?>
    <li>
        <a href="{{ route('departamento.index') }}">
            <i data-feather="clipboard"></i>
            <span> Departamentos </span>
        </a>
   </li>
    <?php }elseif (empty($x_departamento)) {  ?>
   <li>
        <a href="{{ route('departamento.create') }}">
            <i data-feather="clipboard"></i>
            <span> Departamentos </span>
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
        </ul>
  </li>


 @if(buscar_p('Facturas','Listado')=="Si" || buscar_p('Facturas','Registrar')=="Si")
   <li class="menu-title">Facturas</li>

   <li>
      <a href="javascript: void(0);">
            <i data-feather="file-text"></i>
            <span>Facturas</span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="nav-second-level" aria-expanded="false">
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
        </ul>
   </li>
  @endif

   <li class="menu-title">Talento Humano</li>

   <li>
      <a href="javascript: void(0);">
            <i data-feather="file-text"></i>
            <span> </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="nav-second-level" aria-expanded="false">
           <li>
        <a href="{{ route('contratos.index') }}">
            <i data-feather="log-out"></i>
            <span> Contratos </span>
        </a>
    </li>
    <li>
        <a href="{{route('resoluciones.index')}}">
         <i data-feather="log-in"></i>
            <span> Resoluciones </span>
        </a>
    </li>
        </ul>
   </li>


    <li class="menu-title">Libros Principales</li>

    <li>
      <a href="javascript: void(0);">
            <i data-feather="book"></i>
            <span>Libros Principales</span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="nav-second-level" aria-expanded="false">
@if(buscar_p('Inventario','Ver')=="Si")
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
@endif

@if(buscar_p('Diario','Ver')=="Si" || buscar_p('Diario','Registrar')=="Si")
    <li>
         <a href="{{ route('diario.index') }}">
            <i data-feather="book-open"></i>
            <span>Diario</span>
        </a>
    </li>
@endif

 @if(buscar_p('Mayor','Ver')=="Si")
    <li>
         <a href="{{ route('mayor') }}">
            <i data-feather="book-open"></i>
            <span>Mayor</span>
        </a>
    </li>
@endif
        </ul>
    </li>

<li>
   <a href="javascript: void(0);">
            <i data-feather="book-open"></i>
            <span>Otros Libros</span>
            <span class="menu-arrow"></span>
        </a>
  <ul class="nav-second-level" aria-expanded="false">
    @if(buscar_p('Compra Venta','Ver')=="Si")
     <li>
        <a href="{{ route('compra.index') }}">
            <i data-feather="book-open"></i>  
            <span>Compra - Venta</span>
        </a>
    </li>
    @endif
 @if(buscar_p('Caja Chica','Listado')=="Si")
<?php
   $x=\DB::select('SELECT * FROM cuentas WHERE nombre="Caja Chica" OR nombre="Caja" ');
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
@endif
        </ul>
</li>

 @if(buscar_p('Balances','Ver')=="Si" )
<?php
   $b=\DB::select('SELECT * FROM diario WHERE estado="Abierto"');

  if ($b) { 
    ?>
    <li>
         <a href="{{ route('balances.index') }}">
            <i data-feather="bold"></i>
            <span>Balances</span>
        </a>
    </li>
  <?php }elseif (empty($b)) { ?>
  <li>
         <a onclick="alert_balance()">
            <i data-feather="bold"></i>
            <span>Balances</span>
        </a>
    </li>
  <?php } ?>   
@endif
@if(buscar_p('Cotizaciones','Listado')=="Si")
     <li>
         <a href="{{ route('cotizacion.index') }}">
            <i data-feather="file"></i>
            <span>Cotizaciones</span>
        </a>
    </li>
@endif


     <li class="menu-title">Seguridad</li>
  @if($user_type == "Administrador" || $user_type == "SuperUser")
     <li>
        <a href="{{ route('privilegios.index') }}">
            <i data-feather="edit"></i>
            <span> Privilegios </span>
        </a>
    </li>
  @endif
    
 @if(buscar_p('Bitacora','Ver')=="Si")
     <li>
        <a href="{{ route('bitacoras.index') }}">
            <i data-feather="activity"></i>
            <span> Bitacora </span>
        </a>
    </li>
@endif

   @if(buscar_p('ayuda','Ver')=="Si" )
      <li class="menu-title">Ayuda</li>
       <li>
          <a href="{{ route('ayuda.index') }}">
              <i data-feather="help-circle"></i>
              <span>Ayuda</span>
          </a>
      </li>
   @endif
 </ul>


@include('layouts.shared.alertas')