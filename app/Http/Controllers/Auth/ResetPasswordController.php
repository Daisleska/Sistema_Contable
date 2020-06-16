<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\User;
use App\Mail\Reset;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function recuperando_clave(Request $request)
    {
        //dd($request->all());
        $user=User::where('email',$request->email)->first();
        
        if (is_null($user)) {
            
            flash('<i class="icon-circle-check"></i> El correo electrónico no se encuentra registrado, verifique!')->warning()->important();
            return redirect()->back();
            
        } else {
            /*User::created(function($user){
               Mail::to($user)->send(new Reset($user));
           
           });*/
       
            $codigo=$this->generarCodigo();
            $nueva_clave=\Hash::make($codigo);
            $user->password=$nueva_clave;
            $user->save();
            $destinatario=$request->email;
            ini_set('max_execution_time', 360); //3 minutes
       
            Mail::to($destinatario)->send(new Reset($user, $codigo )); 
          
          /*  return new Reset($user, $codigo);*/
            flash('<i class="icon-circle-check"></i> Ha sido enviada a su correo su nueva contreseña!')->success()->important();
            return redirect()->back();
        }
        
    }

    protected function generarCodigo() {
     $key = '';
     $pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ.!#$%:;-_?¿()[]{}';
     $max = strlen($pattern)-1;
     for($i=0;$i < 8;$i++) $key .= $pattern{mt_rand(0,$max)};
     return $key;
    }
}
