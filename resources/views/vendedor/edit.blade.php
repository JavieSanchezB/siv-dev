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
                <a href="{{url('supervisor/edit')}}">Editar Supervisor</a>
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
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('actualizarsupervisor')}}" id="formRegistrarGoBlue" role="form" data-toggle="validator" autocomplete="off">

        {{method_field('POST')}}

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-star"></i>Ingrese la información</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
				

        
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-star"></i>Ingresar Datos del Supervisor</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">

                             <div class="row">
							 
				

                             <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
								 <input type="hidden" class="form-control" id="id" name="id" value="{{ $ids }}"  >
                                    <label for="cedula">C.C</label>
									 @foreach($supervisores as $supervisor)
                                    <input type="number" class="form-control" id="cedula" name="cedula" placeholder="" value="{{ $supervisor['cedula'] }}" required>
									@endforeach
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="primer_nombre">Primer Nombre</label>
									 @foreach($supervisores as $supervisor)
                                    <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" placeholder=""  value="{{ $supervisor['primer_nombre'] }}" required>
									@endforeach
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>

                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="segundo_nombre">Segundo Nombre</label>
									 @foreach($supervisores as $supervisor)
                                    <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" placeholder=""  value="{{ $supervisor['segundo_nombre'] }}" >
									@endforeach
                                </div></div>

                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="primer_apellido">Primer Apellido</label>
									 @foreach($supervisores as $supervisor)
                                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="" value="{{ $supervisor['primer_apellido'] }}" required>
									@endforeach
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>

                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="segundo_apellido">Segundo Apellido</label>
									@foreach($supervisores as $supervisor)
                                    <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder="" value="{{ $supervisor['segundo_apellido'] }}" >
									@endforeach
                               
                                </div></div>
								
								
								
								
								<div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="departamento">DEPARMENTO</label>

                                    <select class="form-control" name="departamento" id="departamento" data-rel="chosen" data-placeholder="Escoger Departamento">
									    <option></option>
                                        @foreach($departamentos as $departamento)
										<option value="{{ $departamento['departamento'] }}">{{ $departamento['departamento'] }}</option>
										@endforeach
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
							
							<div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="ciudad">CIUDAD</label>

                                    <select class="form-control" name="ciudad" id="ciudad" data-rel="chosen" data-placeholder="Escoger Ciudad">
										<option></option>
                                        @foreach($ciudades as $ciudad)
										<option value="{{ $ciudad['ciudad'] }}">{{ $ciudad['ciudad'] }}</option>
										@endforeach
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
							
									<div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="barrio">BARRIO</label>

                                    <select class="form-control" name="barrio" id="barrio" data-rel="chosen" data-placeholder="Escoger Ciudad">
										<option></option>
                                        @foreach($barrios as $barrio)
										<option value="{{ $barrio['barrio'] }}">{{ $barrio['barrio'] }}</option>
										@endforeach
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
						


                     


                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="direccion">Direccion</label>
									@foreach($supervisores as $supervisor)
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="" value="{{ $supervisor['	direccion'] }}">
                                 @endforeach
                                </div></div>


                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
								
                                    <label for="telefono_1">Móvil de Vendedor # 1</label>
									@foreach($supervisores as $supervisor)
                                    <input type="number" class="form-control" id="telefono_1" name="telefono_1" placeholder="" value="{{ $supervisor['telefono_1'] }}" min="3000000000" max="3300000000" data-error="Debe contener 10 digitos" >
									@endforeach
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                               <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="telefono_2">Móvil de Vendedor # 2</label>
									@foreach($supervisores as $supervisor)
                                    <input type="number" class="form-control" id="telefono_2" name="telefono_2" placeholder="" value="{{ $supervisor['telefono_2'] }}"  min="3000000000" max="3300000000"   data-error="Debe contener 10 digitos">
                                  @endforeach
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="correo">Correo Electronico</label>
									@foreach($supervisores as $supervisor)
                                    <input type="email" class="form-control" id="correo" name="correo" placeholder="" value="{{ $supervisor['correo'] }}" >
									 @endforeach
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>


                        </div>
                        <button type="submit" form="formRegistrarGoBlue" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div><!--/row-->

    </form>

    <!-- content ends -->
@endsection

@push('script')
<script>

    $(document).ready(function () {
        moment.locale('es');
        $('#periodo').bootstrapMaterialDatePicker({
            time: false,
            format: 'YYYY-MM-DD HH:mm:ss',
            setDate: moment()
        });
    });

    $('#validate').on('click', function (e) {
        e.preventDefault();

        var idpdv = $('#idpdv').val();
        if(idpdv===""){
            idpdv=0;
        }
        validarDMS(idpdv);
		
		
        
    });
	
	
	 $(document).ready(function () {
		 
	$('#producto_vendido').on('change', function () {
      
		var valor_pagar = $('#producto_vendido').val();
		
		
        if(valor_pagar==="bolsa_20k"){
            valor_pagar=7000;
        }
		 	
		if(valor_pagar==="paq_5k"){
            valor_pagar=2500;
        }
		if(valor_pagar==="paq_6k"){
            valor_pagar=2000;
        }
		if(valor_pagar==="paq_10k"){
            valor_pagar=3000;
        }
		if(valor_pagar==="paq_20k"){
            valor_pagar=4000;
        }
	
		
		$("#valor_incentivo").val(valor_pagar);
		  
		 
		  
		  });
	 });
	
	
	

    function validarDMS(idpdv) {
        $.ajax({
            type: 'GET',
            url: '{{url('dms')}}/' + idpdv,
            success: function (data) {

                $('#cod_sub').val(data.COD_SUB);
                $('#nombre').val(data.nombre_punto);
                $('#circuito').val(data.circuito);
                $('#vendedor').val(data.NOMBRE_ASESOR);
                $('#tipo_punto').val(data.TIPO_PUNTO);
                $('#epin').val(data.SERV_EPIN);
                $('#simcard').val(data.SERV_SIMCARD);
                $('#tigo_gestion').val(data.SERV_MBOX);
                $('#zona').val(data.CIUDAD);
                $('#estado').val(data.ESTADO);
            },
            error: function (qXHR, textStatus, errorThrown) {
//                    console.reportes(qXHR.status,textStatus,errorThrown);
                limpiarPuntoDeVenta();
                swal(
                    'IDPDV no Encontrado',
                    'Por favor validar si el IDPDV fue ingresado correctamente',
                    'error'
                )
            }
        });
    }
    function limpiarPuntoDeVenta() {
        var form = $('#formRegistrarGoBlue');
        form.find('input').val('');
        form.find('textarea').val('');
        form.validator("validate");
    }
</script>
@endpush