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
                <a href="{{url('ventas')}}">Listar lineas ingresadas</a>
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
                    <h2><i class="glyphicon glyphicon-star"></i> Listado lineas ingresadas</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form method="GET" action="{{route('ventas.index')}}" id="formFiltrarFecha" role="form" data-toggle="validator" autocomplete="off">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="fechaInicial">Fecha Inicial</label>
                                    <input type="text" class="form-control" id="fechaInicial" name="fechaInicial" placeholder="" required value="{{$fechaInicial}}" >
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="fechaFinal">Fecha Final</label>
                                    <input type="text" class="form-control" id="fechaFinal" name="fechaFinal" placeholder="" required value="{{$fechaFinal}}" >
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <br>
                                    <button type="submit" form="formFiltrarFecha" class="btn btn-success">Filtrar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="example">
                                    <thead>

                                    <th> # </th>
                                    <th> IDPDV </th>
                                    <th> Nombre del punto </th>
                                    <th> Circuito </th>
                                    <th> Tipo de Pago </th>
                                    <th> Producto Vendido</th>
                                    <th> Valor Pagado</th>
                                    <th> Movil Tigo</th>                                   
                                    <th> # del cliente que recibe incentivo</th>
                                    <th> Asesor pda</th> 
                                    <th>Fecha</th>

                                    </thead>
                                    <tbody>
									
									
									
									
                                    @foreach($ventas as $venta)
                                        <tr data-id="{{$venta->id}}">
                                            <td>{{$venta->id}}</td>
                                            <td>{{$venta->dms->idpdv}}</td>
                                            <td>{{$venta->dms->nombre_punto}}</td>
                                            <td>{{$venta->dms->circuito}}</td>
                                            <td>{{$venta->tipo_linea}}</td>
											<td>{{$venta->producto_vendido}}</td>
                                            <td>${{$venta->valor_incentivo}}</td>
                                            <td>{{$venta->movil_tigo}}</td>
                                            <td>{{$venta->movil_cliente}}</td>
											<td> {{$venta->user->nombre}}</td>
                                            <td>{{$venta->fecha_venta}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--/row-->
	
@endsection

@push('script')
    <script>
        $(document).ready(function () {
			
            moment.locale('es');
            $('#fechaFinal').bootstrapMaterialDatePicker({
                time: false,
                weekStart : 0,
                format: 'YYYY-MM-DD',
                setDate: moment()
            });
			
			$('#fechaInicial').bootstrapMaterialDatePicker({
                time: false,
                weekStart : 0,
                format: 'YYYY-MM-DD',
                setDate: moment()
            });
			
           

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
                    [0, "desc"]
                ],
                aoColumnDefs: [{
                    bSortable: false,
                    "aTargets": [-1]
                }]
            });


        });
    </script>
@endpush