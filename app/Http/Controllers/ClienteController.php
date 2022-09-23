<?php

namespace App\Http\Controllers;

use App\Circuito;
use App\Cliente;
use App\Vendedor;
use App\Supervisor;
use App\Departamento;
use App\Ciudad;
use App\Barrio;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\FormGuardarCliente;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
	   // $clienteCedula=$request->input('cedula');
       // $clienteNombreApellido=$request->input('nombre_apellido');
	   
	   //$filtro = Cliente::where('id_asesor_mixto','=',$clienteCedula)->get();
	   
	   $circuitos = Circuito::all();
	   $clientes = Cliente::all();
       $departamentos = Departamento::where('id',6)->get();
       // $departamentos = Departamento::all();
        //$ciudades = Ciudad::all();
        $ciudades = Ciudad::where('id_departamento',6)->get();
        $barrios = Barrio::all();
        $vendedores = Vendedor::all();
        $supervisores = Supervisor::all();
		
		$clientes_rutas = DB::table('cliente','vendedor','supervisor','ruta','ruta_circuito')
              ->join('ruta_circuito','cliente.id_circuito_cliente','=','ruta_circuito.id_circuito')
              ->join('ruta', 'ruta.id','=', 'ruta_circuito.id_ruta')
			  ->join('circuito','circuito.id','=','ruta_circuito.id')
			  ->join('vendedor','vendedor.id_ruta_vendedor', '=','ruta.id')			  
			  ->join('supervisor', 'vendedor.id_supervisor', '=', 'supervisor.id') 
              ->select('cliente.*','ruta_circuito.id','ruta.nombre_ruta','circuito.circuito','vendedor.nombre_vendedor','supervisor.nombre_supervisor')
              ->get();
			
		//$clientes_completos = DB::table('vendedor')
         //->join('supervisor', 'vendedor.id_supervisor', '=', 'supervisor.id')
		   //->select('vendedor.*','supervisor.nombre_apellido')
            //->get();
		
			//$clientes_rutas = Cliente::select("cliente.*")
                //->join("ruta_circuito","ruta_circuito.id_circuito","=","cliente.id_circuito_cliente")
              //  ->join("ruta_circuito",function($join){
                //    $join->on("ruta_circuito.id_circuito","=","circuito.id")
                  //      ->on("ruta_circuito.id_ruta","=","ruta.id");
                //})
                //->get();
				
    
	//dd($clientes_rutas);
	//dd($clientes_completos);
			
			
			
			
			
			
			
		 // dd($clientes_rutas);
		
        /// dd($departamentos);
        return view('cliente.index',compact('clientes','supervisores','ciudades','barrios','vendedores','circuitos','clientes_rutas'));
    }



  /**
    public function getFiltrar(Request $request)
    {
       
	    $clienteCedula=$request->input('cedula');
        $clienteNombreApellido=$request->input('nombre_apellido');
	   
	   $filtro = Cliente::where('id_asesor_mixto','=',$clienteCedula)->get();
	   
	   $clientes = Cliente::all();
       $departamentos = Departamento::where('id',6)->get();
       // $departamentos = Departamento::all();
        //$ciudades = Ciudad::all();
        $ciudades = Ciudad::where('id_departamento',6)->get();
        $barrios = Barrio::all();
        $vendedores = $filtro;
        /// dd($departamentos);
        return view('cliente.index',compact('clientes','departamentos','ciudades','barrios','vendedores'));
    }
	 */
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$circuitos = Circuito::all();
	    $departamentos = Departamento::where('id',6)->get();
        $ciudades = Ciudad::where('id_departamento',6)->get();
		$barrios = Barrio::all();
        $vendedores = Vendedor::all();
		$clientes = Cliente::all();
		
	
       return view('cliente.create',compact('clientes','departamentos','ciudades','barrios','vendedores','circuitos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormGuardarCliente $request)
    {
        try{
            $cliente = new Cliente();

            $cliente->cc_nit = $request->input('cc_nit');
            $cliente->primer_nombre = $request->input('primer_nombre');
            $cliente->segundo_nombre = $request->input('segundo_nombre');
            $cliente->primer_apellido = $request->input('primer_apellido');
            $cliente->segundo_apellido = $request->input('segundo_apellido');
            
            $cliente->razon_social = $request->input('razon_social');

            $cliente->direccion = $request->input('direccion');
            $cliente->telefono_1 = $request->input('telefono_1');
            $cliente->telefono_2 = $request->input('telefono_2');
            $cliente->correo = $request->input('correo');
            $cliente->contacto = $request->input('contacto');
            $cliente->departamento = $request->input('departamento');
            $cliente->ciudad = $request->input('ciudad');
            $cliente->barrio = $request->input('barrio');
            $cliente->tipo_de_negocio = $request->input('tipo_de_negocio');
            $cliente->idpdv = $request->input('idpdv');
            $cliente->id_circuito_cliente = $request->input('circuito');
         
            $cliente->id_usuario = Auth::user()->id;
            $cliente->save();


            return redirect()->back()->with('mensajeExito', 'Se Guardo Cliente correctamente');

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
            $cliente = Cliente::where('cc_nit',$id)->firstOrFail();

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
		 try{
			   //$cliente = new Cliente();

			 
			 $cliente = Cliente::where('id','=',$id)->get();
          
             $cliente->cc_nit = $request->input('cc_nit');
            $cliente->primer_nombre = $request->input('primer_nombre');
            $cliente->segundo_nombre = $request->input('segundo_nombre');
            $cliente->primer_apellido = $request->input('primer_apellido');
            $cliente->segundo_apellido = $request->input('segundo_apellido');
            
            $cliente->razon_social = $request->input('razon_social');

            $cliente->direccion = $request->input('direccion');
            $cliente->telefono_1 = $request->input('telefono_1');
            $cliente->telefono_2 = $request->input('telefono_2');
            $cliente->correo = $request->input('correo');
            $cliente->contacto = $request->input('contacto');
            $cliente->departamento = $request->input('departamento');
            $cliente->ciudad = $request->input('ciudad');
            $cliente->barrio = $request->input('barrio');
            $cliente->tipo_de_negocio = $request->input('tipo_de_negocio');
            $cliente->idpdv = $request->input('idpdv');
            $cliente->circuito = $request->input('circuito');
           
            $cliente->nombre_mixto = $request->input('nombre_apellido');
            $cliente->nombre_supervisor = $request->input('nombre_supervisor');

            $cliente->id_usuario = Auth::user()->id;
            $cliente->razon_social = $request->input('barrio');



            $cliente->save();


            return redirect()->back()->with('mensajeExito', 'Se Actualizo correctamente');

        }catch (\Exception $ex){
            return redirect()->back()->with('mensaje', 'Error al Actualizar - '.$ex->getMessage());
        }
        
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
