<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Privilegios;
use App\User;
use App\UsuariosHasPrivilegios;

class PrivilegiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cprivilegios=Privilegios::all()->count();
        $UserPrivilegios=UsuariosHasPrivilegios::where('id','<>',0)->groupBy()->get();
        $privilegios=Privilegios::all();
        $user=User::all();

        return View('privilegios.index', compact('privilegios','user','UserPrivilegios','cprivilegios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function buscar_privilegios($id_user)
    {
        $user=User::find($id_user);
        
        return $empleados=\DB::table('usuarios_has_privilegios')->join('privilegios','privilegios.id','=','usuarios_has_privilegios.id_privilegio')->select('usuarios_has_privilegios.*')->where('usuarios_has_privilegios.id_usuario',$user->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    public function actualizando($id_provilegio,$opcion,$id_usuario)
    {
        if ($opcion==1) {
            $status="Si";
        } else {
            $status="No";
        }
        
        \DB::table('usuarios_has_privilegios')->where('id_usuario', $id_usuario)->where('id_privilegio',$id_provilegio)->update(['status' => $status]);
        return 1;
    }

    public function editarPrivilegio(Request $request)
    {
        // dd($request->all());
        
        for ($i=0; $i < count($request->id_empleado); $i++) { 
            $user=User::find($request->id_empleado[$i]);
             if ($user->superUser == 'Eiche') {
                flash('<i class="icon-circle-check"></i> ¡No se puede editar los permisos de este usuario! ¡Incidente reportado!')->warning()->important();
                return redirect()->back();


             }elseif($user->tipo_user == 'Admin' && \Auth::user()->superUser != 'Eiche'){
                flash('<i class="icon-circle-check"></i> ¡No se puede modificar los permisos de un Admin!')->warning()->important();
                return redirect()->back();
             }
        }

        $k= array();
        // dd($request->all());
        $UserP=UsuariosHasPrivilegios::all();

        foreach ($UserP as $key) {
            for ($j=0; $j < count($request->id_privilegio); $j++) { 
                
                $privi=UsuariosHasPrivilegios::find($request->id_privilegio[$j]);
                array_push($k, $privi->id);

                if($privi->id == $key->id) {
                    $key->status = 'Si';
                    $key->save();
                }elseif (in_array($privi->id, $k)) {
                    
                }
                else{
                    $key->status = 'No';
                    $key->save();
                }
                $k++;
                
            }
        }


        flash('<i class="icon-circle-check"></i> ¡Permisos modificados con éxito!')->success()->important();
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
