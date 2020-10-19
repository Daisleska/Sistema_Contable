<?php

namespace App\Http\Controllers;


use App;
Use App\Bitacora;
Use App\chat;
Use App\UsuariosHasPrivilegios;
use App\Alert;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\cambio_clave;
use Illuminate\Support\Facades\Mail;


class UsersController extends Controller
{

     public function __construct() {
    $this->middleware('auth')->only('profile', 'update_profile');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
        


        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        //event(new Registered($user = $this->create_user($request->all())));
        $user = $this->create_user($request->all());
        //dd($user);
        //$this->guard()->login($user);
        //$this->registered($request, $user);
        /*flash('<i class="icon-circle-check"></i> Usuario registrado con satisfactoriamente!')->success()->important();*/


    //Asignar privilegios 


        $buscarid=User::latest('id')->first();

        $id=$buscarid->id;


        if ($request->user_type=="Administrador"){

            //Privilegio para usuario Administrador o Super User 

            for ($i=1; $i <=42; $i++) { 

            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = $i;
            $privilegios->status = "Si";

            $privilegios->save();


            }


        }else if ($request->user_type=="Contador") {

            //Contador 

            for ($i=1; $i <= 16; $i++) { 
            

            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = $i;
            $privilegios->status = "No";

            $privilegios->save();
           
            }



        for ($i=17; $i <= 38; $i++) { 
            
            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = $i;
            $privilegios->status = "Si";

            $privilegios->save();

            }

         for ($i=39; $i <= 41; $i++) { 
            
            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = $i;
            $privilegios->status = "No";

            $privilegios->save();
            }

        $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = 42;
            $privilegios->status = "Si";

            $privilegios->save();
           
        }else{

            //Jefe


            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = 1;
            $privilegios->status = "Si";

            $privilegios->save();


            for ($i=2; $i <= 4; $i++) { 
            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = $i;
            $privilegios->status = "No";

            $privilegios->save();
            }


            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = 5;
            $privilegios->status = "Si";

            $privilegios->save();

            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = 6;
            $privilegios->status = "No";

            $privilegios->save();

            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = 7;
            $privilegios->status = "Si";

            $privilegios->save();


            for ($i=8; $i <= 10; $i++) { 
            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = $i;
            $privilegios->status = "No";

            $privilegios->save();
            }

            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = 11;
            $privilegios->status = "Si";

            $privilegios->save();


            for ($i=12; $i <= 15; $i++) { 
            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = $i;
            $privilegios->status = "No";

            $privilegios->save();
            }
    
        for ($i=16; $i <= 21; $i++) { 
            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = $i;
            $privilegios->status = "Si";

            $privilegios->save();
        }


        for ($i=22; $i <= 23; $i++) { 
            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = $i;
            $privilegios->status = "No";

            $privilegios->save();
        }

       
        for ($i=24; $i <= 29; $i++) { 
            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = $i;
            $privilegios->status = "Si";

            $privilegios->save();
        }


        for ($i=30; $i <= 32; $i++) { 
            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = $i;
            $privilegios->status = "No";

            $privilegios->save();
        }

         for ($i=33; $i <= 34; $i++) { 
            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = $i;
            $privilegios->status = "Si";

            $privilegios->save();
        }

       
        $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = 35;
            $privilegios->status = "No";

            $privilegios->save();

        $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = 36;
            $privilegios->status = "Si";

            $privilegios->save();


        for ($i=37; $i <= 42; $i++) { 
            $privilegios = new App\UsuariosHasPrivilegios;

            $privilegios->id_usuario = $id;
            $privilegios->id_privilegio = $i;
            $privilegios->status = "No";

            $privilegios->save();

        }

    }



           $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Se Ha registrado un nuevo usuario';
            $bitacoras->save();

            flash('<i class="icon-circle-check"></i>¡Registro exitoso!')->success()->important();

        return redirect()->to('users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);

        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validatorUpdate($request->all())->validate();
        $buscar=User::where('email',$request->email)->where('id','<>',$id)->get();
        if ($buscar !== null) {
            if (count($buscar)>0) {
                flash('<i class="icon-circle-check"></i> El correo ya esta en uso!')->warning()->important();
                    return redirect()->to('users');
            } else {
                
                $user=User::find($id);
                $user->name=$request->name;
                $user->email=$request->email;
                $user->user_type=$request->user_type;
                $user->save();
                
                flash('<i class="icon-circle-check"></i> Usuario actualizado con satisfactoriamente!')->success()->important();
                return redirect()->to('users');
            }
            
        } else {
                $user=User::find($id);
                $user->name=$request->name;
                $user->email=$request->email;
                $user->user_type=$request->user_type;
                $user->save();
                
                flash('<i class="icon-circle-check"></i> Usuario actualizado con satisfactoriamente!')->success()->important();
                return redirect()->to('users');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    	/*dd($request);*/
        $user=User::find($request->user_id);
        $user->status=$request->status;
        $user->save();

        flash('<i class="icon-circle-check"></i> Estado de Usuario actualizado a '.$request->status.' !')->success()->important();
                return redirect()->to('users');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function validatorUpdate(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create_user(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_type' => 'jefe',
            'password' => Hash::make($data['password']),
            'user_type' =>$data['user_type'],
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function profile()
    {
        $user=User::find(\Auth::getUser()->id);
        $chat=\DB::select('SELECT * FROM chat');
        
        $i=0;
        foreach ($chat as $key) {
            $usuarios = \DB::select('SELECT name, avatar FROM users WHERE id='.$key->usuario);
       
        foreach ($usuarios as $val) {
        
            $use[$i][0]=$val->name;
            $use[$i][1]=$val->avatar;

        }    
      $i++;  }
        

         
         
        return view('admin.users.profile',compact('user', 'chat', 'use'));
    }

     public function update_profile(Request $request) {
    $this->validate($request, [
      'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);
 
    $filename = Auth::id().'_'.time().'.'.$request->avatar->getClientOriginalExtension();
    $request->avatar->move(public_path('uploads/avatars'), $filename);
 
    $user = Auth::user();
    $user->avatar = $filename;
    $user->save();
 
    return redirect()->route('profile');
  }

  public function cambiar_clave(Request $request) {
 
    if ($request->password == $request->password_confirmation) {
    $user=User::find($request->user_id);
    $nueva_clave=$request->password;
    $user->password=Hash::make($nueva_clave);
    $user->save();

//Envio de correo al usuario///////////////////////////////////
    $destinatario=$user->email;
    ini_set('max_execution_time', 360); //3 minutes
    Mail::to($destinatario)->send(new cambio_clave($user, $nueva_clave)); 

    flash('<i class="icon-circle-check"></i>¡Ha cambiado la clave de acceso exitosamente!')->success();
     return redirect()->route('profile');
    }else{
        flash('<i class="icon-circle-check"></i>¡Las claves no coinciden, intente de nuevo!')->warning();
         return redirect()->route('profile');
    }
    
 
    
  }

   public function cambiar_tipo(Request $request) {
 
    $user=User::find($request->user_id);
    $new_type=$request->user_type;
    $user->user_type=$new_type;
    $user->save();


    if ($new_type=="Administrador") {
        //Administrador
        
        for ($i=1; $i <=42; $i++) { 
        $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="Si" WHERE id_usuario='.$request->user_id.' AND id_privilegio='.$i);
        }



     }elseif ($new_type=="Contador") {
        //Contador
         for ($i=1; $i <= 16; $i++) { 
            
        $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="No" WHERE id_usuario='.$request->user_id.' AND id_privilegio='.$i);
           
            }



        for ($i=17; $i <= 38; $i++) { 
            
            $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="Si" WHERE id_usuario='.$request->user_id.' AND id_privilegio='.$i);
        }

         for ($i=39; $i <= 41; $i++) { 
            
            $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="No" WHERE id_usuario='.$request->user_id.' AND id_privilegio='.$i);
            }

        $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="Si" WHERE id_usuario='.$request->user_id.' AND id_privilegio=42');
           
     }else{
        //Jefe
        $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="Si" WHERE id_usuario='.$request->user_id.' AND id_privilegio=1');


            for ($i=2; $i <= 4; $i++) { 
            
            $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="No" WHERE id_usuario='.$request->user_id.' AND id_privilegio='.$i);
            }


            $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="Si" WHERE id_usuario='.$request->user_id.' AND id_privilegio=5');

            $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="No" WHERE id_usuario='.$request->user_id.' AND id_privilegio=6');

            $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="Si" WHERE id_usuario='.$request->user_id.' AND id_privilegio=7');


            for ($i=8; $i <= 10; $i++) { 

            $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="No" WHERE id_usuario='.$request->user_id.' AND id_privilegio='.$i);
            }

            $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="Si" WHERE id_usuario='.$request->user_id.' AND id_privilegio=11');


            for ($i=12; $i <= 15; $i++) { 

            $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="No" WHERE id_usuario='.$request->user_id.' AND id_privilegio='.$i);
            }
    
        for ($i=16; $i <= 21; $i++) { 
            
            $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="Si" WHERE id_usuario='.$request->user_id.' AND id_privilegio='.$i);
        }


        for ($i=22; $i <= 23; $i++) { 
           
           $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="No" WHERE id_usuario='.$request->user_id.' AND id_privilegio='.$i);
        }

       
        for ($i=24; $i <= 29; $i++) { 
            
            $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="Si" WHERE id_usuario='.$request->user_id.' AND id_privilegio='.$i);        }


        for ($i=30; $i <= 32; $i++) { 
            
            $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="No" WHERE id_usuario='.$request->user_id.' AND id_privilegio='.$i);
        }

         for ($i=33; $i <= 34; $i++) { 
            
            $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="Si" WHERE id_usuario='.$request->user_id.' AND id_privilegio='.$i);
        }

       
        $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="No" WHERE id_usuario='.$request->user_id.' AND id_privilegio=35');

        $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="Si" WHERE id_usuario='.$request->user_id.' AND id_privilegio=36');


        for ($i=37; $i <= 42; $i++) { 

            $privilegios = \DB::update('UPDATE usuarios_has_privilegios SET status ="No" WHERE id_usuario='.$request->user_id.' AND id_privilegio='.$i);
        }
     }


    if ($user) {
       $x=1;

     $users= User::all();

        return view('admin.users.index',compact('users','x'));
    }else{
        $x=2;
         $users= User::all();

        return view('admin.users.index',compact('users','x'));
      }
    }


    
    public function chat($mensaje) {

        $chatAgregar= new chat; 
        $chatAgregar->usuario=Auth::User()->id;
        $chatAgregar->mensaje=$mensaje;
        $chatAgregar->fecha=date("Y-m-d");
        $chatAgregar->hora=date("H:i");
        $chatAgregar->save();

        $chat=chat::all();
    
        foreach ($chat as $key) {
           $datos[0][1]=$key->mensaje;
           $datos[0][2]=$key->hora;
           $datos[0][3]=Auth::User()->name;
           $datos[0][4]=Auth::User()->avatar;
        } 
        return $datos;
    }




 
   
}
