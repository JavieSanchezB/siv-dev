<?php

namespace App\Http\Controllers;


use App\Circuito;
use App\Cliente;
use App\Vendedor;
use App\Supervisor;
use App\Departamento;
use App\Ciudad;
use App\Barrio;
use App\Ruta;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\FormGuardarSupervisor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $circuitos = Circuito::all();
	   $clientes = Cliente::all();
       $departamentos = Departamento::where('id',6)->get();
       // $departamentos = Departamento::all();
        //$ciudades = Ciudad::all();
        $ciudades = Ciudad::where('id_departamento',6)->get();
        $barrios = Barrio::all();
        $vendedores = Vendedor::all();
        $supervisores = Supervisor::all();
		  $rutas = Ruta::all();
         //dd($clientes);
		// $clientes_rutas = DB::table('supervisor')->select('supervisor.*')
            //  ->get();
        return view('supervisor.index',compact('supervisores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$circuitos = Circuito::all();
	   $clientes = Cliente::all();
       $departamentos = Departamento::where('id',6)->get();
       // $departamentos = Departamento::all();
        //$ciudades = Ciudad::all();
        $ciudades = Ciudad::where('id_departamento',6)->get();
        $barrios = Barrio::all();
        $vendedores = Vendedor::all();
		$supervisores = Supervisor::all();
	    $rutas = Ruta::all();
         //dd($clientes);
       return view('supervisor.create',compact('clientes','departamentos','ciudades','barrios','vendedores','circuitos','rutas','supervisores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormGuardarSupervisor $request)
    {
        try{
            $supervisor = new Supervisor();

            $supervisor->cedula = $request->input('cedula');
            $supervisor->primer_nombre = $request->input('primer_nombre');
            $supervisor->segundo_nombre = $request->input('segundo_nombre');
			$nombre= $request->input('primer_nombre');
			$apellido= $request->input('primer_apellido');
			$unir_nombre_apellido=$nombre." ".$apellido ;
            $supervisor->nombre_supervisor = $unir_nombre_apellido;
            $supervisor->primer_apellido = $request->input('primer_apellido');
            $supervisor->segundo_apellido = $request->input('segundo_apellido');
            $supervisor->direccion = $request->input('direccion');
            $supervisor->telefono_1 = $request->input('telefono_1');
            $supervisor->telefono_2 = $request->input('telefono_2');
            $supervisor->correo = $request->input('correo');
            $supervisor->departamento = $request->input('departamento');
            $supervisor->ciudad = $request->input('ciudad');
            $supervisor->barrio = $request->input('barrio');
         
                  

            $supervisor->save();


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
