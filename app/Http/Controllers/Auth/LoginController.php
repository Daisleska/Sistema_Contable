<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function authenticated($request, $user){
       
        if(\Auth::user()->status =='Activo'){
         
            return redirect()->route('home');

        }elseif (\Auth::user()->status == 'Suspendido'){

           return redirect()->to('login')->with('flash', 'Tu usuario esta suspendido');
         }
     }
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
