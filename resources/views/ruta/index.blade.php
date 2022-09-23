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
                <a href="{{url('ruta.index')}}">Listar Rutas</a>
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
                    <h2><i class="glyphicon glyphicon-star"></i> Listar Rutas</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
				  <form method="GET" action="{{route('ruta.index')}}" id="formFiltrarCliente" role="form" data-toggle="validator" autocomplete="off">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example">
						<div class="row">

            
<!--/

							<div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="circuito">CIRCUITO</label>

                                    <select class="form-control" name="circuito" id="circuito" data-rel="chosen" data-placeholder="Escoger Circuito">
										 <option></option>
                                        @foreach($circuitos as $circuito)
										<option value="{{ $circuito['circuito'] }}">{{ $circuito['circuito'] }}</option>
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
row-->						    </form>
                            <thead>

                            <th> # </th>
                            <th>NOMBRE RUTA</th>
                            <th> FECHA DE CREACION</th>
                            <th> FECHA DE MODIFICACION</th>
							<th> EDITAR</th>

                            
                            
                            </thead>
                            <tbody>
                            @foreach($rutas as $ruta)
                                <tr data-id="{{$ruta->id}}">
                                    <td>{{$ruta->id}}</td>
                                    <td>{{$ruta->nombre_ruta}}</td>
                                    <td>{{$ruta->created_at}}</td>
                                    <td>{{$ruta->updated_at}}</td>
									 <td><a class="btn btn-success" id="edit" value="edit" href="{{ route('ruta.edit', ['id' => $ruta->id]) }}"><i class="glyphicon glyphicon-pencil"></i>EDITAR</a></td>
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