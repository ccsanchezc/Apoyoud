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

class EPdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','estudiante']);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function pdfRecibo(){
        $date = date('Y-m-d');
        $id = Auth::user()->codigo;
        $user   = Auth::user();
        $subsidio = subsidio::where('id', '=', $user->sub_id)->value('type');
        $cantidad = entrega_almuerzo::where('codigo','=',$id)->count();
        $cuantos = entrega_almuerzo::where('codigo','=',$id)->get();
        if($subsidio == 'A'){
            $valor = 700;
            $precio = $cantidad * 700;
        }
        if($subsidio == 'B'){
            $valor = 1300;
            $precio = $cantidad * 1300;
        }
        if($subsidio == 'TOTAL'){
            $valor = 0;
            $precio = $cantidad * 0;
        }
        
        $view = view('pdf.recibo',compact('cuantos','date'))->with('cantidad',$cantidad)->with('user',$user)->with('precio',$precio)->with('valor',$valor)->with('subsidio',$subsidio)->render();
        
        $pdf = App::make('dompdf.wrapper');
        $pdf ->loadHTML($view);
        return $pdf->stream('pdf');
        //return $this->crearPDF($user, $vistaurl,$tipo);
    }

     public function pdfhistorico()
    {
          
        $id = Auth::user()->codigo;
        $dtz = new \DateTimeZone("America/Bogota");  // se define zona horaria
        $now = new \DateTime();//guardamos fecha del sistema
         $now->setTimezone($dtz);
        $fecha2 =  $now->format('Y-m-d');
        $user   = Auth::user();
        $subsidio = subsidio::where('id', '=', $user->sub_id)->value('type');
        $cantidad = entrega_almuerzo::where('codigo','=',$id)->count();
        $cuantos = entrega_almuerzo::where('codigo','=',$id)->get();
        $view = view('pdf.show',compact('cuantos','fecha2'))->with('cantidad',$cantidad)->with('user',$user)->with('subsidio',$subsidio);
        $pdf = App::make('dompdf.wrapper');
        $pdf ->loadHTML($view);
        return $pdf->stream('pdf');
    }

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
