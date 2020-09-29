@extends('layouts.app')

@section('css')
<!-- plugin css -->
<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permisos</li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0"></h4>
    </div>
</div>
@endsection

@section('content')

<!-- Breadcomb area Start-->
<div class="breadcomb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="breadcomb-list">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="breadcomb-wp">
								<div class="breadcomb-icon">
									<i class="notika-icon notika-support"></i>
								</div>
								<div class="breadcomb-ctn">
									 <h4 style="text-align: center;" class="header-title mt-0 mb-1">Privilegios</h4>
									<p>Permisos del sistema de cada usuario terreno</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="basic-tb-hd text-center">
                    @if(count($errors))
                    <div class="alert-list m-4">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    @endif
                    @include('flash::message')
                </div>
                <div class="data-table-list">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span><select class="form-control select2" name="id_user" id="id_user">
                                    
                                    @foreach($user as $item)
                                        <option value="{{$item->id}}">{{$item->name}} .- {{$item->email}} .- {{$item->user_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" id="buscar_permisos" class="btn btn-primary">Buscar permisos</button>
                        </div>
                    </div>
                </div>

                <div class="row" id="mostrar_permisos" style="display: none;">
                    <input type="hidden" name="id_usuario_p" id="id_usuario_p">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="normal-table-list mg-t-30">
                                            <div class="basic-tb-hd">
                                                <h2>Permisos - Módulos</h2>
                                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Ver todos los módulos</button>
                                                <span id="notificacion"></span>
                                            </div>
                                            <hr>

                                            <!-- DESPLIEGUE REGISTROS GENERALES -->
                                            <p>
                                                <a class="btn btn-primary" style="width: 100%;" data-toggle="collapse" href="#permisosGenerales" role="button" aria-expanded="false" aria-controls="permisosGenerales">REGISTROS GENERALES</a>
                                              
                                            </p>
                                            <div class="row">
                                              <div class="col">
                                                <div class="collapse multi-collapse" id="permisosGenerales">
                                                  <div class="card">
                                                      <ul class="list-group list-group-flush">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label style="color: green;">Listado </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso1" id="id_permiso1" value="1"></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label style="color:red;">Registrar </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso2" id="id_permiso2" value="2" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label style="color: green;">Modificar</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso3" id="id_permiso3" value="3"  checked></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label style="color:red;">Eliminar</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso4" id="id_permiso4" value="4" ></div></div> </li>
                                                            </div>
                                                        </div>
                                                      </ul>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>

                                            <!-- DESPLIEGUE FACTURAS -->
                                            <p>
                                                <a class="btn btn-success" style="width: 100%;" data-toggle="collapse" href="#permisosFacturas" role="button" aria-expanded="false" aria-controls="permisosFacturas">FACTURAS</a>
                                              
                                            </p>
                                            <div class="row">
                                              <div class="col">
                                                <div class="collapse multi-collapse" id="permisosFacturas">
                                                  <div class="card">
                                                      <ul class="list-group list-group-flush">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Ver </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso5" id="id_permiso5" value="5" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Registrar </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso6" id="id_permiso6" value="6" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Listado</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso7" id="id_permiso7" value="7" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Modificar</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso8" id="id_permiso8" value="8" ></div></div> </li>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label >Eliminar</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso9" id="id_permiso9" value="9" ></div></div> </li>
                                                            </div>
                                                        </div>
                                                      </ul>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>

                                            <!-- DESPLIEGUE USUARIOS -->
                                            <p>
                                                <a class="btn btn-info" style="width: 100%;" data-toggle="collapse" href="#permisosUsuarios" role="button" aria-expanded="false" aria-controls="permisosUsuarios">USUARIOS</a>
                                              
                                            </p>
                                            <div class="row">
                                              <div class="col">
                                                <div class="collapse multi-collapse" id="permisosUsuarios">
                                                  <div class="card">
                                                      <ul class="list-group list-group-flush">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Cambiar Estado </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso10" id="id_permiso10" value="10" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Listado </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso11" id="id_permiso11" value="11" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Registrar </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso12" id="id_permiso12" value="12" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Modificar</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso13" id="id_permiso13" value="13" ></div></div> </li>
                                                            </div>
                                                        
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Eliminar</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso14" id="id_permiso14" value="14" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Cambiar Tipo Usuario</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso15" id="id_permiso15" value="15" ></div></div> </li>
                                                            </div>
                                                        </div>
                                                      </ul>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>

                                            <!-- DESPLIEGUE GRÁFICAS -->
                                            <p>
                                                <a class="btn btn-danger" style="width: 100%;" data-toggle="collapse" href="#permisosGraficas" role="button" aria-expanded="false" aria-controls="permisosGraficas">GRÁFICAS</a>
                                              
                                            </p>
                                            <div class="row">
                                              <div class="col">
                                                <div class="collapse multi-collapse" id="permisosGraficas">
                                                  <div class="card">
                                                      <ul class="list-group list-group-flush">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Ver </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso18" id="id_permiso18" value="18" ></div></div> </li>
                                                            </div>
                                                        </div>
                                                      </ul>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>

                                             <!-- DESPLIEGUE REPORTES -->
                                            <p>
                                                <a class="btn btn-warning" style="width: 100%;" data-toggle="collapse" href="#permisosReportes" role="button" aria-expanded="false" aria-controls="permisosReportes">REPORTES</a>
                                              
                                            </p>
                                            <div class="row">
                                              <div class="col">
                                                <div class="collapse multi-collapse" id="permisosReportes">
                                                  <div class="card">
                                                      <ul class="list-group list-group-flush">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Excel </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso19" id="id_permiso19" value="19" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>PDF </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso20" id="id_permiso20" value="20" ></div></div> </li>
                                                            </div>
                                                        </div>
                                                      </ul>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>

                                             <!-- DESPLIEGUE LIBROS PRINCIPALES -->
                                            <p>
                                                <a class="btn btn-primary" style="width: 100%;" data-toggle="collapse" href="#permisosLibrosP" role="button" aria-expanded="false" aria-controls="permisosLibrosP">LIBROS PRINCIPALES</a>
                                              
                                            </p>
                                            <div class="row">
                                              <div class="col">
                                                <div class="collapse multi-collapse" id="permisosLibrosP">
                                                  <div class="card">
                                                      <ul class="list-group list-group-flush">
                                     <center><label style="color: red;">Inventario </label></center>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Ver </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso21" id="id_permiso21" value="21" ></div></div> </li>
                                                            </div>
                                                        </div>
                                            <center><label style="color: red;">Diario </label></center>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Registrar </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso22" id="id_permiso22" value="22" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Cerrar o Abrir</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso23" id="id_permiso23" value="23" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Ver</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso24" id="id_permiso24" value="24" ></div></div> </li>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Historial</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso25" id="id_permiso25" value="25" ></div></div> </li>
                                                            </div>
                                                        </div>
                                            <center><label style="color: red;">Mayor </label></center>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Ver </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso26" id="id_permiso26" value="26" ></div></div> </li>
                                                            </div>
                                                           
                                                             <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Historial</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso27" id="id_permiso27" value="27" ></div></div> </li>
                                                            </div>
                                                        </div>
                                                      </ul>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>

                                             <!-- DESPLIEGUE OTROS LIBROS -->
                                            <p>
                                                <a class="btn btn-success" style="width: 100%;" data-toggle="collapse" href="#permisosOtrosLibros" role="button" aria-expanded="false" aria-controls="permisosOtrosLibros">OTROS LIBROS</a>
                                              
                                            </p>
                                            <div class="row">
                                              <div class="col">
                                                <div class="collapse multi-collapse" id="permisosOtrosLibros">
                                                  <div class="card">
                                                      <ul class="list-group list-group-flush">
                                    <center><label style="color: red;">Compra - Venta </label></center>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Ver </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso28" id="id_permiso28" value="28" ></div></div> </li>
                                                            </div>
                                                        </div>
                                        <center><label style="color: red;">Caja Chica </label></center>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Listado </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso29" id="id_permiso29" value="29" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Ingreso</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso30" id="id_permiso30" value="30" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Egreso</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso31" id="id_permiso31" value="31" ></div></div> </li>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Busqueda</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso32" id="id_permiso32" value="32" ></div></div> </li>
                                                            </div>
                                                        </div>
                                                      </ul>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>

                                            <!-- DESPLIEGUE BALANCES -->
                                            <p>
                                                <a class="btn btn-info" style="width: 100%;" data-toggle="collapse" href="#permisosBalances" role="button" aria-expanded="false" aria-controls="permisosBalances">BALANCES</a>
                                              
                                            </p>
                                            <div class="row">
                                              <div class="col">
                                                <div class="collapse multi-collapse" id="permisosBalances">
                                                  <div class="card">
                                                      <ul class="list-group list-group-flush">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Ver </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso33" id="id_permiso33" value="33" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Historial </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso34" id="id_permiso34" value="34" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Completar</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso35" id="id_permiso35" value="35" ></div></div> </li>
                                                            </div>
                                                        </div>
                                                      </ul>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- -->

                                            <!-- DESPLIEGUE COTIZACIONES -->
                                            <p>
                                                <a class="btn btn-danger" style="width: 100%;" data-toggle="collapse" href="#permisosCotizaciones" role="button" aria-expanded="false" aria-controls="permisosCotizaciones">COTIZACIONES</a>
                                              
                                            </p>
                                            <div class="row">
                                              <div class="col">
                                                <div class="collapse multi-collapse" id="permisosCotizaciones">
                                                  <div class="card">
                                                      <ul class="list-group list-group-flush">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Listado</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso36" id="id_permiso36" value="36" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Registrar </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso37" id="id_permiso37" value="37" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Eliminar</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso38" id="id_permiso38" value="38" ></div></div> </li>
                                                            </div>
                                                        </div>
                                                      </ul>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>

                                              <!-- DESPLIEGUE OTROS -->
                                            <p>
                                                <a class="btn btn-warning" style="width: 100%;" data-toggle="collapse" href="#permisosOtros" role="button" aria-expanded="false" aria-controls="permisosOtros">OTROS</a>
                                              
                                            </p>
                                            <div class="row">
                                              <div class="col">
                                                <div class="collapse multi-collapse" id="permisosOtros">
                                                  <div class="card">
                                                      <ul class="list-group list-group-flush">
                                        <center><label style="color: red;">Empresa </label></center>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Registrar </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso39" id="id_permiso39" value="39" ></div></div> </li>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Modificar </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso40" id="id_permiso40" value="40" ></div></div> </li>
                                                            </div>
                                                        </div>
                                    <center><label style="color: red;">Configuración </label></center>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Data Base </label></div><div class="col-md-1"><input type="checkbox" name="id_permiso41" id="id_permiso41" value="41" ></div></div> </li>
                                                            </div>
                                                            
                                                        </div>
                                    <center><label style="color: red;">Mi Cuenta </label></center>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <li class="list-group-item"><div class="row"><div class="col-md-11"><label>Ver - Cambiar</label></div><div class="col-md-1"><input type="checkbox" name="id_permiso42" id="id_permiso42" value="42" ></div></div> </li>
                                                            </div>
                                                           
                                                        </div>
                                                      </ul>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                                <div id="not_found" style="display: block;">
                                    <span id="mensaje"></span>
                                </div>



                <!-- SECCIÓN DE PERMISOS --> 
            </div>
        </div>
    </div>
</div>

@include('privilegios.modales.eliminar')
<!-- Data Table area End-->
@endsection


@section('script')

<script type="text/javascript">
    $("#buscar_permisos").on('click',function () {
       //console.log('evento del boton') ;
       var id_user=$("#id_user").val();
       console.log(id_user);
       $("#notificacion").text('');
       $.get('permisos/'+id_user+'/buscar',function (data) {
           //console.log(data.length);
           if (data.length>0) {
            $("#mostrar_permisos").css('display','block');
            $("#not_found").css('display','none');
            var j=0;
            var id_permiso="#id_permiso";
            var permiso="";
            var js="";
            var id_usuario=0;
            for(i=0;i<data.length;i++){
                j++;
                //console.log(data[i].status);
                js=j.toString();
                permiso=id_permiso.concat(js);
                if (data[i].id_privilegio==j && data[i].status=="Si") {
                    $(""+permiso+"").prop('checked',true);
                } else {
                    $(""+permiso+"").prop('checked',false);
                }
                id_usuario=data[i].id_usuario;
            }
            $("#id_usuario_p").val(id_usuario);
           } else {
            $("#not_found").css('display','block');
            $("#mostrar_permisos").css('display','none');
            $("#mensaje").text('No fueron hallados permisos para el usuario seleccionado');
           }
       })
    });
    var j=0;
    var id_permiso="#id_permiso";
    var permiso="";
    var js="";
    for(i=1;i<=42;i++){
        j++;
        //console.log(data[i].status);
        js=j.toString();
        permiso=id_permiso.concat(js);

        $(""+permiso+"").on('change',function (event) {
            var id_usuario=$("#id_usuario_p").val();
            if( $(this).is(':checked') ){
                // console.log($(this).val());
                $.get('permisos/'+$(this).val()+'/1/'+id_usuario+'/actualizando',function (data) {
                    if (data==1) {
                        console.log("Se cambio el permiso a Si");
                        $("#notificacion").css('color','green');
                        $("#notificacion").text("Se ha asignado el permiso exitosamente!!");
                    } else {
                        console.log("No se cambio el permiso a Si");
                    }
                });
            }else{
                $.get('permisos/'+$(this).val()+'/2/'+id_usuario+'/actualizando',function (data) {
                    if (data==1) {
                        $("#notificacion").css('color','green');
                        $("#notificacion").text("Se ha retirado el permiso exitosamente!!");
                    } else {
                        //console.log("No se cambio el permiso a No");
                    }
                });
            }
        });

    }
</script>
<script type="text/javascript">
    function ModalTwo(){
        $('#eliminar_area').modal('hide');
        $('#eliminar_area').on('hidden', function () {
            $('#claverrot').modal('show')
        });
    }
</script>
<script>
function eliminar(id_area) {
    $("#id_area_eliminar").val(id_area);
}
</script>

<script>

    $(function () {
      $('select').each(function () {
        $(this).select2({
          theme: 'bootstrap4',
          width: 'style',
          placeholder: $(this).attr('placeholder'),
          allowClear: Boolean($(this).data('allow-clear')),
        });
      });
    });
</script>


<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/select2/select2.min.js') }}"></script>

@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsley.min.js') }}"></script>
@endsection

