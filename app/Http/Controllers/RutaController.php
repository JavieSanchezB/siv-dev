<?php

namespace App\Http\Controllers;

use App\Circuito;
use App\Ruta;
use App\Ruta_Circuito;
use Illuminate\Http\Request;
use App\Http\Requests\FormGuardarRuta;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RutaController extends Controller
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
	    //dump($rutas);
      
        return view('ruta.index',compact('circuitos','rutas'));
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
      
        return view('ruta.create',compact('circuitos','rutas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormGuardarRuta $request)
    {
        try{
            $ruta = new Ruta();

           
                
            $ruta->nombre_ruta = $request->input('nombre_ruta');
         //   $ruta->	id_circuito_ruta = $request->input('id_circuito_ruta');
         //   $ruta->	id_circuito_ruta =null;


            $ruta->save();


            return redirect()->back()->with('mensajeExito', 'Se Guardo la Ruta correctamente');

        }catch (\Exception $ex){
            //return redirect()->back()->with('mensaje', 'Error al guardar la Ruta - '.$ex->getMessage());
            return redirect()->back()->with('mensaje', 'Error al guardar la Ruta - ya existe ');
        }

    }
	
	
	public function asignarruta(FormGuardarRuta $request)
    {
        try{
            $ruta = new Ruta_Circuito();

           
                
            $ruta->id_ruta = $request->input('nombre_ruta');
			$ruta->	id_circuito = $request->input('id_circuito_ruta');
          


            $ruta->save();


            return redirect()->back()->with('mensajeExito', 'Se asigno ruta correctamente');

        }catch (\Exception $ex){
            /** return redirect()->back()->with('mensaje', 'Error al asignar la ruta - '.$ex->getMessage()); */
            return redirect()->back()->with('mensaje', 'Circuito ya se encuentra asignado');
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
        $circuitos = Circuito::all();
	    $rutas = Ruta::all();
	    //dd($rutas);
	    //dump($rutas);
      
        return view('ruta.show',compact('circuitos','rutas'));
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
		$rutanombre = Ruta::where('id','=',$id)->first();
		//$rutanombre = $ruta->nombre_ruta()->first();
		
	    //dump($circuito);
	    //dump($ids);
	   // dd($id);
	   //dd($rutanombre);
      
        return view('ruta.edit',compact('rutanombre','ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizarruta(Request $request)
    {
				 try{
			    $ruta = new Ruta();
				//$circuito->exists = true;


			   $id = $request->id; 
				//	dd($id);
				
			    $ruta = Ruta::where('id','=',$id)->first();
				//dd($circuito);
				
			   //$circuito = Circuito::find($id);
          
                $ruta->nombre_ruta = $request->input('nombre_ruta');
				//$actualizarnombre = $request->input('nombre_circuito');
				$ruta->timestamps = false;
				// $circuito->updated_at = Carbon::now();
				//$circuito->save(['timestamps' => FALSE]);
     
				$ruta->update();
				
				
				//$query =  DB::table('circuito')->where('id', $id)->update(['circuito' =>$actualizarnombre ]);
				///dd($query);

            return redirect()->back()->with('mensajeExito', 'Se Actualizo correctamente la Ruta');

        }catch (\Exception $ex){
            return redirect()->back()->with('mensaje', 'Error al Actualizar la Ruta '.$ex->getMessage());
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
