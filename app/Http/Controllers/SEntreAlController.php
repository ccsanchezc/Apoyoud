<?php

namespace Apoyo\Http\Controllers;

use Illuminate\Http\Request;
use Apoyo\entrega_almuerzo;
use Illuminate\Support\Facades\Session; 
use Apoyo\User;
use Apoyo\menu;
use DB;

class SEntreAlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','supervisor']);
    }
    
    public function index()
    {
        //
        return view('super.entregaalmuerzo.supentregaalmuerzo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        if($request->ajax()){
            entrega_almuerzo::create([
            'codigo' =>$request['codigo'],
            'fecha' =>$request['fecha'],
       ]);
            return response()->json([
                "mensaje" =>$request->all()
            ]);
             DB::table('menu')->where('fecha', $fecha2)->decrement('cantientregada');
        }
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
     //   $sql ="select codigo,nombre,apellido,carrera from users where codigo ='. $id .' and type = 'estudiante' ";
     // $users = DB::select($sql)->get();

      $users= User::where('type','estudiante')->find($id); 
      
//        $users = Users::where('codigo',  $id  AND  'type' , 'estudiante')->get(); //buscamos usuario
        // $users = DB::select('select codigo,nombre,apellido,carrera from users where codigo ='. $id .' and type = "estudiante"');
        $dtz = new \DateTimeZone("America/Bogota");  // se define zona horaria
       $now = new \DateTime();//guardamos fecha del sistema
         $now->setTimezone($dtz);
        $fecha2 =  $now->format('Y-m-d');//se da formato a la fecha expresado en Año-mes-dia
       
        if($users==null)
        {//si el usaurio no existe envia error
              
                $users="error";
                return response()->json($users);    
               
        }else{//si el usuario existe 
           $x = 0;
       $users->setCantidad($x);
               $entrega = entrega_almuerzo::orderBy('fecha','DESC')->find($id); //busca la fecha 
                
                    if($entrega==null){
                       // $users = $users->toArray();
                       // dd($users);
                      //return json_encode($users);
                        
                      return response()->json($users->toArray());
                    }else{
                        
                        $splitfecha = explode(' ',$entrega->fecha);
                       
                        if($splitfecha[0]==$fecha2){
                            $users="ya";
                          return response()->json($users);   
                            
                        }else{
                          
                              return response()->json($users->toArray());
                            
                        }
                        
                    }
               
             
                
          }
    
        
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
