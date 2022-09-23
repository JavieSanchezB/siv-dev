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
                <a href="{{url('cliente/create')}}">Registrar Cliente</a>
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

    <form method="POST" action="{{route('cliente.store')}}" id="formRegistrarGoBlue" role="form" data-toggle="validator" autocomplete="off">

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
                        <h2><i class="glyphicon glyphicon-star"></i>Ingresar Datos del Cliente</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
			
								<div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="cc_nit">CC O NIT</label>
                                    <input type="text" class="form-control" id="cc_nit" name="cc_nit" placeholder=""   required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>
							
		
							
							

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="primer_nombre">Primer Nombre</label>
                                    <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" placeholder=""   required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>

                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="segundo_nombre">Segundo Nombre</label>
                                    <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" placeholder=""  >
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>

                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="primer_apellido">Primer Apellido</label>
                                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>

                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="segundo_apellido">Segundo Apellido</label>
                                    <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder=""  >
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>

                                 

                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="razon_social">Razon Social</label>
                                    <input type="text" class="form-control" id="razon_social" name="razon_social" placeholder=""  >
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>

                                  

                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="direccion">Direccion</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder=""  required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>


                             <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="departamento">DEPARMENTO</label>

                                    <select class="form-control" name="departamento" id="departamento" data-rel="chosen" data-placeholder="Escoger Departamento">
									    <option></option>
                                        @foreach($departamentos as $departamento)
										<option value="{{ $departamento['id'] }}">{{ $departamento['departamento'] }}</option>
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

                                    <select class="form-control" name="barrio" id="barrio" data-rel="chosen" data-placeholder="Escoger Barrio">
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
                                    <label for="tipo_de_negocio">Tipo de negocio</label>

                                    <select class="form-control" name="tipo_de_negocio" id="tipo_de_negocio" data-rel="chosen" data-placeholder="Escoger tipo de negocio" required>
                                        
                                        <option value=""></option>      
                                        <option value="MIXTO">MIXTO</option>                                            
                                        <option value="PDA">PDA</option>
                                        <option value="PDV">PDV</option>
                                 
                                  
                                       
                                        
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                               

                               			<div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="circuito">CIRCUITO</label>

                                    <select class="form-control" name="circuito" id="circuito" data-rel="chosen" data-placeholder="Escoger Circuito">
										 <option></option>
                                        @foreach($circuitos as $circuito)
										<option value="{{ $circuito['id'] }}">{{ $circuito['circuito'] }}</option>
										@endforeach
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                           
                               
                                       
                                        
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                             <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="telefono_1">Móvil de cliente # 1</label>
                                    <input type="number" class="form-control" id="telefono_1" name="telefono_1" placeholder=""  min="3000000000" max="3300000000" data-error="Debe contener 10 digitos">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                               <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="telefono_2">Móvil de cliente # 2</label>
                                    <input type="number" class="form-control" id="telefono_2" name="telefono_2" placeholder=""  min="3000000000" max="3300000000" data-error="Debe contener 10 digitos">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="correo">Correo Electronico</label>
                                    <input type="email" class="form-control" id="correo" name="correo" placeholder=""  >
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>


                                 <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="contacto">Contacto</label>
                                    <input type="text" class="form-control" id="contacto" name="contacto" placeholder="" >
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>

                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="idpdv">IDPDV</label>
                                    <input type="number" class="form-control" id="idpdv" name="idpdv" placeholder="" >
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

    $('#cc_nit').blur( function (e) {
        e.preventDefault();
    // alert("This input field has lost its focus.");
        var cc_nit = $('#cc_nit').val();
        if(cc_nit===""){
            cc_nit=0;
        }
        consultarCC_NIT(cc_nit);
		
		
        
    });
	
	
	 // $(document).ready(function () {
		 
	// $('#producto_vendido').on('change', function () {
      
		// var valor_pagar = $('#producto_vendido').val();
		
		
        // if(valor_pagar==="bolsa_20k"){
            // valor_pagar=7000;
        // }
		 	
		// if(valor_pagar==="paq_5k"){
            // valor_pagar=2500;
        // }
		// if(valor_pagar==="paq_6k"){
            // valor_pagar=2000;
        // }
		// if(valor_pagar==="paq_10k"){
            // valor_pagar=3000;
        // }
		// if(valor_pagar==="paq_20k"){
            // valor_pagar=4000;
        // }
	
		
		// $("#valor_incentivo").val(valor_pagar);
		  
		 
		  
		  // });
	 // });
	
	
	

    function consultarCC_NIT(cc_nit) {
        $.ajax({
            type: 'GET',
            url: '{{url('cliente')}}/' + cc_nit,
            success: function (data) {

                $('#cc_nit').val(data.cc_nit);
                $('#primer_nombre').val(data.primer_nombre);
                $('#segundo_nombre').val(data.segundo_nombre);
                $('#primer_apellido').val(data.primer_apellido);
                $('#segundo_apellido').val(data.primer_apellido);
                $('#razon_social').val(data.razon_social);
                $('#direccion').val(data.direccion);
                $('#departamento').val(data.departamento);
                $('#ciudad').val(data.ciudad);
                $('#barrio').val(data.barrio);
                $('#tipo_de_negocio').val(data.tipo_de_negocio);
                $('#telefono_1').val(data.telefono_1);
                $('#telefono_2').val(data.telefono_1);
                $('#correo').val(data.correo);
                $('#contacto').val(data.contacto);
                $('#idpdv').val(data.idpdv);
                $('#circuito').val(data.circuito);


                $('#nombre_apellido').val(data.nombre_apellido);
               
            },
            error: function (qXHR, textStatus, errorThrown) {
//                    console.reportes(qXHR.status,textStatus,errorThrown);
                limpiarFormularioCliente();
                swal(
                    'CEDULA O NIT no encontrado',
                    'No existen datos de este cliente puede crearlo',
                    'error'
                )
            }
        });
    }
    function limpiarFormularioCliente() {
     //   var form = $('#formRegistrarGoBlue');
       // form.find('input').val('');
        //form.find('textarea').val('');
        //form.validator("validate");
   }
   

</script>

@endpush