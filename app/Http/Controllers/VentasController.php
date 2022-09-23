<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormGuardarVenta;
use App\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fechaInicial=$request->input('fechaInicial');
        $fechaFinal=$request->input('fechaFinal');

        if (!isset($fechaInicial) or !isset($fechaInicial)){
            $fechaInicial=Carbon::now()->toDateString();
            $fechaFinal=Carbon::now()->toDateString();
        }

        if (Auth::user()->rol->id===1){
            $ventas = Venta::where('for_users_id','=',Auth::user()->id)
                ->where('fecha_venta','>=',$fechaInicial)
                ->where('fecha_venta','<=',$fechaFinal) 
                ->get();

                //dd($ventas);

            return view('ventas.index',compact('ventas','fechaInicial','fechaFinal'));
        }

        if (Auth::user()->rol->id===2){
           $ventas = Venta::where('for_users_id','!=',Auth::user()->id)
                ->where('fecha_venta','>=',$fechaInicial)
                ->where('fecha_venta','<=',$fechaFinal)
                ->get();

            return view('ventas.index',compact('ventas','fechaInicial','fechaFinal'));
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormGuardarVenta $request)
    {

        try{
            $venta = new Venta();

            $venta->fecha_venta = $request->input('periodo');
            $venta->tipo_linea = $request->input('tipo_linea');
            $venta->producto_vendido = $request->input('producto_vendido');
            $venta->valor_incentivo = $request->input('valor_incentivo');
            $venta->movil_tigo = $request->input('mov_tigo');
            $venta->movil_portado = $request->input('mov_portado');
            $venta->movil_cliente = $request->input('movil_cliente');

            $venta->tabla_dms_idpdv = (int) $request->input('idpdv');
            $venta->for_users_id = Auth::user()->id;

            $venta->save();


            return redirect()->back()->with('mensajeExito', 'Se Guardo correctamente');

        }catch (\Exception $ex){
            return redirect()->back()->with('mensaje', 'Error al guardar - '.$ex->getMessage());
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
