<?php

namespace App\Http\Controllers;


use App;
use App\empresa;
use App\Bitacora;
use App\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $empresa = \DB::select('SELECT * FROM empresa');
      
         return view('admin.empresa.index', compact('empresa'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
    
        $buscar=empresa::all();
            
            if (count($buscar)>0) {
                flash('<i class="icon-circle-check"></i> ¡Ya existe un registro de empresa, para registrar uno debe eliminar el anterior!')->success()->important();
                return redirect()->back();
            } else {
                return view ('admin.empresa.create');
            }
            
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
           
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png',
            'image' => 'dimensions:max_width=396px,max_height=340px',
            'page_foot' => 'required'
        ]);

        $name=$request->file('image')->getClientOriginalName();
        $ok=$request->file('image')->move(public_path().'/images/', $name);  
        //dd($ok);
        $url = '/images/'.$name;
       $empresa= new empresa();
            $empresa->nombre=$request->nombre;
            $empresa->tipo_documento=$request->tipo_documento;
            $empresa->ruf=$request->ruf;
            $empresa->email=$request->email;
            $empresa->direccion=$request->direccion;
            $empresa->codigo=$request->codigo;
            $empresa->telefono=$request->telefono;
            $empresa->image_name=$name;
            $empresa->url_image=$url;
            $empresa->page_foot=$request->page_foot;
            $empresa->save();

           /*registrar accion en bitacora*/
            $bitacoras = new Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado la información de la empresa';
            $bitacoras->save();

            flash('¡Información de la empresa registrada exitosamente!', 'success');
           return redirect()->to('empresa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_empresa)
    {
         $empresa=empresa::find($id_empresa);
        return view ('admin.empresa.edit', compact ('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id)
    {
           /** dd($request);*/
          if ($request->file('image')!=="") {
            $this->validate($request, [
            'image.*' => 'mimes:jpeg,jpg,png',
            'image' => 'dimensions:max_width=844,max_height=63',
            'page_foot' => 'required'
            ]);
        } else {
            $this->validate($request, [
          
            'page_foot' => 'required'
        ]);
        }

        if ($request->file('image')!=="") {
            $empresa=empresa::find($id);
            unlink(public_path().'/'.$empresa->url_image);
            

            $name=$request->file('image')->getClientOriginalName();
            $ok=$request->file('image')->move(public_path().'/images/', $name);  
            //dd($ok);
            $url = '/images/'.$name;

            
            $empresa->nombre=$request->nombre;
            $empresa->tipo_documento=$request->tipo_documento;
            $empresa->ruf=$request->ruf;     
            $empresa->email=$request->email;
            $empresa->direccion=$request->direccion;
            $empresa->codigo=$request->codigo;
            $empresa->telefono=$request->telefono;
            $empresa->image_name=$name;
            $empresa->url_image=$url;
            $empresa->page_foot=$request->page_foot;
            $empresa->save();

        } else {
            
            $empresa=empresa::find($id);
            $empresa->nombre=$request->nombre;
            $empresa->tipo_documento=$request->tipo_documento;
            $empresa->ruf=$request->ruf;     
            $empresa->email=$request->email;
            $empresa->direccion=$request->direccion;
            $empresa->codigo=$request->codigo;
            $empresa->telefono=$request->telefono;
            $empresa->user_id=$request->user_id;
            $empresa->page_foot=$request->page_foot;
            $empresa->save();
        }
        
        
        flash('<i class="icon-circle-check"></i>¡Información de la empresa actualizada exitosamente!')->success()->important();

           return redirect()->to('empresa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_empresa)
    {
       $empresa=empresa::find($request->id_empresa);
         $image=$empresa->url_image;
        if ($empresa->delete()) {
            unlink(public_path().'/'.$image);
            flash('¡Registro eliminado exitosamente!', 'success');
                return redirect()->back();
        } else {
            flash('¡No se pudo eliminar el registro, posiblemente esté siendo usada su información en otra área!', 'error');
                return redirect()->back();
        }        
    }
}
