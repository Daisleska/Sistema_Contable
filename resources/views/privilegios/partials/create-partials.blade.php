<div class="row">
    <div class="col-md-10 col-sm-12 col-xs-12 mb-5">
                <select class="form-control select2" name="id_gerencia_search" id="id_gerencia_search">
                    <option value="0">Seleccione el usuario</option>
                    @foreach($empleados as $item)
                        <option value="{{$item->usuario->id}}">{{$item->nombres}} {{$item->apellidos}} .- {{$item->rut}}</option>
                    @endforeach
                </select>
    </div>
    <div class="col-md-2 col-sm-12 col-xs-12 mb-5">
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>
    
