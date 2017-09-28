<?php

namespace Apoyo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Apoyo\serviciosocial;
use Apoyo\Http\Requests\ServicioRequest;

class AServiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    
    public function index(Request $request)
    {
        //
       $serviciosocial = serviciosocial::servicio($request->get('name'))->orderBy('id','DESC')->paginate(5);
        return view('admin.servicio.admviewservi',compact('serviciosocial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.servicio.admcreaservi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicioRequest $request)
    {
        //
        serviciosocial::create([
            'nombre' =>$request['nombre'],
            'descripcion' =>$request['descripcion'],
       ]);
        
       Session::flash('message','Servicio Creado Correctamente');
        return Redirect::to('/admin/serviA');
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
         $serviciosocial = serviciosocial::find($id);
       return view('admin.servicio.admeditservi',['serviciosocial'=>$serviciosocial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id , Request $request)
    {
        //
        $serviciosocial = serviciosocial::find($id);
        $serviciosocial->fill($request->all());
        $serviciosocial->save();
        
        Session::flash('message','Servicio Editado Correctamente');
         return Redirect::to('/admin/serviA');
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
        
        $serviciosocial = serviciosocial::find($id);
     
       $serviciosocial->delete();
       Session::flash('message','Servicio Eliminado Correctamente');
       return Redirect::to('/admin/serviA');
    }
}
