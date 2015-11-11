<?php
	session_start();

	include('funciones/funciones.php');
	include('funciones/conexion/configuracion_db.php');
	require_once('funciones/conexion/conexion.php'); 
	$Conexion = new DB($Usuario,$Clave,$DB,$Host);

	if(isset($_POST["BuscarDonaciones"]))
	{
		$Fechas = " AND don.fecha BETWEEN ".$_POST["Fechab1"]." AND ".$_POST["Fechab2"]."";

		if($_POST["Recibob"] != '')
		{
			$Recibo = " AND don.recibo = '".$_POST['Recibob']."' ";
		}
		else
		{
			$Recibo  = "";
		}

		if($_POST["Usuariob"] != 0)
		{
			$Usuario = "AND don.recibe = ".$_POST["Usuariob"] ."";
		}
		else
		{
			$Usuario  = "";
		}

		echo "<div class='form-group'>
					<table id='tabla_donaciones' cellpadding='0' cellspacing='0' border='0' class='table table-striped'>
						<thead>
							<tr>
								<th>No</th>
								<th>Recibo No.</th>
								<th>COMITE, ASOCIACION, FUNDACION U OTRO</th>
								<th>LUGAR, MUNICIPIO Y DEPARTAMENTO</th>
								<th>Fecha</th>
								<th>Q </th>
								<th>Monto</th>
								<th>Motivo</th>
								<th>Persona que Recibe</th>
								<th>Usuario de Registro</th>
								<th>Modificar</th>
							</tr>
						</thead>
						<tbody>";
								$Consulta = "SELECT don.noRecibo, don.recibo, don.nombreDonador, don.direccion, don.fecha, date_format(don.fecha, '%d/%m/%Y') fecha, don.cantidad, don.motivo, don.recibe, concat(per.CodEmpleado,  ' | '  , per.nombres) nombre, don.idUsuario, us.nombreUser 
											FROM donacion don
											INNER JOIN personal per ON per.idEmpleado = don.recibe
											INNER JOIN usuario us ON us.idUsuario = don.idUsuario
											".$Usuario.$Fechas.$Recibo.";";
								//echo $Consulta;
								$Respuesta = $Conexion->list_orders($Consulta);
								$x=0;
								while ($row = mysql_fetch_assoc($Respuesta))
								{
									$x++;
									$Modificar = '<image class=btn btn-default src=img/modificar.png title=Modificar Registro onclick="FncModificar(\''.$row["noRecibo"].'\', \''.$row["recibo"].'\', \''.$row["nombreDonador"].'\', \''.$row["direccion"].'\', \''.$row["fecha"].'\', \''.$row["cantidad"].'\', \''.$row["motivo"].'\', \''.$row["recibe"].'\');">';
									
									echo '<tr>
												<td>'.$x.'</td>
												<td>'.$row["recibo"].'</td>
												<td>'.$row["nombreDonador"].'</td>
												<td>'.$row["direccion"].'</td>
												<td>'.$row["fecha"].'</td>
												<td>Q </td>
												<td>'.$row['cantidad'].'</td>
												<td>'.$row["motivo"].'</td>
												<td>'.$row['nombre'].'</td>
												<td>'.$row["nombreUser"].'</td>
												<td>'.$Modificar.'</td>
											</tr>
											';
								}
						echo "</tbody>
					</table>
				</div>
				<script>
					FncTabla('tabla_donaciones');
				</script>";
	} 
	else if(isset($_POST["BuscarLubricantes"]))
	{
		$Fechas = " AND lb.fecha BETWEEN ".$_POST["Fechab1"]." AND ".$_POST["Fechab2"]."";

		if($_POST["Recibob"] != '')
		{
			$Recibo = " AND lb.comprobante = '".$_POST['Recibob']."' ";
		}
		else
		{
			$Recibo  = "";
		}

		if($_POST["Usuariob"] != 0)
		{
			$Usuario = "AND lb.idUnidad = ".$_POST["Usuariob"] ."";
		}
		else
		{
			$Usuario  = "";
		}

		echo "<div class='form-group'>
					<table id='tabla_Lubricantes' cellpadding='0' cellspacing='0' border='0' class='table table-striped'>
						<thead>
							<tr>
								<th>NO</th>
								<th>Unidad No.</th>
								<th>Fecha de Revision</th>
								<th>Kilometraje</th>
								<th>Descripcion</th>
								<th>Comprobante</th>
								<th>Q </th>
								<th>Costo</th>
								<th>Usuario de Registro</th>
								<th>Modificar</th>
							</tr>
						</thead>
						<tbody>";
								$Consulta = "SELECT lb.idRevision, lb.idUnidad, un.unidad_no, date_format(lb.fecha, '%d/%m/%Y') as fechas, lb.kilometraje, lb.descripcion, lb.comprobante, lb.costo, lb.idUsuario, u.nombreUser
											FROM lubricantes lb
											INNER JOIN unidad un ON un.idUnidad = lb.idUnidad
											INNER JOIN usuario u ON u.idUsuario = lb.idUsuario
											".$Usuario.$Fechas.$Recibo.";";
								//echo $Consulta;
								$Respuesta = $Conexion->list_orders($Consulta);
								$x=0;
								while ($row = mysql_fetch_assoc($Respuesta))
								{
									$x++;
									$Modificar = '<image class=btn btn-default src=img/modificar.png title=Modificar Registro onclick="FncModificar(\''.$row["idRevision"].'\', \''.$row["idUnidad"].'\', \''.$row["fechas"].'\', \''.$row["kilometraje"].'\', \''.$row["descripcion"].'\', \''.$row["comprobante"].'\', \''.$row["costo"].'\');">';
									
									echo '<tr>
												<td>'.$x.'</td>
												<td>'.$row["unidad_no"].'</td>
												<td>'.$row["fechas"].'</td>
												<td>'.$row["kilometraje"].'</td>
												<td>'.$row["descripcion"].'</td>
												<td>'.$row['comprobante'].'</td>
												<td>Q </td>
												<td>'.$row["costo"].'</td>
												<td>'.$row["nombreUser"].'</td>
												<td>'.$Modificar.'</td>
											</tr>
											';
								}
						echo "</tbody>
					</table>
				</div>
				<script>
					FncTabla('tabla_Lubricantes');
				</script>";
	} 
	else if(isset($_POST["BuscarReparaciones"]))
	{
		$Fechas = " AND rp.fecha BETWEEN ".$_POST["Fechab1"]." AND ".$_POST["Fechab2"]."";

		if($_POST["Recibob"] != '')
		{
			$Recibo = " AND rp.comprobante = '".$_POST['Recibob']."' ";
		}
		else
		{
			$Recibo  = "";
		}

		if($_POST["Usuariob"] != 0)
		{
			$Usuario = "AND rp.idUnidad = ".$_POST["Usuariob"] ."";
		}
		else
		{
			$Usuario  = "";
		}

		echo "<div class='form-group'>
					<table id='tabla_Reparacion' cellpadding='0' cellspacing='0' border='0' class='table table-striped'>
						<thead>
							<tr>
								<th>NO</th>
								<th>Unidad No.</th>
								<th>Fecha de Revision</th>
								<th>Q </th>
								<th>Costo</th>
								<th>Comprobante</th>
								<th>Descripcion</th>
								<th>Usuario de Registro</th>
								<th>Modificar</th>
							</tr>
						</thead>
						<tbody>";
								$Consulta = "SELECT rp.idReparacion, rp.idUnidad, un.unidad_no, rp.descripcion,  date_format(rp.fecha, '%d/%m/%Y') Fechas, rp.costo, rp.comprobante, rp.idUsuario, u.nombreUser
											FROM reparacion rp
											INNER JOIN unidad un ON un.idUnidad = rp.idUnidad
											INNER JOIN usuario u ON u.idUsuario = rp.idUsuario
											".$Usuario.$Fechas.$Recibo.";";
								//echo $Consulta;
								$Respuesta = $Conexion->list_orders($Consulta);
								$x=0;
								while ($row = mysql_fetch_assoc($Respuesta))
								{
									$x++;
									$Modificar = '<image class=btn btn-default src=img/modificar.png title=Modificar Registro onclick="FncModificar(\''.$row["idReparacion"].'\', \''.$row["idUnidad"].'\', \''.$row["Fechas"].'\', \''.$row["costo"].'\', \''.$row["comprobante"].'\', \''.$row["descripcion"].'\');">';
									
									echo '<tr>
												<td>'.$x.'</td>
												<td>'.$row["unidad_no"].'</td>
												<td>'.$row["Fechas"].'</td>
												<td>Q </td>
												<td>'.$row["costo"].'</td>
												<td>'.$row['comprobante'].'</td>
												<td>'.$row["descripcion"].'</td>
												<td>'.$row["nombreUser"].'</td>
												<td>'.$Modificar.'</td>
											</tr>
											';
								}
						echo "</tbody>
					</table>
				</div>
				<script>
					FncTabla('tabla_Reparacion');
				</script>";
	} 
	else if(isset($_POST["BuscarCombustibles"]))
	{
		$Fechas = " AND cb.fecha BETWEEN ".$_POST["Fechab1"]." AND ".$_POST["Fechab2"]."";

		if($_POST["Recibob"] != '')
		{
			$Recibo = " AND cb.noComprobante = '".$_POST['Recibob']."' ";
		}
		else
		{
			$Recibo  = "";
		}

		if($_POST["Usuariob"] != 0)
		{
			$Usuario = "AND cb.idUnidad = ".$_POST["Usuariob"] ."";
		}
		else
		{
			$Usuario  = "";
		}

		echo "<div class='form-group'>
					<table id='tabla_Reparacion' cellpadding='0' cellspacing='0' border='0' class='table table-striped'>
						<thead>
							<tr>
								<th>NO</th>
								<th>Fecha de Consumo</th>
								<th>No. Vale</th>
								<th>Unidad Abastecida</th>
								<th>Galones</th>
								<th>Q </th>
								<th>Costo</th>
								<th>Kilometraje</th>
								<th>Gasolinera</th>
								<th>Piloto de Unidad</th>
								<th>Comprobante</th>
								<th>Descripcion</th>
								<th>Usuario de Registro</th>
								<th>Modificar</th>
							</tr>
						</thead>
						<tbody>";
								$Consulta = "SELECT cb.idAbastecimiento, date_format(cb.fecha, '%d/%m/%Y')Fechas, cb.cantGalones, cb.costo, cb.kilometraje, cb.gasolinera, cb.no_vale, cb.piloto, 
											concat(p.nombres, ' ', p.apellidos) Piloto, cb.idUnidad, un.unidad_no, cb.noComprobante, cb.descripcion, u.nombreUser
											FROM combustible cb
											INNER JOIN unidad un ON un.idUnidad = cb.idUnidad
											INNER JOIN personal p ON p.idEmpleado = cb.piloto
											INNER JOIN usuario u ON u.idUsuario = cb.idUsuario
											".$Usuario.$Fechas.$Recibo.";";
								//echo $Consulta;
								$Respuesta = $Conexion->list_orders($Consulta);
								$x=0;
								while ($row = mysql_fetch_assoc($Respuesta))
								{
									$x++;
									$Modificar = '<image class=btn btn-default src=img/modificar.png title=Modificar Registro onclick="FncModificar(\''.$row["idAbastecimiento"].'\', \''.$row["Fechas"].'\', \''.$row["no_vale"].'\', \''.$row["idUnidad"].'\', \''.$row["cantGalones"].'\', \''.$row["costo"].'\', \''.$row["kilometraje"].'\', \''.$row["gasolinera"].'\', \''.$row["piloto"].'\', \''.$row["noComprobante"].'\', \''.$row["descripcion"].'\');">';
									
									echo '<tr>
												<td>'.$x.'</td>
												<td>'.$row["Fechas"].'</td>
												<td>'.$row["no_vale"].'</td>
												<td>'.$row["unidad_no"].'</td>
												<td>'.$row['cantGalones'].'</td>
												<td>Q </td>
												<td>'.$row["costo"].'</td>
												<td>'.$row["kilometraje"].'</td>
												<td>'.$row["gasolinera"].'</td>
												<td>'.$row["Piloto"].'</td>
												<td>'.$row["noComprobante"].'</td>
												<td>'.$row["descripcion"].'</td>
												<td>'.$row["nombreUser"].'</td>
												<td>'.$Modificar.'</td>
											</tr>
											';
								}
						echo "</tbody>
					</table>
				</div>
				<script>
					FncTabla('tabla_Reparacion');
				</script>";
	}
	else if(isset($_POST["BuscarAsignacionTurnos"]))
	{
		$Fechas = " AND at.fecha BETWEEN ".$_POST["Fechab1"]." AND ".$_POST["Fechab2"]."";

		if($_POST["Turno"] != 0)
		{
			$Recibo = " AND at.idTurno = '".$_POST['Turno']."' ";
		}
		else
		{
			$Recibo  = "";
		}

		if($_POST["Usuariob"] != 0)
		{
			$Usuario = "AND at.idEmpleado = ".$_POST["Usuariob"] ."";
		}
		else
		{
			$Usuario  = "";
		}

		echo "<div class='form-group'>
					<table id='tabla_AsignacionTurnos' cellpadding='0' cellspacing='0' border='0' class='table table-striped'>
						<thead>
							<tr>
								<th>NO</th>
								<th>Fecha de Turno/th>
								<th>Nombre de Turno</th>
								<th>Persona Asignada</th>
								<th>Usuario de Registro</th>
								<th>Modificar</th>
							</tr>
						</thead>
						<tbody>";
								$Consulta = "SELECT at.idasigTurno, date_format(at.fecha, '%d/%m/%Y') Fechas, at.idTurno, t.nombreTurno, concat(p.nombres, ' ', p.apellidos) Empleado , at.idEmpleado, u.nombreUser
											FROM asignacionturno at
											INNER JOIN turno t ON t.id_turno = at.idTurno
											INNER JOIN personal p ON p.idEmpleado = at.idEmpleado
											INNER JOIN usuario u ON t.idUsuario = u.idUsuario
											".$Usuario.$Fechas.$Recibo.";";
								//echo $Consulta;
								$Respuesta = $Conexion->list_orders($Consulta);
								$x=0;
								while ($row = mysql_fetch_assoc($Respuesta))
								{
									$x++;
									$Modificar = '<image class=btn btn-default src=img/modificar.png title=Modificar Registro onclick="FncModificar(\''.$row["idasigTurno"].'\', \''.$row["Fechas"].'\', \''.$row["idTurno"].'\', \''.$row["idEmpleado"].'\');">';
									
									echo '<tr>
												<td>'.$x.'</td>
												<td>'.$row["Fechas"].'</td>
												<td>'.$row["nombreTurno"].'</td>
												<td>'.$row["Empleado"].'</td>
												<td>'.$row['nombreUser'].'</td>
												<td>'.$Modificar.'</td>
											</tr>
											';
								}
						echo "</tbody>
					</table>
				</div>
				<script>
					FncTabla('tabla_AsignacionTurnos');
				</script>";
	} 
	else if(isset($_POST["BuscarIngresoPersonal"]))
	{
		$Fechas = " AND DATE(ae.fecha) BETWEEN ".$_POST["Fechab1"]." AND ".$_POST["Fechab2"]."";

		if($_POST["Turno"] != 0)
		{
			$Recibo = " AND ae.id_Turno = '".$_POST['Turno']."' ";
		}
		else
		{
			$Recibo  = "";
		}

		if($_POST["Usuariob"] != 0)
		{
			$Usuario = "AND ae.codEmpleado = ".$_POST["Usuariob"] ."";
		}
		else
		{
			$Usuario  = "";
		}

		echo "<div class='form-group'>
					<table id='tabla_IngresoPersonal' cellpadding='0' cellspacing='0' border='0' class='table table-striped'>
						<thead>
							<tr>
								<th>NO</th>
								<th>Fecha y Hora de Asistencia</th>
								<th>Nombre de Turno</th>
								<th>Persona Asignada</th>
								<th>Observaciones</th>
								<th>Usuario de Registro</th>
								<th>Modificar</th>
							</tr>
						</thead>
						<tbody>";
								$Consulta = "SELECT ae.idAsistenciaEntrada, date_format(ae.fecha, '%d/%m/%Y %H:%m:%s') Fechas, ae.id_Turno, t.nombreTurno, ae.codEmpleado, concat(p.nombres, ' ', p.apellidos) Empleado, ae.observaciones, u.nombreUser
											FROM asistenciaentrada ae
											INNER JOIN turno t ON t.id_turno = ae.id_Turno
											INNER JOIN personal p ON p.idEmpleado = ae.codEmpleado
											INNER JOIN usuario u ON t.idUsuario = u.idUsuario
											".$Usuario.$Fechas.$Recibo.";";
								//echo $Consulta;
								$Respuesta = $Conexion->list_orders($Consulta);
								$x=0;
								while ($row = mysql_fetch_assoc($Respuesta))
								{
									$x++;
									$Modificar = '<image class=btn btn-default src=img/modificar.png title=Modificar Registro onclick="FncModificar(\''.$row["idAsistenciaEntrada"].'\', \''.$row["Fechas"].'\', \''.$row["id_Turno"].'\', \''.$row["codEmpleado"].'\', \''.$row["observaciones"].'\');">';
									
									echo '<tr>
												<td>'.$x.'</td>
												<td>'.$row["Fechas"].'</td>
												<td>'.$row["nombreTurno"].'</td>
												<td>'.$row["Empleado"].'</td>
												<td>'.$row["observaciones"].'</td>
												<td>'.$row['nombreUser'].'</td>
												<td>'.$Modificar.'</td>
											</tr>
											';
								}
						echo "</tbody>
					</table>
				</div>
				<script>
					FncTabla('tabla_IngresoPersonal');
				</script>";
	}
	else if(isset($_POST["BuscarSalidaPersonal"]))
	{
		$Fechas = " AND DATE(ass.fecha) BETWEEN ".$_POST["Fechab1"]." AND ".$_POST["Fechab2"]."";

		if($_POST["Turno"] != 0)
		{
			$Recibo = " AND ass.id_Turno = '".$_POST['Turno']."' ";
		}
		else
		{
			$Recibo  = "";
		}

		if($_POST["Usuariob"] != 0)
		{
			$Usuario = "AND ass.idEmpleado = ".$_POST["Usuariob"] ."";
		}
		else
		{
			$Usuario  = "";
		}

		echo "<div class='form-group'>
					<table id='tabla_SalidaPersonal' cellpadding='0' cellspacing='0' border='0' class='table table-striped'>
						<thead>
							<tr>
								<th>NO</th>
								<th>Fecha y Hora de Asistencia</th>
								<th>Nombre de Turno</th>
								<th>Persona Asignada</th>
								<th>Observaciones</th>
								<th>Usuario de Registro</th>
								<th>Modificar</th>
							</tr>
						</thead>
						<tbody>";
								$Consulta = "SELECT ass.idAsistenciaSalida, date_format(ass.fecha, '%d/%m/%Y %H:%m:%s') Fechas, ass.id_Turno, t.nombreTurno, ass.idEmpleado,  concat(p.nombres, ' ', p.apellidos) Empleado, ass.observaciones, u.nombreUser
											FROM asistenciasalida ass
											INNER JOIN turno t ON t.id_turno = ass.id_Turno
											INNER JOIN personal p ON p.idEmpleado = ass.idEmpleado
											INNER JOIN usuario u ON t.idUsuario = u.idUsuario
											".$Usuario.$Fechas.$Recibo.";";
								//echo $Consulta;
								$Respuesta = $Conexion->list_orders($Consulta);
								$x=0;
								while ($row = mysql_fetch_assoc($Respuesta))
								{
									$x++;
									$Modificar = '<image class=btn btn-default src=img/modificar.png title=Modificar Registro onclick="FncModificar(\''.$row["idAsistenciaSalida"].'\', \''.$row["Fechas"].'\', \''.$row["id_Turno"].'\', \''.$row["idEmpleado"].'\', \''.$row["observaciones"].'\');">';
									
									echo '<tr>
												<td>'.$x.'</td>
												<td>'.$row["Fechas"].'</td>
												<td>'.$row["nombreTurno"].'</td>
												<td>'.$row["Empleado"].'</td>
												<td>'.$row["observaciones"].'</td>
												<td>'.$row['nombreUser'].'</td>
												<td>'.$Modificar.'</td>
											</tr>
											';
								}
						echo "</tbody>
					</table>
				</div>
				<script>
					FncTabla('tabla_SalidaPersonal');
				</script>";
	}  
	else if(isset($_POST["BuscarAsignacionTareas"]))
	{
		$Fechas = " AND DATE(ass.fecha) BETWEEN ".$_POST["Fechab1"]." AND ".$_POST["Fechab2"]."";

		if($_POST["Turno"] != 0)
		{
			$Recibo = " AND ass.id_Turno = '".$_POST['Turno']."' ";
		}
		else
		{
			$Recibo  = "";
		}

		if($_POST["Usuariob"] != 0)
		{
			$Usuario = "AND ass.idEmpleado = ".$_POST["Usuariob"] ."";
		}
		else
		{
			$Usuario  = "";
		}

		echo "<div class='form-group'>
					<table id='tabla_AsignacionTareas' cellpadding='0' cellspacing='0' border='0' class='table table-striped'>
						<thead>
							<tr>
								<th>NO</th>
								<th>Turno</th>
								<th>Actividad</th>
								<th>Persona Asignada</th>
								<th>Usuario de Registro</th>
								<th>Modificar</th>
							</tr>
						</thead>
						<tbody>";
								$Consulta = "SELECT asa.idAsignacion, asa.idEmpleado, concat(p.nombres, ' ', p.apellidos) Empleado, asa.idTurno, t.nombreTurno, asa.idActividad, ac.nombre,  u.nombreUser
											FROM asignacionactividad asa
											INNER JOIN turno t ON t.id_turno = asa.idTurno
											INNER JOIN actividad ac ON ac.idActividad= asa.idActividad
											INNER JOIN personal p ON p.idEmpleado = asa.idEmpleado
											INNER JOIN usuario u ON u.idUsuario = asa.idUsuario;
											".$Usuario.$Fechas.$Recibo.";";
								//echo $Consulta;
								$Respuesta = $Conexion->list_orders($Consulta);
								$x=0;
								while ($row = mysql_fetch_assoc($Respuesta))
								{
									$x++;
									$Modificar = '<image class=btn btn-default src=img/modificar.png title=Modificar Registro onclick="FncModificar(\''.$row["idAsistenciaSalida"].'\', \''.$row["Fechas"].'\', \''.$row["id_Turno"].'\', \''.$row["idEmpleado"].'\', \''.$row["observaciones"].'\');">';
									
									echo '<tr>
												<td>'.$x.'</td>
												<td>'.$row["nombreTurno"].'</td>
												<td>'.$row["nombre"].'</td>
												<td>'.$row["Empleado"].'</td>
												<td>'.$row['nombreUser'].'</td>
												<td>'.$Modificar.'</td>
											</tr>
											';
								}
						echo "</tbody>
					</table>
				</div>
				<script>
					FncTabla('tabla_AsignacionTareas');
				</script>";
	}  
?>