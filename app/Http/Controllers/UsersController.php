<?php

namespace App\Http\Controllers;


use App;
Use App\Bitacora;
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

        return view('admin.users.profile',compact('user'));
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

    flash('<i class="icon-circle-check"></i> Ha cambiado la clave de acceso exitosamente!')->success();
     return redirect()->route('profile');
    }else{
        flash('<i class="icon-circle-check"></i> Las claves no coinciden, intente de nuevo!')->warning();
         return redirect()->route('profile');
    }
    
 
    
  }

   public function cambiar_tipo(Request $request) {
 
    $user=User::find($request->user_id);
    $new_type=$request->user_type;
    $user->user_type=$new_type;
    $user->save(); 

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
    
 
   
}
