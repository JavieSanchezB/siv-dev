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
                <a href="{{url('producto/create')}}">Registrar Producto</a>
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

    <form method="POST" action="{{route('producto.store')}}" id="formRegistrarGoBlue" role="form" data-toggle="validator" autocomplete="off">

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
                        <h2><i class="glyphicon glyphicon-star"></i>Ingresar Datos del producto</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">

                             <div class="row">

                             <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="codigo">CODIGO</label>
                                    <input type="number" class="form-control" id="codigo" name="codigo" placeholder=""  required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="codigo_de_barras">CODIGO DE BARRAS</label>
                                    <input type="text" class="form-control" id="codigo_de_barras" name="codigo_de_barras" placeholder=""   required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>

                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="descripcion">DESCRIPCION</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder=""  >
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>

                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="referencia">REFERENCIA</label>
                                    <input type="text" class="form-control" id="referencia" name="referencia" placeholder="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>

                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="precio_venta">PRECIO VENTA</label>
                                    <input type="text" class="form-control" id="precio_venta" name="precio_venta" placeholder=""  >
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>


                           
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="tipo_producto">TIPO PRODUCTO</label>
                                    <select class="form-control" name="tipo_producto" id="tipo_producto" required >
                                        <option value="">Escoja PRODUCTO</option>
                                        <option value="RECARGA">RECARGA</option>
                                        <option value="SIMCARD">SIMCARD</option>
                                        <option value="POSPAGO">POSPAGO</option>
                                        <option value="TELEFONO">TELEFONO</option>
                                       
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                           

                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="observacion">OBSERVACION</label>
                                    <input type="text" class="form-control" id="observacion" name="observacion" placeholder=""  required>
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