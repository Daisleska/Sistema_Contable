<p class="row" style="margin-left: 0.5cm;">Campos obligatorios (*)</p>


<div class="row" style="margin-left: 0cm;">
    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Nombre *</label>
                        <input style="width: 310px; margin-left: 0.3cm; " type="text" value="{{$clientes->nombre}}" name="nombre" class="form-control" placeholder="EICHE" required>
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>


  <div class="row" style="margin-left: 0cm;">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">RIF *</label>
                            <select value="{{$clientes->tipo_documento}}" name="tipo_documento" data-plugin="customselect" class="form-control" data-placeholder="" required="required" style="width: 80px; margin-left: 0.3cm; " >
                                  
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
                        <input value="{{$clientes->ruf}}" style="width: 220px; margin-left: 0.3cm;" type="text" class="form-control"  name="ruf" placeholder="9876584-J" required>
                        <div class="valid-feedback">
                        </div>

                    </div>

    </div>

    <div class="row" style="margin-left: 0cm;">         
                <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Correo *</label>
                        <input value="{{$clientes->email}}" style="width: 310px; margin-left: 0.3cm; " type="email" class="form-control"  name="email" placeholder="eiche@gmail.com" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
    </div>


    <div class="row" style="margin-left: 0cm;">
                  <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Dirección *</label>
                        <input value="{{$clientes->direccion}}" style="width: 310px; margin-left: 0.3cm; " type="text" class="form-control"  name="direccion" placeholder="Antofagasta" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
    </div>

     <div class="row" style="margin-left: 0cm;">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Teléfono *</label>
                    
                            <select value="{{$clientes->codigo}}" name="codigo" data-plugin="customselect" class="form-control" data-placeholder="" required="required" style="width: 80px; margin-left: 0.3cm; " >
                                  
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
                        <label style="color: white;">...</label>
                        <input value="{{$clientes->telefono}}" style="width: 220px; margin-left: 0.3cm; "type="number" name="telefono" class="form-control" placeholder="04127685432" required>
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