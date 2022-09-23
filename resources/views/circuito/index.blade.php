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
                <a href="{{url('circuito.index')}}">Listar Circuitos</a>
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
                    <h2><i class="glyphicon glyphicon-star"></i> Listar Circuitos</h2>

                     <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
				  <form method="GET" action="{{route('circuito.index')}}" id="actualizar" role="form" data-toggle="validator" autocomplete="off">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example">
						<div class="row">

            


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
						    </form>
                            <thead>

                            <th> # </th>
                            
                            <th>CIRCUITO</th>
                           
             
                            <th> FECHA DE CREACION</th>
                            <th> FECHA DE MODIFICACION</th>
                            <th> EDITAR</th>
                            <!-- <th> ELIMINAR</th>-->

                            
                            
                            </thead>
                            <tbody>
                            @foreach($circuitos as $circuito)
                                <tr data-id="{{$circuito->id}}">
                                    
                                    <td>{{$circuito->id}}</td>                                
                                    <td>{{$circuito->circuito}}</td>                                
                                    <td>{{$circuito->created_at}}</td>
                                    <td>{{$circuito->updated_at}}</td>
                                    <td><a class="btn btn-success" id="edit" value="edit" href="{{ route('circuito.edit', ['id' => $circuito->id]) }}"><i class="glyphicon glyphicon-pencil"></i>EDITAR</a></td>
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