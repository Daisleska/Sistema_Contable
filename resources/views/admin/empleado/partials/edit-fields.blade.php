<p style="margin-left: 1cm;">Campos obligatorios (*)</p>
<div class="row" style="margin-left: 1cm;">
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Nombres *</label>
                        <input style="width: 310px; margin-left: 0.3cm; " type="text" name="nombres" value="{{$empleado->nombres}}" title="Ingrese los nombres" class="form-control" placeholder="" required>
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>

 <div class="row" style="margin-left: 1cm;">
<div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Apellidos *</label>
                        <input style="width: 310px; margin-left: 0.3cm; " type="text" name="apellidos"  value="{{$empleado->apellidos}}" title="Ingrese los apellidos" class="form-control" placeholder="" required>
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>



  
  <div class="row" style="margin-left: 1cm;">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Cedula *</label>
                            <select name="tipo_doc" data-plugin="customselect" title="Seleccione el tipo de documento" class="form-control" data-placeholder="" required="required" style="width: 80px; margin-left: 0.3cm; " >

                                @if ($empleado->tipo_doc=="V")
                                
                                  <option value="V">V</option>
                                  <option value="E">E</option>
                                @else
                                  
                                  <option value="E" >E</option>
                                  <option value="V">V</option>

                                @endif
                                  

                                  
                                  
                                </select>
                            <div class="valid-feedback">
                            </div>
                    </div>
   

  
                <div class="form-group mb-3">
                    <label style="color: white;">...</label>    
                        <input style="width: 215px; margin-left: 0.3cm;" type="text" class="form-control" title="Ingrese el número de cedula"  name="cedula" placeholder="" value="{{$empleado->cedula}}" required>
                        <div class="valid-feedback">
                        </div>

                    </div>
    </div>


    <div class="row" style="margin-left: 1cm;">
                  <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Fecha de Nacimiento*</label>
                        <input style="width: 310px; margin-left: 0.3cm; " type="date" class="form-control" title="Ingrese la fecha de nacimiento" name="fecha_nac" placeholder="" value="{{$empleado->fecha_nac}}" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
    </div>


<div class="row" style="margin-left: 1cm;">
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Sexo *</label>
                            <select name="sexo" data-plugin="customselect" title="Seleccione el sexo" class="form-control" data-placeholder="" required="required" style="width: 310px; margin-left: 0.3cm; " >
                                  
                                  @if ($empleado->sexo=="F")
                                
                                  <option value="F">Femenino</option>
                                  <option value="M">Masculino</option>
                                @else
                                  
                                  <option value="M" >Masculino</option>
                                  <option value="F">Femenino</option>

                                @endif
                                  
                                </select>
                            <div class="valid-feedback">
                            </div>
                    </div>
                </div>




<div class="row" style="margin-left: 1cm;">
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Estado Civil *</label>
                            <select name="estado_civil" data-plugin="customselect" title="Seleccione el estado civil" class="form-control" data-placeholder="" required="required" style="width: 310px; margin-left: 0.3cm; " >

                                @if ($empleado->estado_civil=="Soltero")
                                
                                  <option value="Soltero">Soltero</option>
                                  <option value="Casado">Casado</option>
                                  <option value="Viudo">Viudo</option>
                                  <option value="Divorciado">Divorciado</option>
                                  <option value="Concubino">Concubino</option>

                                @elseif($empleado->estado_civil=="Casado")

                                  <option value="Casado">Casado</option>
                                  <option value="Soltero">Soltero</option>
                                  <option value="Viudo">Viudo</option>
                                  <option value="Divorciado">Divorciado</option>
                                  <option value="Concubino">Concubino</option>


                                @elseif($empleado->estado_civil=="Viudo")


                                  <option value="Viudo">Viudo</option>
                                  <option value="Casado">Casado</option>
                                  <option value="Soltero">Soltero</option>
                                  <option value="Divorciado">Divorciado</option>
                                  <option value="Concubino">Concubino</option>

                                @elseif($empleado->estado_civil=="Divorciado")



                                  <option value="Divorciado">Divorciado</option>
                                  <option value="Viudo">Viudo</option>
                                  <option value="Casado">Casado</option>
                                  <option value="Soltero">Soltero</option>
                                  <option value="Concubino">Concubino</option>

                                @else 


                                  <option value="Concubino">Concubino</option>
                                  <option value="Divorciado">Divorciado</option>
                                  <option value="Viudo">Viudo</option>
                                  <option value="Casado">Casado</option>
                                  <option value="Soltero">Soltero</option>
                                  
                                @endelseif
                                @endelse
                                @endif
                                  
                                  
                                  
                                </select>
                            <div class="valid-feedback">
                            </div>
                    </div>
                </div>




<div class="row" style="margin-left: 1cm;">
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Tipo de Personal *</label>
                            <select name="tipo_personal" data-plugin="customselect" title="Seleccione el tipo de personal" class="form-control" data-placeholder="" required="required" style="width: 310px; margin-left: 0.3cm; " >

                                @if ($empleado->tipo_personal=="Alto Nivel")
                                  <option value="Alto Nivel">Alto Nivel</option>
                                  <option value="Contratado">Contratado</option>
                                  <option value="Fijo">Fijo</option>

                                @elseif ($empleado->tipo_personal=="Contratado")


                                  <option value="Contratado">Contratado</option>
                                  <option value="Alto Nivel">Alto Nivel</option>
                                  <option value="Fijo">Fijo</option>

                                @else 

                                  <option value="Fijo">Fijo</option>
                                  <option value="Alto Nivel">Alto Nivel</option>
                                  <option value="Contratado">Contratado</option>

                                @endelseif
                                @endelse
                                @endif
                                  



                                  
                                </select>
                            <div class="valid-feedback">
                            </div>
                    </div>
                </div>

  
                      
    

                <div class="row" style="margin-left: 1cm;">
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Cargos *</label>
                            <select name="cargo" data-plugin="customselect" title="Seleccione el cargo" required="required" class="form-control" data-placeholder=""  style="width: 310px; margin-left: 0.3cm; " >
                                  
                                  
                                    @foreach($cargos as $key)
                                    @if($key->nombre=="$empleado->cargo")
                                        <option disabled="disabled" value="{{$key->nombre}}">{{ $key->nombre }}</option>
                                    @else 
                                    <option value="{{$key->nombre}}">{{ $key->nombre }}</option>
                                    @endelse
                                    @endif

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
                                  
                                  <option selected="selected" disabled="disabled" readonly>Seleccione el departamento</option>
                                    @foreach($departamento as $key)
                                        <option value="{{ $key->tipo }} {{ $key->nombre }}">{{ $key->tipo }} de {{ $key->nombre }}</option>
                                    @endforeach
                                  
                                </select>
                            <div class="valid-feedback">
                            </div>
                    </div>
                </div>

    

    <div class="row" style="margin-left: 1cm;">
                  <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Fecha de Ingreso*</label>
                        <input style="width: 310px; margin-left: 0.3cm; " type="date" class="form-control" title="Ingrese la fecha de Ingreso" value="{{$empleado->fecha_ingreso}}" name="fecha_ingreso" placeholder="" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
    </div>

     <div class="row" style="margin-left: 1cm;">
                  <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Dirección *</label>
                        <input style="width: 310px; margin-left: 0.3cm; " type="text" class="form-control" title="Ingrese la dirección" value="{{$empleado->direccion}}" name="direccion" placeholder="" required>
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