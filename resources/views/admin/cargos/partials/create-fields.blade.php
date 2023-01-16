<p style="margin-left: 1cm;">Campos obligatorios (*)</p>
<div class="row" style="margin-left: 1cm;">

<div class="form-group mb-3">
                    <label style="margin-left: 0.3cm;">Nombre *</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" name="nombre" class="form-control" title="Ingrese el nombre del Cargo" value="{{ old('nombre') }}" placeholder="" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>


                    

<div class="row" style="margin-left: 1cm;" >
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Tipo *</label>
                       
                        <select style="width: 310px; margin-left: 0.3cm;" class="form-control" title="Seleccione" name="tipo">
                                   
                                        <option value="Alto Nivel">Alto Nivel</option>
                                        <option value="Fijo">Fijo</option>
                                        <option value="Obrero">Obrero</option>
                                        <option value="Contratado">Contratado</option>
                                   
                                </select>
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



