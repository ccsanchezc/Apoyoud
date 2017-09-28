<?php

namespace Apoyo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Apoyo\subsidio;
use Apoyo\Http\Requests\SubsidioRequest;

class ASubController extends Controller
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
        $subsidio = subsidio::subsi($request->get('name'))->orderBy('id','DESC')->paginate(5);
        return view('admin.subsidio.admviewsub',compact('subsidio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subsidio.admcreasub');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubsidioRequest $request)
    {
        subsidio::create([
            'descripcion' =>$request['descripcion'],
            'type' =>$request['type'],
       ]);
        
        Session::flash('message','Subsidio Creado Correctamente');
        return Redirect::to('/admin/sub');
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
       $subsidio = subsidio::find($id);
       return view('admin.subsidio.admeditsub',['subsidio'=>$subsidio]);
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
        $subsidio = subsidio::find($id);
        $subsidio->fill($request->all());
        $subsidio->save();
        
        Session::flash('message','Subsidio Editado Correctamente');
        return Redirect::to('/admin/sub');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subsidio = subsidio::find($id);
     
        $subsidio->delete();
        Session::flash('message','Subsidio Eliminado Correctamente');
        return Redirect::to('/admin/sub');
    }
}
