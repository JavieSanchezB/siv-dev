<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <title>@yield('title', 'Iniciar Sesión')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{asset('css/bootstrap-cerulean.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/charisma-app.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="img/tigo_logo.png" type="image/png"/>
</head>
<body>
<div class="ch-container">
    <div class="row">
        <div class="row">

            <div class="row">
                <div class="col-xs-auto center login-box">
                    <picture>
                        <source type="image/png" srcset="img/logo_app.png">
                        <img src="/img/logo_app.png" alt="logo_login" width="400" height="154">
                    </picture>
                </div>
            </div>


            <div class="well col-md-5 center login-box">
                <form class="form-horizontal" method="POST" action="{{url('login')}}">

                    <fieldset>
                        <div class="input-group input-group-lg">

                            <span class="input-group-addon"><i class="glyphicon glyphicon-user green"></i></span>
                            <input type="number" class="form-control" placeholder="Ingrese su usuario" name="username"
                                   required>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock green"></i></span>
                            <input type="number" class="form-control" placeholder="Ingrese su contraseña"
                                   name="password" required>
                        </div>

                        <div class="clearfix"></div>
                        <div class="input-prepend">
                            <label class="remember" for="remember"><input type="checkbox"
                                                                          id="remember">Rercordarme</label>
                        </div>
                        <div class="clearfix"></div>
                        <p class="center col-md-5">
                            <button type="submit" class="btn btn-primary green" value="Sign in"><b>Iniciar sesión</b>
                            </button>
                        </p>
                    </fieldset>
                </form>
            </div>
            <div class="row">
                <div class="col-xs-auto center login-box">
                    <picture>
                        <source type="image/png" srcset="img/logo_tigo_une.png">
                        <img src="/img/logo_app.png" alt="logo_login" width="100" height="51">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>