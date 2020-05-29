
<style type="text/css">
.abs-center { 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    background-color: #fff;
    min-height: 20vh;
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
}
</style>
<style type="text/css">
.barsa { 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    background-color: #fff;
}
</style>
<style type="text/css">
.city { 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    background-color: #fff;
}
</style>
<div class="abs-center">
    <div class="row" style="margin-left: 0.3cm;">
<div class="form-group mb-3">
                    <label style="margin-left: 0.3cm;">&ensp;&ensp;Código *</label>
                        <input style="width: 380px; margin-left: 0.3cm;" type="text" name="codigo" class="form-control"  value="{{ old('codigo') }}" placeholder="CA08" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>

</div>

<div class="rj">
    <div class="row" style="margin-left: 0.3cm;">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Nombre *</label>
                        <input style="width: 380px; margin-left: 0.3cm;" type="text" name="nombre" class="form-control"  value="{{ old('nombre') }}" placeholder="Landing Page" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>


</div>

<div class="rs">
<div class="row" style="margin-left: 0.3cm;">
                    
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Descripción *</label>
                        <input style="width: 380px; margin-left: 0.3cm;" type="text"  name="descripcion" class="form-control"  value="{{ old('descripcion') }}" placeholder="" required>
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>

</div>

<div class="JG">
<div class="row" style="margin-left: 0.3cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Existencia *</label>
                        <input style="width: 380px; margin-left: 0.3cm;" type="text" class="form-control"  name="existencia" value="{{ old('existencia') }}" placeholder="" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>
</div>
<div class="esp">
<div class="row" style="margin-left: 0.3cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Unidad *</label>
                       
                        <select style="width: 380px; margin-left: 0.3cm;" class="form-control"  name="unidad">
                                    <option>Seleccione</option>
                                    <optgroup label="Seleccione una unidad">
                                        <option value="Caja">Caja</option>
                                        <option value="Bulto">Bulto</option>
                                        <option value="Saco">Saco</option>
                                        <option value="M3">M3</option>
                                        <option value="Resma">Resma</option>
                                        <option value="Paquete">Paquete</option>
                                        <option value="kilo">kilo</option>
                                        <option value="Barril">Barril</option>
                                        <option value="Litros">Litros</option>
                                        <option value="Individual">Individual</option>
                                    </optgroup>
                                </select>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>
</div>
<div class="ver">
<div class="row" style="margin-left: 0.3cm;">


                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Precio *</label>
                        <input style="width: 380px; margin-left: 0.3cm;" type="text" class="form-control" name="precio" value="{{ old('precio') }}" placeholder="200.800,00" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>
</div>

<div class="barsa">
<div class="row" style="margin-left: 0.3cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Stock Mínimo *</label>
                        <input style="width: 185px; margin-left: 0.3cm;" type="text" class="form-control"  name="stock_min" value="{{ old('stock_min') }}" placeholder="" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Stock Máximo *</label>
                        <input style="width: 185px; margin-left: 0.3cm;" type="text" class="form-control" name="stock_max" value="{{ old('stock_max') }}" placeholder="" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>
</div>


 &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<button style="margin-left: 0.6cm;" class="btn btn-primary" type="submit">Guardar</button>

