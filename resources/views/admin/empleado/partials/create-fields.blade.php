
<p style="margin-left: 1cm;">Campos obligatorios (*)</p>
<div class="row" style="margin-left: 1cm;">
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Nombres *</label>
                        <input style="width: 310px; margin-left: 0.3cm; " type="text" name="nombres" title="Ingrese los nombres" class="form-control" placeholder="" required>
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>

 <div class="row" style="margin-left: 1cm;">
<div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Apellidos *</label>
                        <input style="width: 310px; margin-left: 0.3cm; " type="text" name="apellidos" title="Ingrese los apellidos" class="form-control" placeholder="" required>
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>



  
  <div class="row" style="margin-left: 1cm;">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Cedula *</label>
                            <select name="tipo_doc" data-plugin="customselect" title="Seleccione el tipo de documento" class="form-control" data-placeholder="" required="required" style="width: 80px; margin-left: 0.3cm; " >
                                  
                                  <option value="V">V</option>
                                  <option value="E">E</option>
                                  
                                  
                                </select>
                            <div class="valid-feedback">
                            </div>
                    </div>
   

  
                <div class="form-group mb-3">
                    <label style="color: white;">...</label>    
                        <input style="width: 220px; margin-left: 0.3cm;" type="text" class="form-control" title="Ingrese el número de cedula"  name="cedula" placeholder="" required>
                        <div class="valid-feedback">
                        </div>

                    </div>
    </div>


    <div class="row" style="margin-left: 1cm;">
                  <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Fecha de Nacimiento*</label>
                        <input style="width: 310px; margin-left: 0.3cm; " type="date" class="form-control" title="Ingrese la fecha de nacimiento" name="fecha_nac" placeholder="" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
    </div>


<div class="row" style="margin-left: 1cm;">
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Sexo *</label>
                            <select name="sexo" data-plugin="customselect" title="Seleccione el sexo" class="form-control" data-placeholder="" required="required" style="width: 310px; margin-left: 0.3cm; " >
                                  
                                  <option value="Femenino">Femenino</option>
                                  <option value="Masculino">Masculino</option>
                                  
                                </select>
                            <div class="valid-feedback">
                            </div>
                    </div>
                </div>




<div class="row" style="margin-left: 1cm;">
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Estado Civil *</label>
                            <select name="estado_civil" data-plugin="customselect" title="Seleccione el estado civil" class="form-control" data-placeholder="" required="required" style="width: 310px; margin-left: 0.3cm; " >
                                  
                                  <option value="Soltero">Soltero</option>
                                  <option value="Casado">Casado</option>
                                  <option value="Viudo">Viudo</option>
                                  <option value="Divorciado">Divorciado</option>
                                  <option value="Concubino">Concubino</option>
                                  
                                </select>
                            <div class="valid-feedback">
                            </div>
                    </div>
                </div>




<div class="row" style="margin-left: 1cm;">
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Tipo de Personal *</label>
                            <select name="tipo_personal" data-plugin="customselect" title="Seleccione el tipo de personal" class="form-control" data-placeholder="" required="required" style="width: 310px; margin-left: 0.3cm; " >
                                  <option value="Alto Nivel">Alto Nivel</option>
                                  <option value="Contratado">Contratado</option>
                                  <option value="Fijo">Fijo</option>
                                  
                                </select>
                            <div class="valid-feedback">
                            </div>
                    </div>
                </div>

  
                      
    

                <div class="row" style="margin-left: 1cm;">
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Cargos *</label>
                            <select name="cargo" data-plugin="customselect" title="Seleccione el cargo" required="required" class="form-control" data-placeholder=""  style="width: 310px; margin-left: 0.3cm; ">
                                  
                                    @foreach($cargos as $key)
                                        <option value="{{$key->nombre}}">{{ $key->nombre }}</option>
                                    @endforeach
                                  
                                </select>
                            <div class="valid-feedback">
                            </div>
                    </div>
                </div>



                <div class="row" style="margin-left: 1cm;">
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Dirección de Adscripción *</label>
                            <select name="adscripcion" data-plugin="customselect" title="Seleccione la dirección de adscripcion" class="form-control" data-placeholder="" required="required" style="width: 310px; margin-left: 0.3cm; " >
                                  
                                
                                    @foreach($departamento as $key)
                                        <option value="{{ $key->tipo }} de {{ $key->nombre }}">{{ $key->tipo }} de {{ $key->nombre }}</option>
                                    @endforeach
                                  
                                </select>
                            <div class="valid-feedback">
                            </div>
                    </div>
                </div>

    

    <div class="row" style="margin-left: 1cm;">
                  <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Fecha de Ingreso*</label>
                        <input style="width: 310px; margin-left: 0.3cm; " type="date" class="form-control" title="Ingrese la fecha de Ingreso" name="fecha_ingreso" placeholder="" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
    </div>

     <div class="row" style="margin-left: 1cm;">
                  <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Dirección *</label>
                        <input style="width: 310px; margin-left: 0.3cm; " type="text" class="form-control" title="Ingrese la dirección" name="direccion" placeholder="" required>
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



   



</table>

