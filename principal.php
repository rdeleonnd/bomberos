<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="jquery/jquery-ui-1.10.1.custom.min.css" />
		<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="css/submenus.css" />
		<script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="jquery/jquery-ui.js"></script>
		<script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
		<script type="text/javascript" src="funciones/funciones.js"></script>
		<script type="text/javascript" src="funciones/principal.js"></script>
	</head>
	<body>
		<?php 
			include('funciones/funciones.php');
		?>
		</br><p align="center"><img src="img/logotipo.png"></p>
		<hr size="10" width="85%" style="#0000FF" />
		<table>
			<tr>
				<div class="collapse navbar-collapse js-navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown mega-dropdown">
					        <a href="" class="dropdown-toggle" data-toggle="dropdown">Reportes/Papeletas<b class="caret"></b></a>
					        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
					        	<li class="dropdown-submenu">
					        		<a tabindex="-1" href="#">Agregar</a>
					        		<ul class="dropdown-menu">
					        			<li class="dropdown mega-dropdown">
						        			<li><a tabindex="-1" href="#" onclick='cargar_pagina("ingreso_reporte_servicio");'>Reporte de Servicios</a></li>
							        		<li><a href="#" onclick='cargar_pagina("ingreso_reporte_donaciones");'>Recibo de donaciones</a></li>
							        		<li class="divider"></li>
							        		<li><a href="#" onclick='cargar_pagina("ingreso_incidentes");'>Ingreso Incidentes</a></li>
									        <li><a href="#" onclick='cargar_pagina("ingreso_categorias_incidentes");'>Ingreso de Categorias deIncidentes</a></li>
						        		</li>
					        		</ul>
					        	</li>
					        	<li class="dropdown-submenu">
					        		<a tabindex="-1" href="#">Modificar</a>
					        		<ul class="dropdown-menu">
					        			<li class="dropdown mega-dropdown">
									        
					        			</li>
					        		</ul>
					        	</li>
					        </ul>
				        </li>
						<li class="dropdown mega-dropdown">
							<a href="" class="dropdown-toggle" data-toggle="dropdown">Personal<b class="caret"></b></a>
							<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
					        	<li class="dropdown-submenu">
					        		<a tabindex="-1" href="#">Agregar</a>
					        		<ul class="dropdown-menu">
					        			<li class="dropdown mega-dropdown">
						        			<li><a href="#" onclick='cargar_pagina("ingreso_personal");'>Ingreso de Personal</a></li>
							        		<li><a href="#" onclick='cargar_pagina("ingreso_reporte_donaciones");'></a></li>
						        		</li>
					        		</ul>
					        	</li>
					        	<li class="dropdown-submenu">
					        		<a tabindex="-1" href="#">Modificar</a>
					        		<ul class="dropdown-menu">
					        			<li class="dropdown mega-dropdown">
									        <li><a href="#" onclick='cargar_pagina("ingreso_incidentes");'></a></li>
									        <li><a href="#" onclick='cargar_pagina("ingreso_categorias_incidentes");'></a></li>
					        			</li>
					        		</ul>
					        	</li>
					        </ul>
						</li>
					</ul>
				</div>
			</tr>
			<tr>
				<div class="panel panel-success">
					<div class="panel-heading" id="Encabezado_Panel">
						<h3 class="panel-title">Titulo</h3>
					</div>
					<div id="principal" name="principal" class="panel-body"></div>
				</div>
				
			</tr>
		</table>
	</body>
</html>

<?php 

	$Usuario = "l";
	$Contrasenia = "p";
	if(($Usuario!="") && ($Contrasenia!=""))
	{
		if(isset($_POST["ingreso_reporte_servicio"]))
		{
			
		}
	}
	else
	{
		include("funciones/debe_iniciar_sesion.php");
	}
?>