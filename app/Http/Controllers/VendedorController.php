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
use App\Vendedor_Supervisor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\FormGuardarVendedor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VendedorController extends Controller
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
		  	$vendedor_rutas = DB::table('vendedor','supervisor','ruta','ruta_circuito')
              ->join('ruta', 'ruta.id','=', 'vendedor.id_ruta_vendedor')	  
			  ->join('supervisor', 'vendedor.id_supervisor', '=', 'supervisor.id') 
              ->select('vendedor.*','ruta.nombre_ruta','supervisor.nombre_supervisor')
			  ->get();
              //->select('vendedor.*')
              //->get();
			 // ->skip(10)->take(5)->get();
       //dd($vendedor_rutas);
        return view('vendedor.index',compact('departamentos','ciudades','barrios','circuitos','rutas','supervisores','vendedor_rutas'));
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
		$departamentos = Departamento::where('id',6)->get();
		
         //dd($clientes);
		//return $this->hasMany('App\Article', 'nombre_clave_foranea', 'nombre_clave_primaria_local');
         return view('vendedor.create',compact('clientes','departamentos','ciudades','barrios','vendedores','circuitos','rutas','supervisores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormGuardarVendedor $request)
    {
        try{
            $vendedor = new Vendedor();
			//$vendedor_supervisor = new Vendedor_Supervisor();

            $vendedor->cedula = $request->input('cedula');
            $vendedor->primer_nombre = $request->input('primer_nombre');
            $vendedor->segundo_nombre = $request->input('segundo_nombre');
			$nombre= $request->input('primer_nombre');
			$apellido= $request->input('primer_apellido');
			$unir_nombre_apellido=$nombre." ".$apellido ;
            $vendedor->nombre_vendedor = $unir_nombre_apellido;
            $vendedor->primer_apellido = $request->input('primer_apellido');
            $vendedor->segundo_apellido = $request->input('segundo_apellido');
            $vendedor->direccion = $request->input('direccion');
            $vendedor->telefono_1 = $request->input('telefono_1');
            $vendedor->telefono_2 = $request->input('telefono_2');
            $vendedor->correo = $request->input('correo');
            $vendedor->departamento = $request->input('departamento');
            $vendedor->ciudad = $request->input('ciudad');
            $vendedor->barrio = $request->input('barrio');
            $vendedor->id_supervisor = $request->input('supervisor');
            $vendedor->id_ruta_vendedor = $request->input('ruta');
			$maxValue = Vendedor::max('id');
		//	$vendedor_supervisor->id_asesor = $maxValue;
		//	$vendedor_supervisor->id_supervisor = $request->input('supervisor');
                  
			//dd($vendedor_supervisor)
            $vendedor->save();
			//$vendedor_supervisor->save();

            return redirect()->back()->with('mensajeExito', 'Se Guardo Vendedor correctamente');

        }catch (\Exception $ex){
           return redirect()->back()->with('mensaje', 'Error al guardar - '.$ex->getMessage());
           // return redirect()->back()->with('mensaje', 'Error al guardar la cedula ya existe');
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
       //$id = $request->id;
		$ids=$id;
       //$circuitos = Circuito::all();
	   //$rutas = Ruta::all();
	    //dd($rutas);
		$vendedor = Vendedor::where('id','=',$id)->get();
		$rutas = Ruta::where('id',$id)->get();
	     //dump($circuito);
	    //dump($ids);
	   // dd($id);<
	     $departamentos = Departamento::where('id',6)->get();
		 $ciudades = Ciudad::where('id_departamento',6)->get();
         $barrios = Barrio::all();
		 $supervisores = Supervisor::all();
		 
	   return view('vendedor.edit',compact('vendedor','ids','rutas','departamentos','ciudades','barrios','supervisores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function actualizar(FormGuardarVendedor $request)
    {
		 try{
			    $vendedor = new Vendedor();
				

			   $id = $request->id; 
				//dd($id);
				
			    $vendedor = Vendedor::where('id','=',$id)->first();
		
          
            $vendedor->cedula = $request->input('cedula');
            $vendedor->primer_nombre = $request->input('primer_nombre');
            $vendedor->segundo_nombre = $request->input('segundo_nombre');
			$nombre= $request->input('primer_nombre');
			$apellido= $request->input('primer_apellido');
			$unir_nombre_apellido=$nombre." ".$apellido ;
            $vendedor->nombre_vendedor = $unir_nombre_apellido;
            $vendedor->primer_apellido = $request->input('primer_apellido');
            $vendedor->segundo_apellido = $request->input('segundo_apellido');
            $vendedor->direccion = $request->input('direccion');
            $vendedor->telefono_1 = $request->input('telefono_1');
            $vendedor->telefono_2 = $request->input('telefono_2');
            $vendedor->correo = $request->input('correo');
            $vendedor->departamento = $request->input('departamento');
            $vendedor->ciudad = $request->input('ciudad');
            $vendedor->barrio = $request->input('barrio');
            $vendedor->id_supervisor = $request->input('supervisor');
            $vendedor->id_ruta_vendedor = $request->input('ruta');
			$maxValue = Vendedor::max('id');
				$vendedor->timestamps = false;
			
     
				$vendedor->update();
				
				


            return redirect()->back()->with('mensajeExito', 'Se Actualizo correctamente el Vendedor');

        }catch (\Exception $ex){
            return redirect()->back()->with('mensaje', 'Error al Actualizar el Vendedor- '.$ex->getMessage());
        }
        
    } 
	 
	 
	 
	 
	 
	 
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
