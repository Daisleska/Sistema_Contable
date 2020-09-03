 <!-- sample modal content -->
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" >
                            <div class="modal-header" >
                                <h5 style="margin-left: 3.5cm;" class="modal-title" id="myModalLabel">Cambiar Contraseña</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                             <?php  $user2=\Auth::User()->id;  ?> 

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                {!! Form::open(['route' => ['cambiar_clave',$user2], 'method' => 'GET', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                    @csrf

                
                    
                    <input type="hidden" name="user_id" value="{{$user2}}">
                        

                        <div class="form-group row">
                            <label for="password" class="col-md-5 col-form-label text-md-right">Nueva contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-5 col-form-label text-md-right">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                          <div class="modal-footer" style="align-content: center;">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                                
                {!! Form::close() !!}
            </div>
        
    </div>
</div>
</div>
                            </div>
                          
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->




<!--Cambiar Fotos-->

                <div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" >
                            <div class="modal-header" >
                                <h5 style="margin-left: 4.5cm;" class="modal-title" id="myModalLabel">Cambiar Foto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                             <?php  $user2=\Auth::User()->id;  ?> 

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">

             <img src="{{ asset('uploads/avatars/'.$user->avatar) }}" width="50%" height="50%"><br>
                {{ Form::open(['route' => ['user.profile.update'], 'files' => true, 'method' => 'PATCH']) }}
          <p>{{ Form::file('avatar') }}</p>
       
                 

                
        
                        
                          <div class="modal-footer" style="align-content: center;">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Cambiar</button>
                            </div>
                                
                {!! Form::close() !!}
            </div>
        
    </div>
</div>
</div>
                            </div>
                          
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->