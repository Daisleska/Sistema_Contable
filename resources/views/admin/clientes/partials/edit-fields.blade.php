
<style type="text/css">
.abs-center { 
	display: flex; 
	align-items: center; 
	justify-content: center; 
	background-color: #fff;
}
</style>
<style type="text/css">
.rj { 
	display: flex; 
	align-items: center; 
	justify-content: center; 
	background-color: #fff;
}
</style>
<style type="text/css">
.rs { 
	display: flex; 
	align-items: center; 
	justify-content: center;
	background-color: #fff; 
}
</style>
<style type="text/css">
.JG { 
	display: flex; 
	align-items: center; 
	justify-content: center; 
	background-color: #fff;
	min-height: 20vh;
}
</style>
<style type="text/css">
.esp { 
	display: flex; 
	align-items: center; 
	justify-content: center; 
	background-color: #fff;
}
</style>
<style type="text/css">
.ver { 
	display: flex; 
	align-items: center; 
	justify-content: center; 
	background-color: #fff;
</style>
<div class="abs-center">
<div class="row" style="margin-left: 0.3cm;">
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Nombre *</label>
                        <input style="width: 380px; margin-left: 0.3cm; " type="text" value="{{$clientes->nombre}}" name="nombre" id="nombre"  title="Ingrese el nombre" class="form-control">
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>
</div>

<div class="rj">

	<div class="row" style="margin-left: 0.3cm;">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;RUF *</label>
                           <input style="width: 60px; margin-left: 0.3cm; " type="text" name="tipo_documento" id="tipo_documento" title="Ingrese el tipo de documento" value="{{$clientes->tipo_documento}}" required="required" class="form-control">
                            <div class="valid-feedback">
                            </div>
                    </div>
   

  
                <div class="form-group mb-3">
                    <label style="color: white;">...</label>    
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" name="ruf" id="ruf" title="Ingrese el número de documento" value="{{$clientes->ruf}}" required="required" class="form-control">
                        <div class="valid-feedback">
                        </div>

                    </div>
    </div>
	</div>

</div>

<div class="rs">
<div class="row" style="margin-left: 0.3cm;">         
                <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Correo *</label>
                        <input style="width: 380px; margin-left: 0.3cm; " type="email" value="{{$clientes->email}}" name="email" id="email" title="Ingrese el correo" class="form-control">
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
    </div>
</div>

<div class="JG">
<div class="row" style="margin-left: 0.3cm;">
                  <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Dirección *</label>
                        <input style="width: 380px; margin-left: 0.3cm; " type="text" value="{{$clientes->direccion}}" name="direccion" id="direccion" title="Ingrese el correo" class="form-control">
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
    </div>
</div>

<div class="esp">
<div class="row" style="margin-left: 0.3cm;">
                 <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Teléfono *</label>
                        <input style="width: 380px; margin-left: 0.3cm; " type="text" name="telefono" value="{{$clientes->telefono}}"  id="telefono"  title="Ingrese el número de  teléfono" required="required" class="form-control">
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
   </div>
</div>
&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<button style="margin-left: 0.6cm;" class="btn btn-primary" type="submit">Guardar</button>