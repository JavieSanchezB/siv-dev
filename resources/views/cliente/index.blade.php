@extends('layouts.newApp')

@section('menu')
    @include('partials.menu')
@endsection

@section('content')
    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="{{url('/')}}">Inicio</a>
            </li>
            <li>
                <a href="{{url('cliente.index')}}">Listar Clientes</a>
            </li>
        </ul>
    </div>

    @if (Session::has('mensaje'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Ohh! </strong>{{ Session::get('mensaje') }}
        </div>
    @endif

    @if (Session::has('mensajeExito'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Bien! </strong> {{ Session::get('mensajeExito') }}
        </div>
    @endif

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-star"></i> Listar Clientes</h2>

                     <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
				  <form method="GET" action="{{route('cliente.index')}}" id="Formuario" role="form" data-toggle="validator" autocomplete="off">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example">
						<div class="row">

            


							<div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="clientes">Clientes</label>

                                    <select class="form-control" name="cliente" id="cliente" data-rel="chosen" data-placeholder="Escoger cliente">
										 <option></option>
                                        @foreach($clientes as $cliente)
										<option value="{{ $cliente['cliente'] }}">{{ $cliente['cc_nit'] }}</option>
										@endforeach
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

							
							
                                 <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <br>
                                    <button type="submit" form="formFiltrarCliente" class="btn btn-warning">Limpiar Filtro</button>
                                </div>
                            </div>
                        </div>
						    </form>
                            <thead>

                            <th> # </th>
                            
                            <th>Primer Nombre</th>
                            <th>Segundo Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Razón Social</th>
                            <th>Contacto #1</th>
                            <th>Contacto #2</th>
                            <th>Nombre a contactar</th>

                            <th>Correo</th>
                            <th>Dirección</th>
                            <th>Barrio</th>
                            <th>Ciudad</th>
                            <th>Tipo De Punto</th>
                            

                            <th> FECHA DE CREACION</th>
                            <th> FECHA DE MODIFICACION</th>
                            <th> EDITAR</th>
                            <!-- <th> ELIMINAR</th>-->

                            
                            
                            </thead>
                            <tbody>
                            @foreach($clientes as $cliente)
                                <tr data-id="{{$cliente->id}}">
                                    
                                    <td>{{$cliente->id}}</td>                                
                                    <td>{{$cliente->primer_nombre}}</td>                                
                                    <td>{{$cliente->segundo_nombre}}</td>                                
                                    <td>{{$cliente->primer_apellido}}</td>                                
                                    <td>{{$cliente->segundo_apellido}}</td> 
                                    <td>{{$cliente->razon_social}}</td> 

                                    <td>{{$cliente->telefono_1}}</td>                                
                                    <td>{{$cliente->telefono_2}}</td>                               
                                    <td>{{$cliente->contacto}}</td>                               
                                    <td>{{$cliente->correo}}</td>
                                    <td>{{$cliente->direccion}}</td>
                                    <td>{{$cliente->barrio}}</td> 
                                    <td>{{$cliente->ciudad}}</td>                                                                                               
                                    <td>{{$cliente->tipo_de_negocio}}</td>                                
                                    <td>{{$cliente->created_at}}</td>
                                    <td>{{$cliente->updated_at}}</td>
                                    <td><a class="btn btn-success" id="update" value="Update" href="{{ route('cliente.update', ['id' => $cliente->id]) }}"><i class="glyphicon glyphicon-pencil"></i>EDITAR</a></td>
                                <!--    <td><a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-remove"></i>ELIMINAR</a></td>-->
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div><!--/row-->
@endsection

@push('script')
   
	 <script>
	 


	 
  $(document).ready(function () {
         var table =  $('#example').DataTable({
				dom: 'Bfrtip',
        buttons: [
            'excel'
			
        ],
                "language": {
                    url: "//cdn.datatables.net/plug-ins/1.10.10/i18n/Spanish.json"
                },
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "TODOS"]
                ],
                filter: true,
                sort: true,
                info: true,
                autoWidth: true,
                order: [
                    [1, "desc"]
                ],
                aoColumnDefs: [{
                    bSortable: false,
                    "aTargets": [-1]
                }]
				
			
            });
			
		$('#cc_nit').change( function() {
      table
        .search( this.value )
        .draw();
		
    } );
	
			$('#nombre_apellido').change( function() {
      table
        .search( this.value )
        .draw();
		$('#cc_nit').val('');
    } );
	
			$('#circuito').change( function() {
      table
        .search( this.value )
        .draw();
		
    } );
	
	$('#departamento').change( function() {
      table
        .search( this.value )
        .draw();
		
    } );
	
		$('#ciudad').change( function() {
      table
        .search( this.value )
        .draw();
		
    } );
	
			$('#barrio').change( function() {
      table
        .search( this.value )
        .draw();
		
    } );
	

	
	      
    $('#nombre_apellido').on('change', function(e){
       
   //  alert("This input field has lost its focus.");
	 
       
	//	$('#cc_nit').val=null;
       


    });
		
	
		
		
        });
		</script>	 


@endpush