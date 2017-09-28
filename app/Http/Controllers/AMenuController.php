<?php

namespace Apoyo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Apoyo\menu;
use Apoyo\Http\Requests\MenuRequest;
use Laracasts\Flash\Flash;

class AMenuController extends Controller
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
        $menu = menu::menu($request->get('name'))->orderBy('id','DESC')->paginate(5);
        return view('admin.menu.admviewmenu',compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.admcreamenu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        
        $fe = menu::where('fecha', '=', $request['fecha'])->value('fecha');
        if(empty($fe)){
            menu::create([
            'sopa' =>$request['sopa'],
            'plato_fuerte' =>$request['plato_fuerte'],
            'jugo' =>$request['jugo'],
            'postre' =>$request['postre'],
            'cantitotal' =>$request['cantitotal'],
            'cantientregada' =>$request['cantitotal'],
            'fecha' =>$request['fecha'],

         ]);

            Session::flash('message','Menu registrado correctamente');
        }else{
            Session::flash('message','El menu de la fecha selecciona ya existe');
        }
        
        
       //Session::flash('message','Menú Creado Correctamente');
       
        return Redirect::to('/admin/menuA');
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
        $menu = menu::find($id);
       return view('admin.menu.admeditmenu',['menu'=>$menu]);
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
        $menu = menu::find($id);
        $menu->fill($request->all());
        $menu->save();
        
        Session::flash('message','Menú Editado Correctamente');
         return Redirect::to('/admin/menuA');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = menu::find($id);
     
       $menu->delete();
       Session::flash('message','Menú Eliminado Correctamente');
       return Redirect::to('/admin/menuA');
    }
}
