<ul class="nav nav-pills nav-stacked main-menu">
    <li class="nav-header">Menú</li>

    <li><a class="ajax-link" href="{{url('/')}}"><i class="glyphicon glyphicon-home"></i><span> SIV </span></a>
    </li>

	 <li class="accordion">
        <a href="#"><i class="glyphicon glyphicon-duplicate"></i><span> Circuitos </span></a>
        <ul class="nav nav-pills nav-stacked">
            @if(auth()->user()->for_roles_id===1)
            <li><a href="{{url('ventas/create')}}"><i class="glyphicon glyphicon-eye-open"></i>Clientes CON DATOS</a></li>
            <li><a href="{{url('cliente/create')}}"><i class="glyphicon glyphicon-eye-open"></i>Clientes NUEVOS</a></li>
            @endif
            
			
            <li><a href="{{url('circuito')}}"><i class="glyphicon glyphicon-list-alt"></i> Listar Circuitos</a></li>
            <li><a href="{{url('circuito/create')}}"><i class="glyphicon glyphicon-pencil"></i> Registrar Circuito</a></li>
			
			
          
          
            

            @if(auth()->user()->for_roles_id===2)
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-download-alt"></i><span> Reportes</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-blackboard"></i> Resumen</a></li>
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-flag"></i> Graficos</a></li>
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-list-alt"></i> Modificaciones y Creaciones</a></li>
                    </ul>
                </li>
            @endif



        </ul>
    </li>
	 <li class="accordion">
        <a href="#"><i class="glyphicon glyphicon-road"></i><span> Rutas </span></a>
        <ul class="nav nav-pills nav-stacked">
            @if(auth()->user()->for_roles_id===1)
            <li><a href="{{url('ventas/create')}}"><i class="glyphicon glyphicon-eye-open"></i>Clientes CON DATOS</a></li>
            <li><a href="{{url('cliente/create')}}"><i class="glyphicon glyphicon-eye-open"></i>Clientes NUEVOS</a></li>
            @endif
            
			
            <li><a href="{{url('ruta')}}"><i class="glyphicon glyphicon-list-alt"></i> Listar Rutas</a></li>
            <li><a href="{{url('ruta/create')}}"><i class="glyphicon glyphicon-pencil"></i> Registrar Ruta</a></li>
            <li><a href="{{url('ruta/show')}}"><i class="glyphicon glyphicon-ok"></i> Asignar Circuito a Ruta</a></li>
			
			
          
          
            

            @if(auth()->user()->for_roles_id===2)
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-download-alt"></i><span> Reportes</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-blackboard"></i> Resumen</a></li>
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-flag"></i> Graficos</a></li>
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-list-alt"></i> Modificaciones y Creaciones</a></li>
                    </ul>
                </li>
            @endif



        </ul>
    </li>
    <li class="accordion">
        <a href="#"><i class="glyphicon glyphicon-tags"></i><span> Clientes </span></a>
        <ul class="nav nav-pills nav-stacked">
            @if(auth()->user()->for_roles_id===1)
            <li><a href="{{url('ventas/create')}}"><i class="glyphicon glyphicon-eye-open"></i>Clientes CON DATOS</a></li>
            <li><a href="{{url('cliente/create')}}"><i class="glyphicon glyphicon-eye-open"></i>Clientes NUEVOS</a></li>
            @endif
            
            <li><a href="{{url('cliente')}}"><i class="glyphicon glyphicon-list-alt"></i>Listar Clientes</a></li>
            <li><a href="{{url('cliente/create')}}"><i class="glyphicon glyphicon-plus"></i>Nuevo Cliente</a></li>
            <li><a href="{{url('cliente/update')}}"><i class="glyphicon glyphicon-pencil"></i> Actualizar Cliente</a></li>
          
            

            @if(auth()->user()->for_roles_id===2)
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-download-alt"></i><span> Reportes</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-blackboard"></i> Resumen</a></li>
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-flag"></i> Graficos</a></li>
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-list-alt"></i> Modificaciones y Creaciones</a></li>
                    </ul>
                </li>
            @endif



        </ul>
    </li>
	
	<li class="accordion">
        <a href="#"><i class="glyphicon glyphicon-asterisk"></i><span> Supervisores </span></a>
        <ul class="nav nav-pills nav-stacked">
            @if(auth()->user()->for_roles_id===1)
            <li><a href="{{url('ventas/create')}}"><i class="glyphicon glyphicon-eye-open"></i>Clientes CON DATOS</a></li>
            <li><a href="{{url('cliente/create')}}"><i class="glyphicon glyphicon-eye-open"></i>Clientes NUEVOS</a></li>
            @endif
            
            <li><a href="{{url('supervisor')}}"><i class="glyphicon glyphicon-list-alt"></i> Listar Supervisores</a></li>
            <li><a href="{{url('supervisor/create')}}"><i class="glyphicon glyphicon-pencil"></i> Registrar Supervisores</a></li>
          
            

            @if(auth()->user()->for_roles_id===2)
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-download-alt"></i><span> Reportes</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-blackboard"></i> Resumen</a></li>
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-flag"></i> Graficos</a></li>
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-list-alt"></i> Modificaciones y Creaciones</a></li>
                    </ul>
                </li>
            @endif



        </ul>
    </li>
	
	 <li class="accordion">
        <a href="#"><i class="glyphicon glyphicon-user"></i><span> Vendedores </span></a>
        <ul class="nav nav-pills nav-stacked">
            @if(auth()->user()->for_roles_id===1)
            <li><a href="{{url('ventas/create')}}"><i class="glyphicon glyphicon-eye-open"></i>Clientes CON DATOS</a></li>
            <li><a href="{{url('cliente/create')}}"><i class="glyphicon glyphicon-eye-open"></i>Clientes NUEVOS</a></li>
            @endif
            
            <li><a href="{{url('vendedor')}}"><i class="glyphicon glyphicon-list-alt"></i> Listar Vendedores</a></li>
            <li><a href="{{url('vendedor/create')}}"><i class="glyphicon glyphicon-pencil"></i> Registrar Vendedor</a></li>
          
            

            @if(auth()->user()->for_roles_id===2)
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-download-alt"></i><span> Reportes</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-blackboard"></i> Resumen</a></li>
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-flag"></i> Graficos</a></li>
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-list-alt"></i> Modificaciones y Creaciones</a></li>
                    </ul>
                </li>
            @endif



        </ul>
    </li>
	
	 <li class="accordion">
        <a href="#"><i class="glyphicon glyphicon-duplicate"></i><span> Productos </span></a>
        <ul class="nav nav-pills nav-stacked">
            @if(auth()->user()->for_roles_id===1)
            <li><a href="{{url('ventas/create')}}"><i class="glyphicon glyphicon-eye-open"></i>Clientes CON DATOS</a></li>
            <li><a href="{{url('cliente/create')}}"><i class="glyphicon glyphicon-eye-open"></i>Clientes NUEVOS</a></li>
            @endif
            
            <li><a href="{{url('producto')}}"><i class="glyphicon glyphicon-list-alt"></i> Listar Productos</a></li>
            <li><a href="{{url('producto/create')}}"><i class="glyphicon glyphicon-pencil"></i> Registrar Producto</a></li>
          
            

            @if(auth()->user()->for_roles_id===2)
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-download-alt"></i><span> Reportes</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-blackboard"></i> Resumen</a></li>
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-flag"></i> Graficos</a></li>
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-list-alt"></i> Modificaciones y Creaciones</a></li>
                    </ul>
                </li>
            @endif



        </ul>
    </li>

    <li><a class="ajax-link" href="{{'/logout'}}"><i
                    class="glyphicon glyphicon-log-out"></i><span> Salir </span></a>
    </li>
</ul>