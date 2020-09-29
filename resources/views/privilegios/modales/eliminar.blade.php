<!-- Data Table area End-->
<div class="modal fade" id="eliminar_area" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h2>¿Esta seguro que desea eliminar esta área?</h2>
                <p>Esta acción no se podra deshacer en el futuro.</p>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#claveroot">Eliminar</button> -->
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#claverrot" onclick="ModalTwo()">Eliminar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="claverrot" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <span>Eliminar área</span>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          {{--   {!! Form::open(['route' => ['areas.destroy',1033], 'method' => 'DELETE']) !!} --}}
                <div class="modal-body">
                    <input type="hidden" name="id_producto" id="id_producto" >
                    <div class="row form-group">
                        <div class="col col-md-1">
                        </div>
                        <div class="col-12 col-md-9">
                            <label for="text-input" class=" form-control-label"> <b style="color:red;">*</b> Contraseña de Administrador</label>
                            <input type="password" id="clave" name="clave" class="form-control" required="required" placeholder="Ingrese contraseña">
                            <small class="form-text text-muted">Escribe la contraseña del administrador para validar la eliminación</small>
                            <input type="text" name="id_area_eliminar" id="id_area_eliminar">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
