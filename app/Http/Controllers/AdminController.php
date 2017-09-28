<?php

namespace Apoyo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Apoyo\User;
use Apoyo\serviciosocial;
use Apoyo\subsidio;
use Apoyo\Http\Requests\UserRequest;
use DB;
use App;

class AdminController extends Controller
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
        //dd($request->get('name'));
        $users = User::name($request->get('name'))->orderBy('codigo','DESC')->paginate(5);
        $users->each(function($users){
            $users->sub_usuario;
            $users->servi_usuario;
            
        });
      
        return view('admin.user.admviewuser',compact('users'));
    }
    
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $subsidio = subsidio::orderBy('type','ASC')->pluck('type','id');
       return view('admin.user.admcreauser')->with('subsidio', $subsidio);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        User::create([
            'codigo' =>$request['codigo'],
            'nombre' =>$request['nombre'],
            'apellido' =>$request['apellido'],
            'email'=>$request['email'],
            'telefono' =>$request['telefono'],            
            'password'=>$request['password'],
            'direccion' =>$request['direccion'],
            'type'=>$request['type'],
            'carrera' =>$request['carrera'],
            'sub_id' =>$request['sub_id'],
       ]);
        Session::flash('message','Usuario Creado Correctamente');
        
         return Redirect::to('/admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users =User::find($id);
        $view = view('pdf.show',compact('users'));
        $pdf = App::make('dompdf.wrapper');
        $pdf ->loadHTML($view);
        return $pdf->stream('pdf');
       
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        //
          $servicio = serviciosocial::select('id', DB::raw('CONCAT(nombre, ": ", descripcion) AS full_name'))->orderBy('id')->pluck('full_name', 'id');
         $subsidio = subsidio::orderBy('type','ASC')->pluck('type','id');
        $user = User::find($codigo);
       return view('admin.user.admedituser',['user'=>$user])->with('subsidio', $subsidio)->with('servicio', $servicio);
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
        if($request->x1=="admin"){
          $carrera = NULL;
            $sub_id = NULL;     
            
            $request->sub_id = $sub_id;
           $request->carrera = $carrera;
            $request->sub_id = $sub_id;
            
             //dd($request->carrera);
           $user = User::find($codigo);
        $user->fill($request->all());
             $user->Servi_id = NULL;
           $user->carrera = NULL;
            $user->sub_id = NULL;
        $user->save();
        
        Session::flash('message','Usuario Editado Correctamente');
         return Redirect::to('/admin/user');
            
            
            
        }if($request->x1=="supervisor"){
            
            $carrera = NULL;
            $sub_id = NULL;
            
            $request->sub_id = $sub_id;
           $request->carrera = $carrera;
            $request->sub_id = $sub_id;
            
             $user = User::find($codigo);
        $user->fill($request->all());
         $user->Servi_id = NULL;
           $user->carrera = NULL;
            $user->sub_id = NULL;
             
        $user->save();
        
        Session::flash('message','Usuario Editado Correctamente');
         return Redirect::to('/admin/user');
            
            
        }
        
        
        
         $user = User::find($codigo);
        $user->fill($request->all());
      
        $user->save();
        
        Session::flash('message','Usuario Editado Correctamente');
         return Redirect::to('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codigo)
    {
        //
        $user = User::find($codigo);
     
        $user->delete();
        Session::flash('message','Usuario Eliminado Correctamente');
         return Redirect::to('/admin/user/');
    }
}
