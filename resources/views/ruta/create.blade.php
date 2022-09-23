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

    <form method="POST" action="{{route('ruta.store')}}" id="formRegistrarGoBlue" role="form" data-toggle="validator" autocomplete="off">

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
                        <h2><i class="glyphicon glyphicon-star"></i>Ingresar de la Ruta</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
					

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="nombre_ruta">Nombre de la Ruta</label>
                                    <input type="text" class="form-control" id="nombre_ruta" name="nombre_ruta" placeholder=""   required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>
                        
 <!--
                               			<div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="id_circuito_ruta">CIRCUITO</label>

                                    <select class="form-control" name="id_circuito_ruta" id="id_circuito_ruta" data-rel="chosen" data-placeholder="Escoger Circuito">
										 <option></option>
                                        @foreach($circuitos as $circuito)
										<option value="{{ $circuito['id'] }}">{{ $circuito['circuito'] }}</option>
										@endforeach
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                           -->

                                           


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