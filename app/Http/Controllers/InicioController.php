<?php

namespace Apoyo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Apoyo\User;
use Apoyo\subsidio;
use Apoyo\entrega_almuerzo;
use Apoyo\menu;
use Illuminate\Contracts\Auth\Guard;
use DB;
use App;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        
         $codigo=  Auth::user()->sub_id;
         $codigoe=  Auth::user()->codigo;
         $subsidio = subsidio::where('id', '=', $codigo)->value('type');
         $dtz = new \DateTimeZone("America/Bogota");  // se define zona horaria
         $now = new \DateTime();//guardamos fecha del sistema
         $now->setTimezone($dtz);
        $fecha2 =  $now->format('Y-m-d');//se da formato a la fecha expresado en Año-mes-dia
        $menufecha = menu::where('fecha','=',$fecha2)->value('cantientregada'); 
        $sopa = menu::where('fecha','=',$fecha2)->value('sopa'); 
        $fuerte = menu::where('fecha','=',$fecha2)->value('plato_fuerte'); 
        $postre = menu::where('fecha','=',$fecha2)->value('postre'); 
        $jugo = menu::where('fecha','=',$fecha2)->value('jugo'); 
        $cantidad = entrega_almuerzo::where('codigo','=',$codigoe)->count();
        if($subsidio == 'A'){
            $precio = $cantidad * 700;
        }
        if($subsidio == 'B'){
            $precio = $cantidad * 1300;
        }
        if($subsidio == 'TOTAL'or empty($subsidio)){
            $precio = $cantidad * 0;
        }


        return view("/inicio")->with('subsidio',$subsidio)->with('menufecha',$menufecha)->with('cantidad',$cantidad)->with('sopa',$sopa)->with('fuerte',$fuerte)->with('jugo',$jugo)->with('postre',$postre)->with('precio',$precio);
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
