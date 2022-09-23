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
                <a href="{{url('goblue')}}">Listar Puntos</a>
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
                    <h2><i class="glyphicon glyphicon-star"></i> Listar Puntos</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example">
                            <thead>

                            <th> # </th>
                            <th> # </th>
                            <th> Cedula/Nit </th>
                            <th> Primer Nombre </th>
                            <th> Segundo Nombre </th>
                            <th> Primer Apellido </th>
                            <th> Segundo Apellido </th>
                            <th> IDPDV </th>
                            <th> Razon Social </th>
                            <th> Circuito </th>
                            <th> Direccion </th>
                            <th> Celular # 1 </th>
                            <th> Celular # 2 </th>
                            <th> Correo </th>
                            <th> Contacto</th>
                            <th> Departamento</th>
                            <th> Ciudad</th>
                            <th> Barrio</th>
                            <th> ID_ASESOR_PDV</th>
                            <th> ID_ASESOR_PDA</th>
                            <th> ID_ASESOR_MIXTO</th>
                            <th> ID_ASESOR_PROMOTOR</th>
                            <th> ID_ASESOR_PROMOTOR</th>
                            <th> ID_SUPERVISOR</th>
                            <th> ID_USUARIO</th>
                            <th> FECHA DE CREACION</th>
                            <th> FECHA DE MODIFICACION</th>

                            
                            
                            </thead>
                            <tbody>
                            @foreach($clientes as $cliente)
                                <tr data-id="{{$cliente->id}}">
                                    <td>{{$cliente->id}}</td>
                                    <td>{{$cliente->cc_nit}}</td>
                                    <td>{{$cliente->primer_nombre}}</td>
                                    <td>{{$cliente->segundo_nombre}}</td>
                                    <td>{{$cliente->primer_apellido}}</td>
                                    <td>{{$cliente->segundo_apellido}}</td>
                                    <td>{{$cliente->idpdv}}</td>
                                    <td>{{$cliente->razon_social}}</td>
                                    <td>{{$cliente->circuito}}</td>
                                    <td>{{$cliente->direcion}}</td>
                                    <td>{{$cliente->telefono_1}}</td>
                                    <td>{{$cliente->telefono_2}}</td>
                                    <td>{{$cliente->correo}}</td>
                                    <td>{{$cliente->contacto}}</td>
                                    <td>{{$cliente->departamento}}</td>
                                    <td>{{$cliente->ciudad}}</td>
                                    <td>{{$cliente->barrio}}</td>
                                    <td>{{$cliente->id_asesor_pdv}}</td>
                                    <td>{{$cliente->id_asesor_pda}}</td>
                                    <td>{{$cliente->id_asesor_mixto}}</td>
                                    <td>{{$cliente->id_asesor_promotor}}</td>
                                    <td>{{$cliente->id_supervisor}}</td>
                                    <td>{{$cliente->id_usuario}}</td>
                                    <td>{{$cliente->fecha_creacion}}</td>
                                    <td>{{$cliente->fecha_modificacion}}</td>
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
            'copy', 'csv', 'excel', 'pdf', 'print'
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