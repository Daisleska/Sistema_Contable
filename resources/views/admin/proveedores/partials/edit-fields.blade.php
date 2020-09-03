<p>Campos obligatorios (*)</p>


<div class="row" >
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Nombre *</label>
                        <input style="width: 310px; margin-left: 0.3cm; " type="text" value="{{$proveedores->nombre}}" name="nombre" class="form-control" required>
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>


  <div class="row">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">RUT *</label>
                            <select value="{{$proveedores->tipo_documento}}" name="tipo_documento" data-plugin="customselect" class="form-control" data-placeholder="" required="required" style="width: 80px; margin-left: 0.3cm; " >
                                  
                                  <option value="C">C</option>
                                  <option value="E">E</option>
                                  <option value="J">J</option>
                                  <option value="P">P</option>
                                  
                                  
                                </select></th>
                            <div class="valid-feedback">
                            </div>
                    </div>
   

  
                <div class="form-group mb-3">
                    <label style="color: white;">...</label>    
                        <input value="{{$proveedores->ruf}}" style="width: 220px; margin-left: 0.3cm;" type="text" class="form-control"  name="ruf" placeholder="9876584-J" required>
                        <div class="valid-feedback">
                        </div>

                    </div>

    </div>

    <div class="row" >
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Representante *</label>
                        <input style="width: 310px; margin-left: 0.3cm; " type="text" value="{{$proveedores->representante}}" name="representante" class="form-control" required>
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>


    <div class="row" >         
                <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Correo *</label>
                        <input value="{{$proveedores->correo}}" style="width: 310px; margin-left: 0.3cm; " type="email" class="form-control"  name="correo" placeholder="eiche@gmail.com" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
    </div>


    <div class="row" >
                  <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Dirección *</label>
                        <input value="{{$proveedores->direccion}}" style="width: 310px; margin-left: 0.3cm; " type="text" class="form-control"  name="direccion" placeholder="Antofagasta" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
    </div>

     <div class="row" >
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Teléfono *</label>
                    
                            <select value="{{$proveedores->codigo}}" name="codigo" data-plugin="customselect" class="form-control" data-placeholder="" required="required" style="width: 80px; margin-left: 0.3cm; " >
                                  
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
                        <label style="color: white;" >... </label>
                        <input value="{{$proveedores->telefono}}" style="width: 220px; margin-left: 0.3cm; "type="text" name="telefono" class="form-control" placeholder="04127685432" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>

                    <div class="border-top">
                        <div class="card-body" align="right">
                            <button type="reset" class="btn btn-dark">Borrar</button>
                            <button  type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
 

