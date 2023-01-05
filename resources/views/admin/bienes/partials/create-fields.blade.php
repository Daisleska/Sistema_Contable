<p style="margin-left: 1cm;">Campos obligatorios (*)</p>
<div class="row" style="margin-left: 1cm;">
<div class="form-group mb-3">
                    <label style="margin-left: 0.3cm;">Nombre *</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" name="nombre" class="form-control" title="Ingrese la descripción del Bien Público" value="{{ old('nombre') }}" placeholder="" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 1cm;">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Código *</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" name="codigo" class="form-control" title="Ingrese el N° de Ident" value="{{ old('codigo') }}" placeholder="" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 1cm;">
                    
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Cantidad *</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="number"  name="cantidad" class="form-control" title="Ingrese la cantidad" value="{{ old('cantidad') }}" placeholder="" required>
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 1cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Grupo </label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" class="form-control" title="Ingrese el Grupo al que pertenece el Bien Público" name="grupo" value="{{ old('grupo') }}" placeholder="">
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>


<div class="row" style="margin-left: 1cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">SubGrupo </label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" class="form-control" title="Ingrese el Subgrupo al que pertenece el Bien Público" name="sub_grupo" value="{{ old('sub_grupo') }}" placeholder="">
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>


<div class="row" style="margin-left: 1cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Sección </label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" class="form-control" title="Ingrese la Sección al que pertenece el Bien Público" name="sec" value="{{ old('sec') }}" placeholder="">
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>


<div class="row" style="margin-left: 1cm;" >


                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Valor Unitario *</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="number" class="form-control" name="valor_u" value="{{ old('valor_u') }}" title="Ingrese el valor unitario" placeholder="" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>


                    <div class="border-top">
                        <div class="card-body" align="right">
                            <button style="align-content: center;" type="reset" class="btn btn-dark">Borrar</button>
                            <button style="align-content: center;" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>



