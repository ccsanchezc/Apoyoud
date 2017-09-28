<?php

namespace Apoyo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Apoyo\serviciosocial;
use Apoyo\User;
use Illuminate\Contracts\Auth\Guard;
use DB;

class ServiUsuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware(['auth','estudiante']);
    }
    
    public function index()
    {
        //
       $serviciosocial = serviciosocial::paginate(5);
        return view('estudi.agreservicio.estuviewservi',compact('serviciosocial'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicioRequest $request)
    {
       
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
        //$serviciosocial = serviciosocial::find($id);
        $serviciosocial = serviciosocial::where('id', '=', $id)->value('nombre');
        $serviid = serviciosocial::where('id', '=', $id)->value('id');
        $user = Auth::user();

        if(Auth::user()->servicios()){
            return view('estudi.agreservicio.estueditservi',['serviciosocial'=>$serviciosocial])->with('user',$user)->with('serviid', $serviid);;
        }else{
        	
        	Session::flash('message','El estudiante ya cuenta con un servicio social y no puede agregar otro');
        	return Redirect::to('/estudi/serviusu');
        }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update($codigo, Request $request)
    {
        //
        //$user = User::find($codigo);
       // dd($request->Servi_id);
        $user = Auth::user();
        $user->fill($request->all());
        $user->save();
        
        Session::flash('message','Servicio Agregado Correctamente');
         return Redirect::to('/estudi/serviusu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}


