<p style="margin-left: 0.1cm;">Campos obligatorios (*)</p>
<div class="row" style="margin-left: 0.1cm;">




                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Tipo *</label>
                       
                        <select style="width: 310px; margin-left: 0.3cm;" class="form-control"  name="tipo">
                                    <optgroup label="Seleccione">
                                        <option value="Despacho" @if($departamento->unity=="Despacho") selected="selected" @endif >Despacho</option>
                                        <option value="Gerencia" @if($departamento->unity=="Gerencia") selected="selected" @endif >Gerencia</option>
                                        <option value="Oficina" @if($departamento->unity=="Oficina") selected="selected" @endif >Oficina</option>
                                    </optgroup>
                                </select>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>

<div class="row" style="margin-left: 0.1cm;">
<div class="form-group mb-3">
                    <label style="margin-left: 0.3cm;">Nombre </label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" name="nombre" class="form-control"  value="{{ $departamento->nombre }}" placeholder="" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>
</div>




                   <div class="border-top">
                        <div class="card-body" align="right">
                            <button style="align-content: center;" type="reset" class="btn btn-dark">Borrar</button>
                            <button style="align-content: center;" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>




























