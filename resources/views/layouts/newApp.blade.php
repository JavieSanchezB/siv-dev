<!DOCTYPE html>
<html lang="es">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Plataforma SIV Amcom S.A</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Plantilla diseñada para el registro y seguimiento de ventas de las impulsadoras">
    <meta name="" content="Desarrollo Experto">

    <!-- The styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link id="bs-css" href="{{asset('css/bootstrap-cerulean.min.css')}}" rel="stylesheet">


    <link href="{{asset('css/charisma-app.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/fullcalendar/dist/fullcalendar.css')}}" rel='stylesheet'>
    <link href="{{asset('bower_components/fullcalendar/dist/fullcalendar.print.css')}}" rel='stylesheet' media='print'>
    <link href="{{asset('bower_components/chosen/chosen.min.css')}}" rel='stylesheet'>
    <link href="{{asset('bower_components/colorbox/example3/colorbox.css')}}" rel='stylesheet'>
    <link href="{{asset('bower_components/responsive-tables/responsive-tables.css')}}" rel='stylesheet'>
    <link href="{{asset('bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css')}}" rel='stylesheet'>
    <link href="{{asset('css/jquery.noty.css')}}" rel='stylesheet'>
    <link href="{{asset('css/noty_theme_default.css')}}" rel='stylesheet'>
    <link href="{{asset('css/elfinder.min.css')}}" rel='stylesheet'>
    <link href="{{asset('css/elfinder.theme.css')}}" rel='stylesheet'>
    <link href="{{asset('css/jquery.iphone.toggle.css')}}" rel='stylesheet'>
    <link href="{{asset('css/uploadify.css')}}" rel='stylesheet'>
    <link href="{{asset('css/animate.min.css')}}" rel='stylesheet'>
    <link href="{{asset('css/bootstrap-material-datetimepicker.css')}}" rel='stylesheet'>

    <link href="{{asset('css/sweetalert2.css')}}" rel='stylesheet'>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

    <!-- jQuery -->
    <script src="{{asset('bower_components/jquery/jquery.min.js')}}"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}"/>

   
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"/>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
<!-- topbar starts -->
<div class="navbar navbar-default" role="navigation">

    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html"> <img alt="Charisma Logo" src="{{url('img/logo20.png')}}" class="hidden-xs"/>
            <span>PDA</span></a>

        <!-- user dropdown starts -->
        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle animated flip" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i>{{ @Auth::user()->nombre_sup }}<span
                        class="hidden-sm hidden-xs">
				</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li class="divider"></li>
                <li><a href="{{url('logout')}}">Cerrar Sesión</a></li>
            </ul>
        </div>
        <!-- user dropdown ends -->

        <!-- theme selector starts-->
      <!--   <div class="btn-group pull-right theme-container animated tada">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" id="themes">
                <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
            </ul>
        </div>-->
        <!-- theme selector ends -->
    </div>
</div>
<!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>

                    @section('menu')
                    @show


                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">

            @yield('content')


        </div><!--/#content.col-md-0-->
    </div><!--/fluid-row-->


    <hr>

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="{{url('/')}}" target="_blank">Amcom SA</a> {{date('Y')}}</p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">App creada por: <a
                  href="#">Javier Sanchez B.</a></p>
    </footer>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- library for cookie management -->
<script src="{{asset('js/jquery.cookie.js')}}"></script>

<!-- data table plugin -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<!-- data table plugin -->

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>





<!-- select or dropdown enhancer -->
<script src="{{asset('bower_components/chosen/chosen.jquery.min.js')}}"></script>
<!-- plugin for gallery image view -->
<script src="{{asset('bower_components/colorbox/jquery.colorbox-min.js')}}"></script>
<!-- notification plugin -->
<script src="{{asset('js/jquery.noty.js')}}"></script>
<!-- library for making tables responsive -->
<script src="{{asset('bower_components/responsive-tables/responsive-tables.js')}}"></script>
<!-- tour plugin -->
<script src="{{asset('bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js')}}"></script>
<!-- star rating plugin -->
<script src="{{asset('js/jquery.raty.min.js')}}"></script>
<!-- for iOS style toggle switch -->
<script src="{{asset('js/jquery.iphone.toggle.js')}}"></script>
<!-- autogrowing textarea plugin -->
<script src="{{asset('js/jquery.autogrow-textarea.js')}}"></script>
<!-- multiple file upload plugin -->
<script src="{{asset('js/jquery.uploadify-3.1.min.js')}}"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="{{asset('js/jquery.history.js')}}"></script>

<script src="{{asset('js/lodash.min.js')}}"></script>

<script src="{{asset('js/sweetalert2.js')}}"></script>

<script src="{{asset('js/validator.js')}}"></script>

<script src="{{asset('js/Chart.bundle.min.js')}}"></script>

<script src="{{asset('js/moment-with-locales.js')}}"></script>

<script src="{{asset('js/bootstrap-material-datetimepicker.js')}}"></script>



<!-- application script for Charisma demo -->
<script src="{{asset('js/charisma.js')}}"></script>



<script>
    var BASEURL = '{{ url('/') }}';
</script>


@stack('script')

</body>

</html>