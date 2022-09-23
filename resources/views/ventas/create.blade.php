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
                <a href="{{url('ventas/create')}}">Registrar Lineas para incentivos</a>
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

    <form method="POST" action="{{route('ventas.store')}}" id="formRegistrarGoBlue" role="form" data-toggle="validator" autocomplete="off">

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
                    <div class="box-content">


                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="idpdv">IDPDV</label>
                                    <input type="number" class="form-control" id="idpdv" name="idpdv" placeholder="Ingrese ID PDV" value="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors">Ingrese el IDPDV de donde se hizo el PAQUETE O BOLSA</div>
                                    <button type="button" style="margin-top: 5px;" class="btn btn-primary center-block"
                                            id="validate">Validar IDPDV
                                    </button>
                                </div>
                            </div>



                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="periodo">Fecha de Pago</label>
                                    <input type="text" class="form-control" id="periodo" name="periodo" placeholder="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
<!--
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="cod_sub">Codigo Sub</label>
                                    <input disabled type="text" class="form-control" id="cod_sub">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre del Punto de Venta</label>
                                    <input disabled type="text" class="form-control" id="nombre">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="circuito">Circuito</label>
                                    <input disabled type="text" class="form-control" id="circuito">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="vendedor">Vendedor</label>
                                    <input disabled type="text" class="form-control" id="vendedor">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="tipo_punto">Tipo de Punto</label>
                                    <input disabled type="text" class="form-control" id="tipo_punto">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="epin">Servicio EPIN</label>
                                    <input disabled type="text" class="form-control" id="epin">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="simcard">Servicio SIMCARD</label>
                                    <input disabled type="text" class="form-control" id="simcard">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="tigo_gestion">Servicio TIGO GESTION</label>
                                    <input disabled type="text" class="form-control" id="tigo_gestion">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="zona">Zona</label>
                                    <input disabled type="text" class="form-control" id="zona">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <input disabled type="text" class="form-control" id="estado">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/row-->

        
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
                                    <label for="cc_nit">C.C o NIT</label>
                                    <input type="number" class="form-control" id="cc_nit" name="cc_nit" placeholder=""  required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="primer_nombre">Primer Nombre</label>
                                    <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" placeholder=""  >
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
                                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="" >
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
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder=""  >
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>


                                <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="departamento">Departamento</label>

                                    <select class="form-control" name="departamento" id="departamento" required >
                                        <option value="">Escoja una Departamento</option>
                                        <option value="RECARGA"></option>
                                        <option value="SIMCARD"></option>
                                       
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="ciudad">Cidudad</label>

                                    <select class="form-control" name="ciudad" id="ciudad" required>
                                        <option value=""> Escoja una Ciudad</option>
                                       
                                        <option value="bolsa_20k"></option>                                            
                                        <option value="paq_5k"></option>
                                        <option value="paq_6k"></option>
                                        <option value="paq_10k"></option>
                                        <option value="paq_20k"></option>
                                  
                                       
                                        
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                             <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="barrio">Barrio</label>

                                    <select class="form-control" name="barrio" id="barrio" required>
                                        <option value=""> Escoja un Barrio</option>
                                       
                                        <option value="bolsa_20k"></option>                                            
                                        <option value="paq_5k"></option>
                                        <option value="paq_6k"></option>
                                        <option value="paq_10k"></option>
                                        <option value="paq_20k"></option>
                                  
                                       
                                        
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>


                             <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="tipo_de_negocio">Tipo de negocio</label>

                                    <select class="form-control" name="tipo_de_negocio" id="tipo_de_negocio" required>
                                        <option value=""> Escoja un Tipo de Negocio</option>
                                       
                                        <option value="bolsa_20k"></option>                                            
                                        <option value="paq_5k"></option>
                                        <option value="paq_6k"></option>
                                        <option value="paq_10k"></option>
                                        <option value="paq_20k"></option>
                                  
                                       
                                        
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                                <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="telefono_1">Móvil de cliente # 1</label>
                                    <input type="number" class="form-control" id="telefono_1" name="telefono_1" placeholder="" required min="3000000000" max="3300000000" data-error="Debe contener 10 digitos">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                               <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="telefono_2">Móvil de cliente # 2</label>
                                    <input type="number" class="form-control" id="telefono_2" name="telefono_2" placeholder="" required min="3000000000" max="3300000000" data-error="Debe contener 10 digitos">
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

                                 <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="circuito">Circuito</label>

                                    <select class="form-control" name="circuito" id="circuito" required>
                                        <option value=""> Escoja un Circuito</option>
                                       
                                        <option value="bolsa_20k"></option>                                            
                                        <option value="paq_5k"></option>
                                        <option value="paq_6k"></option>
                                        <option value="paq_10k"></option>
                                        <option value="paq_20k"></option>
                                  
                                       
                                        
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="id_asesor_pdv">ASESOR PDV</label>

                                    <select class="form-control" name="id_asesor_pdv" id="id_asesor_pdv" required>
                                        <option value=""> Escoja Asesor PDV</option>
                                       
                                        <option value="bolsa_20k">0</option>                                            
                                        <option value="paq_5k">1</option>
                                        <option value="paq_6k">2</option>
                                        <option value="paq_10k">3</option>
                                        <option value="paq_20k">4</option>
                                  
                                       
                                        
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                               <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="id_asesor_pda">ASESOR PDA</label>

                                    <select class="form-control" name="id_asesor_pda" id="id_asesor_pda" required>
                                        <option value=""> Escoja Asesor PDA</option>
                                       
                                        <option value="bolsa_20k">0</option>                                            
                                        <option value="paq_5k">1</option>
                                        <option value="paq_6k">2</option>
                                        <option value="paq_10k">3</option>
                                        <option value="paq_20k">4</option>
                                  
                                       
                                        
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                                  <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="id_asesor_mixto">ASESOR MIXTO</label>

                                    <select class="form-control" name="id_asesor_mixto" id="id_asesor_mixto" required>
                                        <option value=""> Escoja Asesor MIXTO</option>
                                       
                                        <option value="bolsa_20k">0</option>                                            
                                        <option value="paq_5k">1</option>
                                        <option value="paq_6k">2</option>
                                        <option value="paq_10k">3</option>
                                        <option value="paq_20k">4</option>
                                  
                                       
                                        
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                             <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="id_asesor_promotor">ASESOR PROMOTOR</label>

                                    <select class="form-control" name="id_asesor_promotor" id="id_asesor_promotor" required>
                                        <option value=""> Escoja Asesor PROMOTOR</option>
                                       
                                        <option value="bolsa_20k">0</option>                                            
                                        <option value="paq_5k">1</option>
                                        <option value="paq_6k">2</option>
                                        <option value="paq_10k">3</option>
                                        <option value="paq_20k">4</option>
                                  
                                       
                                        
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                                  <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="id_supervisor">SUPERVISOR</label>

                                    <select class="form-control" name="id_supervisor" id="id_supervisor" required>
                                        <option value=""> Escoja SUPERVISOR</option>
                                       
                                        <option value="bolsa_20k">0</option>                                            
                                        <option value="paq_5k">1</option>
                                        <option value="paq_6k">2</option>
                                        <option value="paq_10k">3</option>
                                        <option value="paq_20k">4</option>
                                  
                                       
                                        
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

<!--/row
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="valor">Valor del incentivo</label>
                                    <input type="number" class="form-control" id="valor_incentivo" name="valor_incentivo" placeholder=""  readonly="readonly" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="mov_tigo">Movil  TIGO</label>
                                    <input type="number" class="form-control" id="mov_tigo" name="mov_tigo" placeholder="" required min="3000000000" max="3300000000" data-error="Debe contener 10 digitos">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="mov_portado">Movil Portado</label>
                                    <input type="number" class="form-control" id="mov_portado" name="mov_portado" placeholder=""  max="3300000000" data-error="tiene mas de 10 digitos">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>


                             <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="mov_tigo">Móvil de cliente que recibe el Descuento</label>
                                    <input type="number" class="form-control" id="movil_cliente" name="movil_cliente" placeholder="" required min="3000000000" max="3300000000" data-error="Debe contener 10 digitos">
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