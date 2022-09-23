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
                <a href="{{url('vendedor')}}">Listar Vendedores</a>
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
                    <h2><i class="glyphicon glyphicon-star"></i> Listar Vendedores</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
					
					
                </div>
                <div class="box-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example">
						<div class="row">
                               <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <br>
                                    <!--  <button type="submit" form="formFiltrarFecha" class="btn btn-success">Filtrar</button>    -->
                                </div>
                            </div>
                            </div>
                        </div>
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
                            <th> RUTA </th>
                            <th> SUPERVISOR </th>
                            <th> Fecha de Creación </th>
                            <th> Fecha de Modificación </th>
                            <th> EDITAR</th>
                           </thead>
                            <tbody>
                            @foreach($vendedor_rutas as $vendedor)
                                <tr data-id="{{$vendedor->id}}">
                                    <td>{{$vendedor->id}}</td>
                                    <td>{{$vendedor->cedula}}</td>
                                    <td>{{$vendedor->primer_nombre}}</td>
                                    <td>{{$vendedor->segundo_nombre}}</td>
                                    <td>{{$vendedor->primer_apellido}}</td>
                                    <td>{{$vendedor->segundo_apellido}}</td>
                                    <td>{{$vendedor->departamento}}</td>
                                    <td>{{$vendedor->ciudad}}</td>
                                    <td>{{$vendedor->barrio}}</td>
                                    <td>{{$vendedor->direccion}}</td>
                                    <td>{{$vendedor->telefono_1}}</td>
                                    <td>{{$vendedor->telefono_2}}</td>
                                    <td>{{$vendedor->correo}}</td>
                                   <td>{{$vendedor->nombre_ruta}}</td>
                                    <td>{{$vendedor->nombre_supervisor}}</td>
                                    <td>{{$vendedor->created_at}}</td>
                                    <td>{{$vendedor->updated_at}}</td>
									<td><a class="btn btn-success" id="edit" value="edit" href="{{ route('vendedor.edit', ['id' => $vendedor->id]) }}"><i class="glyphicon glyphicon-pencil"></i>EDITAR</a></td>
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
            $('#example').DataTable({
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
		
        });
    </script>
@endpush