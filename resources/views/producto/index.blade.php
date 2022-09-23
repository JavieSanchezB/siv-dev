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
                <a href="{{url('producto')}}">Listar Productos</a>
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
                    <h2><i class="glyphicon glyphicon-star"></i> Listar Productos</h2>

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
                                    <!--  <button type="submit" form="formFiltrarFecha" class="btn btn-success">Filtrar</button>-->
                                </div>
                            </div>
                            </div>
                        </div>
                            <thead>

                            <th> # </th>
                            <th> Código</th>
                            <th> Código de barras </th>
                            <th> Descripcion </th>
                            <th> Referencia</th>
							<th> Precio venta</th>
                            <th> Tipo de Producto</th>
                            <th> observacion</th>
                            <th> Fecha de Creación </th>
                            <th> Fecha de Modificación </th>
                            
                            </thead>
                            <tbody>
                            @foreach($productos as $producto)
                                <tr data-id="{{$producto->id}}">
                                    <td>{{$producto->id}}</td>
                                    <td>{{$producto->codigo}}</td>
                                    <td>{{$producto->codigo_de_barras}}</td>
                                    <td>{{$producto->descripcion}}</td>
                                    <td>{{$producto->referencia}}</td>
                                    <td>{{$producto->precio_venta}}</td>
                                    <td>{{$producto->tipo_producto}}</td>
                                    <td>{{$producto->observacion}}</td>                                                                           
                                    <td>{{$producto->created_at}}</td>
                                    <td>{{$producto->updated_at}}</td>
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