<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\FormGuardarProducto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
         //dd($clientes);
        return view('producto.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormGuardarProducto $request)
    {
        try{
            $producto = new Producto();

            $producto->codigo = $request->input('codigo');
            $producto->codigo_de_barras = $request->input('codigo_de_barras');
            $producto->descripcion = $request->input('descripcion');
            $producto->referencia = $request->input('referencia');
            $producto->precio_venta = $request->input('precio_venta');
            $producto->tipo_producto = $request->input('tipo_producto');
            $producto->observacion = $request->input('observacion');
            $producto->id_usuario = Auth::user()->id;
                  

            $producto->save();


            return redirect()->back()->with('mensajeExito', 'Se Guardo correctamente El Producto');

        }catch (\Exception $ex){
            return redirect()->back()->with('mensaje', 'Error al guardar Procuto - '.$ex->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if ($request->ajax()){
            $cliente = Cliente::where('idpdv',$id)->firstOrFail();

            return response()->json($cliente);
        }

        return null;
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
