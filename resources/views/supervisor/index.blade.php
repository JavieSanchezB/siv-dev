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
                <a href="{{url('cliente.index')}}">Listar Supervisores</a>
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
                    <h2><i class="glyphicon glyphicon-star"></i> Listar Supervisores</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
				  <form method="GET" action="{{route('supervisor.index')}}" id="formFiltrarCliente" role="form" data-toggle="validator" autocomplete="off">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example">
						<div class="row">

                              
						    </form>
                            <thead>
                            <th> # </th>
                            <th> Cedula </th>
                            <th> Primer Nombre </th>
                            <th> Segundo Nombre </th>
                            <th> Primer Apellido </th>
                            <th> Segundo Apellido </th>
							<th> Departamento</th>
                            <th> Ciudad</th>
                            <th> Barrio</th>
                            <th> Direccion </th>
                            <th> Celular # 1 </th>
                            <th> Celular # 2 </th>
                            <th> Correo </th>
                            <th> Fecha de Creación </th>
                            <th> Fecha de Modificación </th>
                           </thead>
                            <tbody>
                            @foreach($supervisores as $supervisor)
                                <tr data-id="{{$supervisor->id}}">
                                    <td>{{$supervisor->id}}</td>
                                    <td>{{$supervisor->cedula}}</td>
                                    <td>{{$supervisor->primer_nombre}}</td>
                                    <td>{{$supervisor->segundo_nombre}}</td>
                                    <td>{{$supervisor->primer_apellido}}</td>
                                    <td>{{$supervisor->segundo_apellido}}</td>
                                    <td>{{$supervisor->departamento}}</td>
                                    <td>{{$supervisor->ciudad}}</td>
                                    <td>{{$supervisor->barrio}}</td>
                                    <td>{{$supervisor->direccion}}</td>
                                    <td>{{$supervisor->telefono_1}}</td>
                                    <td>{{$supervisor->telefono_2}}</td>
                                    <td>{{$supervisor->correo}}</td>
                                    <td>{{$supervisor->created_at}}</td>
                                    <td>{{$supervisor->updated_at}}</td>
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