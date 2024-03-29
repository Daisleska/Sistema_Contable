<p >Campos obligatorios (*)</p>


<div class="row" >
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Nombre de la Empresa *</label>
                        <input style="width: 310px; margin-left: 0.3cm; " type="text" value="{{$empresa->nombre}}" name="nombre" class="form-control" placeholder="EICHE" required>
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>


  <div class="row">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">RIF *</label>
                            <select value="{{$empresa->tipo_documento}}" name="tipo_documento" data-plugin="customselect" class="form-control" data-placeholder="" required="required" style="width: 80px; margin-left: 0.3cm; " >
                                
                                 @if ($empresa->tipo_documento=="G")
                                  <option value="G">G</option>
                                  <option value="E">E</option>
                                  <option value="J">J</option>
                                  <option value="P">P</option>
                                  @elseif ($empresa->tipo_documento=="E")

                                  <option value="E">E</option>
                                  <option value="G">G</option>
                                  <option value="J">J</option>
                                  <option value="P">P</option>
                                  @elseif ($empresa->tipo_documento=="J")
                                  <option value="J">J</option>
                                  <option value="G">G</option>
                                  <option value="E">E</option>
                                  <option value="P">P</option>

                                  @else
                                  <option value="P">P</option>
                                  <option value="G">G</option>
                                  <option value="E">E</option>
                                  <option value="J">J</option>
                                  @endelseif
                                  @endelse
                                  @endif
                                  

                                  
                                  
                                </select></th>
                            <div class="valid-feedback">
                            </div>
                    </div>
   

  
                <div class="form-group mb-3">
                    <label style="color: white;">...</label>    
                        <input value="{{$empresa->rif}}" style="width: 220px; margin-left: 0.3cm;" type="text" class="form-control"  name="rif" placeholder="9876584-J" required>
                        <div class="valid-feedback">
                        </div>

                    </div>

    </div>

    <div class="row" >         
                <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Correo *</label>
                        <input value="{{$empresa->email}}" style="width: 310px; margin-left: 0.3cm; " type="email" class="form-control"  name="email" placeholder="eiche@gmail.com" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
    </div>


    <div class="row">
                  <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Dirección *</label>
                        <input value="{{$empresa->direccion}}" style="width: 310px; margin-left: 0.3cm; " type="text" class="form-control"  name="direccion" placeholder="Antofagasta" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
    </div>

     <div class="row">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Teléfono *</label>
                    
                            <select value="{{$empresa->codigo}}" name="codigo" data-plugin="customselect" class="form-control" data-placeholder="" required="required" style="width: 90px; margin-left: 0.3cm; " >
                                  
                                  <option value="51">+51</option>
                                  <option value="54">+54</option>
                                  <option value="55">+55</option>
                                  <option value="56">+56</option>
                                  <option value="57">+57</option>
                                  <option value="58">+58</option>
                                  <option value="591">+591</option>
                                  <option value="593">+593</option>
                                  <option value="595">+595</option>
                                  <option value="598">+598</option>
                                  
                                </select></th>
                            <div class="valid-feedback">
                            </div>
                    </div>

                 <div class="form-group mb-3">
                        <label style="color: white">...</label>
                        <input value="{{$empresa->telefono}}" style="width: 210px; margin-left: 0.3cm; "type="text" name="telefono" class="form-control" placeholder="04127685432" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>
<div class="row">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Imagen *</label>
                        <input value="{{$empresa->image_name}}" type="file" style="width: 310px; margin-left: 0.3cm;" class="form-control"  name="image" id="image">
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
                  </div>
                    <div class="row">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Pie de página *</label>
                         <input value="{{$empresa->page_foot}}" type="text" style="width: 310px; margin-left: 0.3cm;" class="form-control" placeholder="Ej: Dirección y Datos de contactos" name="page_foot" id="page_foot">
                       
                        </div>
                    </div>
                        <div class="border-top">
                        <div class="card-body" align="right">
                            <button type="reset" class="btn btn-dark">Borrar</button>
                            <button  type="submit" class="btn btn-primary">Guardar</button>
                        </div>
              

