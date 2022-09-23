<?php

namespace App\Http\Controllers;

use App\Circuito;
use App\Ruta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FormGuardarCircuito;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CircuitoController extends Controller
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
	   $rutas = Ruta::all();
	    //dd($rutas);
	   // dump($rutas);
      
        return view('circuito.index',compact('circuitos','rutas'));
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
	   $rutas = Ruta::all();
	    //dd($rutas);
	    //dump($rutas);
      
        return view('circuito.create',compact('circuitos','rutas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormGuardarCircuito $request)
    {
        try{
            $circuito = new Circuito();

           
                
            $circuito->circuito = $request->input('nombre_circuito');
        

            $circuito->save();


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
		//$id = $request->id;
		$ids=$id;
       //$circuitos = Circuito::all();
	   //$rutas = Ruta::all();
	    //dd($rutas);
		$circuito = Circuito::where('id','=',$id)->get();
	    dump($circuito);
	    dump($ids);
	   // dd($id);
      
        return view('circuito.edit',compact('circuito','ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(FormGuardarCircuito $request)
    {
		 try{
			    $circuito = new Circuito();
				//$circuito->exists = true;


			   $id = $request->id; 
				//	dd($id);
				
			    $circuito = Circuito::where('id','=',$id)->first();
				//dd($circuito);
				
			   //$circuito = Circuito::find($id);
          
                $circuito->circuito = $request->input('nombre_circuito');
				//$actualizarnombre = $request->input('nombre_circuito');
				$circuito->timestamps = false;
				// $circuito->updated_at = Carbon::now();
				//$circuito->save(['timestamps' => FALSE]);
     
				$circuito->update();
				
				
				//$query =  DB::table('circuito')->where('id', $id)->update(['circuito' =>$actualizarnombre ]);
				///dd($query);

            return redirect()->back()->with('mensajeExito', 'Se Actualizo correctamente el Circuito');

        }catch (\Exception $ex){
            return redirect()->back()->with('mensaje', 'Error al Actualizar el Circuito- '.$ex->getMessage());
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
