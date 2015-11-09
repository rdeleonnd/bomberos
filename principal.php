<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<!-- <META HTTP-EQUIV="refresh" content="15"> -->
		<link rel="stylesheet" type="text/css" href="jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap-theme.css"/>
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap-datetimepicker.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap-datetimepicker-standalone.css" />
		<link rel="stylesheet" type="text/css" href="data_tables/media/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="data_tables/extensions/TableTools/css/dataTables.tableTools.css">
		<link rel="stylesheet" type="text/css" href="data_tables/extensions/ColVis/css/dataTables.colVis.css">
		<link rel="stylesheet" type="text/css" href="select2/select2.css" />
		<link rel="stylesheet" type="text/css" href="css/submenus.css" />
		<script type="text/javascript" src="jquery/js/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="funciones/Moment.js"></script>
		<script type="text/javascript" src="funciones/zonahoraria/locales.js"></script>
		<script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
		<script type="text/javascript" src="bootstrap/dist/js/bootstrap-datetimepicker.js"></script>
		<script type="text/javascript" src="data_tables/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="data_tables/extensions/TableTools/js/dataTables.tableTools.js"></script>
		<script type="text/javascript" src="data_tables/extensions/FixedColumns/js/dataTables.fixedColumns.js"></script>
		<script type="text/javascript" src="data_tables/extensions/FixedHeader/js/dataTables.fixedHeader.js"></script>
		<script type="text/javascript" src="data_tables/extensions/ColVis/js/dataTables.colVis.js"></script>
		<script type="text/javascript" src="select2/select2.js"></script>
		<script type="text/javascript" src="funciones/funciones.js"></script>
		<script type="text/javascript" src="funciones/principal.js"></script>
		<script type="text/javascript" src="funciones/jqueury.numeric.js"></script>
	</head>
	<body>
		<?php  
			
			include('funciones/funciones.php');
			include('funciones/conexion/configuracion_db.php');
			require_once('funciones/conexion/conexion.php'); 
			$Conexion = new DB($Usuario,$Clave,$DB,$Host);
			
			if(($_POST['Usuario']!="") && ($_POST['Codigo']!=""))
			{
				$Consulta= "SELECT us.idPersonal, us.nombreUser, us.clave, us.privilegio FROM usuario us 
							INNER JOIN estado est ON est.idEstado = us.idEstado
							WHERE nombreUser = '".$_POST['Usuario']."' and clave='".$_POST['Codigo']."'
							and est.Estado = 'Activo';";

				$Respuesta = $Conexion->list_orders($Consulta);
				$Filas = mysql_num_rows($Respuesta);
				
				if($Filas == 1)
				{
					while ($row = mysql_fetch_assoc($Respuesta))
					{
						$_SESSION['loggedin'] = true;
						$_SESSION['username'] = $row['nombreUser'];
						$_SESSION['start'] = time();
						$_SESSION['expire'] = $_SESSION['start'];
						$_SESSION['idusuario'] = $row['idPersonal'];
						$_SESSION['rango'] = $row['privilegio'];
					}
				}
				else
				{
					echo "<script>
							$(document).ready(function(){
								$('#inicioform').hide();
							});
							
						</script>";
					include("funciones/debe_loguearse.php");
				}
			}
			else
			{
				echo "<script>
							$(document).ready(function(){
								$('#inicioform').hide();
							});
							
						</script>";
				include("funciones/debe_iniciar_sesion.php");
			}
		?>
		<form id="principalform" method="post" action="principal.php">
			<div id="inicioform">
				</br><p align="center"><img src="img/logotipo.png"></p>
				<hr size="10" width="85%" style="#0000FF" />
				<table id="Principal" name = "Principal">
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
									        		<li><a href="#" onclick='cargar_pagina("ingreso_reporte_donaciones");'>Recibo de Donaciones</a></li>
									        		<li class="divider"></li>
									        		<li><a href="#" onclick='cargar_pagina("ingreso_incidentes");'>Ingreso de Categorias de Incidentes</a></li>
											        <li><a href="#" onclick='cargar_pagina("ingreso_categorias_incidentes");'>Ingreso de Incidentes</a></li>
											        <li><a href="#" onclick='cargar_pagina("ingreso_usuarios");'>Ingreso de Usuarios</a></li>
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
								        			<li class="divider"></li>
									        		<li><a href="#" onclick='cargar_pagina("ingreso_turnos");'>Ingreso de Turnos</a></li>
									        		<li><a href="#" onclick='cargar_pagina("ingreso_asignar_turnos");'>Ingreso de Asignacion de Turnos</a></li>
									        		<li class="divider"></li>
									        		<li><a href="#" onclick='cargar_pagina("ingreso_asistencia");'>Inreso de Entrada del Personal</a></li>
									        		<li><a href="#" onclick='cargar_pagina("ingreso_salida_asistencia");'>Inreso de Salida del Personal</a></li>
									        		<li class="divider"></li>
									        		<li><a href="#" onclick='cargar_pagina("ingreso_actividades");'>Ingreso de Actividades</a></li>
									        		<li><a href="#" onclick='cargar_pagina("ingreso_asignar_actividades");'>Ingreso de Asignacion de Actividades</a></li>
									        		<li class="divider"></li>
									        		<li><a href="#" onclick='cargar_pagina("ingreso_rangos_estados");'>Ingreso de Rangos y Estados</a></li>
								        		</li>
							        		</ul>
							        	</li>
							        </ul>
								</li>
								<?php 
									if($_SESSION['rango'] == 'Administrador')
									{
										echo "<li class='dropdown mega-dropdown'>
												<a href='' class='dropdown-toggle' data-toggle='dropdown'>Administracion<b class='caret'></b></a>
												<ul class='dropdown-menu multi-level' role='menu' aria-labelledby='dropdownMenu'>
										        	<li class='dropdown-submenu'>
										        		<a tabindex='-1' href='#'>Agregar</a>
										        		<ul class='dropdown-menu'>
										        			<li class='dropdown mega-dropdown'>
											        			<li><a href='#' onclick='cargar_pagina(\"ingreso_unidades\")'>Ingreso de Unidades</a></li>
											        			<li class='divider'></li>
												        		<li><a href='#' onclick='cargar_pagina(\"ingreso_lubricantes\");'>Ingreso de Lubricantes</a></li>
												        		<li><a href='#' onclick='cargar_pagina(\"ingreso_reparaciones\");'>Ingreso de Reparaciones</a></li>
												        		<li class='divider'></li>
												        		<li><a href='#' onclick='cargar_pagina(\"ingreso_combustibles\");'>Inreso de Combustibles</a></li>
												        		<li><a href='#' onclick='cargar_pagina(\"ingreso_botas_pantalones\");'>Inreso de Botas y Pantalones</a></li>
												        		<li class='divider'></li>
												        		<li><a href='#' onclick='cargar_pagina(\"ingreso_casco_chaqueton\");'>Ingreso Cascos y Chaquetones</a></li>
												        		<li><a href='#' onclick='cargar_pagina(\"ingreso_equipo_hidraulico\");'>Ingreso de Equipo Hidraulico</a></li>
											        		</li>
										        		</ul>
										        	</li>
										        </ul>
											</li>";
									}
								?>
						        <li>
					        		<input class="btn btn-lg btn-danger btn-block" type="submit" onclick="" value="Salir">
					        	</li>
							</ul>
						</div>
					</tr>
					<tr>
						<div class="panel panel-success">
							<div class="panel-heading" id="Encabezado_Panel" name="Encabezado_Panel" align="center">
								<big></big>
							</div>
							<div id="principal" name="principal" class="panel-body" ></div>
						</div>
					</div>
					</tr>
				</table>	
			</div>
		</form>
	</body>
</html>
