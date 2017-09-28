<?php

namespace Apoyo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Apoyo\subsidio;
use Apoyo\serviciosocial;
use Apoyo\entrega_almuerzo;
use Apoyo\User;
use DB;
use App;


class PdfController extends Controller
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

    public function index()
    {
        return view("admin.pdf.report");
    }

public function pdfusera($id)
    {
        $user   = User::find($id);
         
      
         $dtz = new \DateTimeZone("America/Bogota");  // se define zona horaria
       $now = new \DateTime();//guardamos fecha del sistema
         $now->setTimezone($dtz);
        $fecha2 =  $now->format('Y-m-d');
        $subsidio = subsidio::where('id', '=', $user->sub_id)->value('type');
        $cantidad = entrega_almuerzo::where('codigo','=',$id)->count();
        $cuantos = entrega_almuerzo::where('codigo','=',$id)->get();
        $view = view('admin.pdf.pdfusershow',compact('cuantos','cantidad','user','subsidio','fecha2'));
        $pdf =  App::make('dompdf.wrapper');
        $pdf ->loadHTML($view);
     
        return $pdf->stream('reporte');
    }
public function pdfuserd($id)
    {
        $user   = User::find($id);
         
      
         $dtz = new \DateTimeZone("America/Bogota");  // se define zona horaria
       $now = new \DateTime();//guardamos fecha del sistema
         $now->setTimezone($dtz);
        $fecha2 =  $now->format('Y-m-d');
        $subsidio = subsidio::where('id', '=', $user->sub_id)->value('type');
        $cantidad = entrega_almuerzo::where('codigo','=',$id)->count();
        $cuantos = entrega_almuerzo::where('codigo','=',$id)->get();
        $view = view('admin.pdf.pdfusershow',compact('cuantos','cantidad','user','subsidio','fecha2'));
        $pdf = App::make('dompdf.wrapper');
        $pdf ->loadHTML($view);
         
        return $pdf->download('reporte.pdf');
    }
    
      public function crearPDF($datos,$vistaurl,$tipo)
    {
        $data = $datos;
        $date = date('Y-m-d');
        $view = view($vistaurl,compact('data','date'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }
    }


    public function crear_reporte_porsubsidio($tipo){

     $vistaurl="pdf.reporteusuasub";
     $subsidio=subsidio::orderBy('id','ASC')->get();
     
     //$subsidio = subsidio::where('id', '=', $user->sub_id)->value('type');
 	 
     return $this->crearPDF($subsidio, $vistaurl,$tipo);
    }

    public function crear_reporte_porservicio($tipo){

     $vistaurl="pdf.reporteusuaservi";
     $servicio=serviciosocial::orderBy('id','ASC')->get();
     
     return $this->crearPDF($servicio, $vistaurl,$tipo);
    }

    public function crear_reporte_usuario($tipo){

     $vistaurl="pdf.reporteusuario";
     $user=User::orderBy('codigo','ASC')->get();
     $date = date('Y-m-d');
     
     
     $data = $user;
     $view = view('pdf.reporteusuario',compact('data','date'))->render();
     $pdf = App::make('dompdf.wrapper');
     $pdf ->loadHTML($view);
     //return $pdf->stream('pdf');
      if($tipo==1){return $pdf->stream('reporte');}
      if($tipo==2){return $pdf->download('reporte.pdf'); }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users= User::where('type','estudiante')->find($id); 
        
       
       //dd($users);
//        $users = Users::where('codigo',  $id  AND  'type' , 'estudiante')->get(); //buscamos usuario
        // $users = DB::select('select codigo,nombre,apellido,carrera from users where codigo ='. $id .' and type = "estudiante"');
       
       
        if($users==null)
        {//si el usaurio no existe envia error
              
                $users="error";
                return response()->json($users);    
               
        }else{//si el usuario existe 
           
                    $canti = User::find($id)->entregas_almuerzos->count();
                     $users->setCantidad($canti);
               
                      return response()->json($users->toArray());
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
