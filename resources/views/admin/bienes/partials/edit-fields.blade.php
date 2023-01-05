<p style="margin-left: 0.1cm;">Campos obligatorios (*)</p>
<div class="row" style="margin-left: 0.1cm;">
<div class="form-group mb-3">
                    <label style="margin-left: 0.3cm;">Nombre </label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" name="nombre" class="form-control"  value="{{ $bienes->nombre }}" placeholder="" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 0.1cm;">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Código </label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" name="codigo" class="form-control"  value="{{ $bienes->codigo }}" placeholder="" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 0.1cm;">
                    
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Cantidad </label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="number"  name="cantidad" class="form-control" value="{{ $bienes->cantidad }}" placeholder="" required>
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 0.1cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Grupo</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" class="form-control"  name="grupo" value="{{ $bienes->grupo}}" placeholder="" >
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 0.1cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Subgrupo</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" class="form-control"  name="sub_grupo" value="{{ $bienes->sub_grupo}}" placeholder="" >
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>


<div class="row" style="margin-left: 0.1cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Sección</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" class="form-control"  name="sec" value="{{ $bienes->sec}}" placeholder="" >
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>


                       

<div class="row" style="margin-left: 0.1cm;">


                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Valor Unitario</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="number" class="form-control" name="valor_u" value="{{ $bienes->valor_u }}" placeholder="" required>
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




























