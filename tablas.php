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
		$Fechas = " AND asa.fecha BETWEEN ".$_POST["Fechab1"]." AND ".$_POST["Fechab2"]."";

		if($_POST["Turno"] != 0)
		{
			$Turno = " AND asa.idTurno = '".$_POST['Turno']."' ";
		}
		else
		{
			$Turno  = "";
		}

		if($_POST["Actividad"] != 0)
		{
			$Actividad = " AND asa.idActividad = '".$_POST['Actividad']."' ";
		}
		else
		{
			$Actividad  = "";
		}

		if($_POST["Usuariob"] != 0)
		{
			$Usuario = "AND asa.idEmpleado = ".$_POST["Usuariob"] ."";
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
								<th>Fecha de Actividad</th>
								<th>Turno</th>
								<th>Actividad</th>
								<th>Persona Asignada</th>
								<th>Usuario de Registro</th>
								<th>Modificar</th>
							</tr>
						</thead>
						<tbody>";
								$Consulta = "SELECT asa.idAsignacion, date_format(asa.fecha, '%d/%m/%Y') Fechas, asa.idEmpleado, concat(p.nombres, ' ', p.apellidos) as Empleado, asa.idTurno, t.nombreTurno, asa.idActividad, ac.nombre,  u.nombreUser
											FROM asignacionactividad asa
											INNER JOIN turno t ON t.id_turno = asa.idTurno
											INNER JOIN actividad ac ON ac.idActividad= asa.idActividad
											INNER JOIN personal p ON p.idEmpleado = asa.idEmpleado
											INNER JOIN usuario u ON u.idUsuario = asa.idUsuario
											".$Usuario.$Turno.$Fechas.$Actividad.";";
								//echo $Consulta;
								$Respuesta = $Conexion->list_orders($Consulta);
								$x=0;
								while ($row = mysql_fetch_assoc($Respuesta))
								{
									$x++;
									$Modificar = '<image class=btn btn-default src=img/modificar.png title=Modificar Registro onclick="FncModificar(\''.$row["idAsignacion"].'\', \''.$row["Fechas"].'\', \''.$row["idTurno"].'\', \''.$row["idActividad"].'\', \''.$row["idEmpleado"].'\');">';
									
									echo '<tr>
												<td>'.$x.'</td>
												<td>'.$row["Fechas"].'</td>
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
	else if(isset($_POST["BuscarServicios"]))
	{
		$Fechas = " AND r.fecha BETWEEN ".$_POST["Fechab1"]." AND ".$_POST["Fechab2"]."";

		if($_POST["Categoria"] != 0)
		{
			$Actividad = " AND r.idIncidente = '".$_POST['Categoria']."' ";
		}
		else
		{
			$Actividad  = "";
		}

		if($_POST["Usuariob"] != 0)
		{
			$Usuario = "AND r.piloto  = ".$_POST["Usuariob"] ."";
		}
		else
		{
			$Usuario  = "";
		}

		if($_POST["Unidad"] != 0)
		{
			$Unidad = " AND r.unidad_no  = ".$_POST["Unidad"] ."";
		}
		else
		{
			$Unidad  = "";
		}

		echo "<div class='form-group'>
					<table id='tabla_Servicios' cellpadding='0' cellspacing='0' border='0' class='table table-striped'>
						<thead>
							<tr>
								<th>NO</th>
								<th>Reporte No.</th>
								<th>Direccion del Traslado</th>
								<th>Nombre del Paciente</th>
								<th>Direccion del paciente</th>
								<th>Edad</th>
								<th>Rango Edad</th>
								<th>Sexo</th>
								<th>Se Traslado a</th>
								<th>Forma de aviso</th>
								<th>Telefono</th>
								<th>Telefonista de turno</th>
								<th>Unidad No</th>
								<th>Hora de Salida</th>
								<th>Hora de Entrada</th>
								<th>Nombre del Piloto</th>
								<th>Fecha de Reporte</th>
								<th>Kilometraje de Salida</th>
								<th>Kilometraje de Entrada</th>
								<th>Bombero que hizo el reporte</th>
								<th>Bomberos Asistentes</th>
								<th>Observaciones</th>
								<th>Kilometros Recorridos</th>
								<th>Incidente</th>
								<th>Usuario de Registro</th>
								<th>Modificar</th>
							</tr>
						</thead>
						<tbody>";
								$Consulta = "SELECT r.idReporte, r.noReporte, r.direccionTraslado, r.paciente, r.direccionPaciente, r.edad, r.rangoedad,r.sexo, r.lugar_asistencia, r.aviso, r.Telefono, r.telefonista, concat(p.nombres, ' ', p.apellidos) Telefonista, r.unidad_no unid, un.unidad_no, r.horaSalida,
											r.horaEntrada, r.piloto, concat(p.nombres, ' ', p.apellidos) as Piloto, date_format(r.fecha, '%d/%m/%Y') Fecha, r.kmSalida, r.kmEntrada, r.kmRecorridos, r.bomberoReporte, concat(per.nombres, ' ', per.apellidos) as Bombero_reporte, r.asistentes, r.observaciones, r.idIncidente,  u.nombreUser,
												(SELECT concat(ser.descServicio, ' ',  cau.descCausa, ' ', inc.descIncidente )
												from incidente inc
												INNER JOIN causa cau ON cau.idCausa = inc.idCausa
												INNER JOIN servicio ser ON ser.codServicio = inc.idservicio
												WHERE inc.idIncidente = r.idIncidente) Incidente
											FROM reporte r
											INNER JOIN unidad un ON un.idUnidad = r.unidad_no
											INNER JOIN personal p ON p.idEmpleado = r.piloto 
											INNER JOIN personal per ON per.idEmpleado = r.bomberoReporte
											INNER JOIN usuario u ON u.idUsuario= r.idUsuario
											".$Usuario.$Fechas.$Actividad.$Unidad.";";
								//echo $Consulta;
								$Respuesta = $Conexion->list_orders($Consulta);
								$x=0;
								while ($row = mysql_fetch_assoc($Respuesta))
								{
									$x++;
									$Modificar = '<image class=btn btn-default src=img/modificar.png title=Modificar Registro onclick="FncModificar(\''.$row["idReporte"].'\', \''.$row["noReporte"].'\', \''.$row["direccionTraslado"].'\', \''.$row["paciente"].'\', \''.$row["direccionPaciente"].'\', \''.$row["edad"].'\', \''.$row["rangoedad"].'\', \''.$row["sexo"].'\', \''.$row["lugar_asistencia"].'\', \''.$row["aviso"].'\', \''.$row["Telefono"].'\', \''.$row["telefonista"].'\', \''.$row["unid"].'\', \''.$row["horaSalida"].'\', \''.$row["horaEntrada"].'\', \''.$row["piloto"].'\', \''.$row["Fecha"].'\', \''.$row["kmSalida"].'\', \''.$row["kmEntrada"].'\', \''.$row["bomberoReporte"].'\', \''.$row["asistentes"].'\', \''.$row["observaciones"].'\', \''.$row["kmRecorridos"].'\', \''.$row["idIncidente"].'\');">';
									
									if($row["rangoedad"] == 'A')
									{
										$Rango = "Años";
									}
									else if($row["rangoedad"] == 'M')
									{
										$Rango = "Meses";
									}
									else
									{
										$Rango = "DIAS";
									}

									echo '<tr>
												<td>'.$x.'</td>
												<td>'.$row["noReporte"].'</td>
												<td>'.$row["direccionTraslado"].'</td>
												<td>'.$row["paciente"].'</td>
												<td>'.$row["direccionPaciente"].'</td>
												<td>'.$row["edad"].'</td>
												<td>'.$Rango.'</td>
												<td>'.$row["sexo"].'</td>
												<td>'.$row["lugar_asistencia"].'</td>
												<td>'.$row["aviso"].'</td>
												<td>'.$row["Telefono"].'</td>
												<td>'.$row["Telefonista"].'</td>
												<td>'.$row["unidad_no"].'</td>
												<td>'.$row["horaSalida"].'</td>
												<td>'.$row["horaEntrada"].'</td>
												<td>'.$row["Piloto"].'</td>
												<td>'.$row["Fecha"].'</td>
												<td>'.$row["kmSalida"].'</td>
												<td>'.$row["kmEntrada"].'</td>
												<td>'.$row["Bombero_reporte"].'</td>
												<td>'.$row["asistentes"].'</td>
												<td>'.$row["observaciones"].'</td>
												<td>'.$row["kmRecorridos"].'</td>
												<td>'.$row["Incidente"].'</td>
												<td>'.$row['nombreUser'].'</td>
												<td>'.$Modificar.'</td>
											</tr>
											';
								}
						echo "</tbody>
					</table>
				</div>
				<script>
					FncTabla('tabla_Servicios');
				</script>";
	}  
	else if(isset($_POST["BuscarGastos"]))
	{
		$Fechas = " WHERE d.fecha BETWEEN ".$_POST["Fechab1"]." AND ".$_POST["Fechab2"]."";
		$Fechas2 = " WHERE e.fecha BETWEEN ".$_POST["Fechab1"]." AND ".$_POST["Fechab2"]."";

		echo "
				<div class='form-group'>
					<big><big><label class='control-label col-xs-2 text-primary'>Ingresos</label></big></big>
		            <big><big><label class='control-label col-xs-5 text-primary'>Egresos</label></big></big>
				</div>";

		echo "<div class='form-group'>
				<label class='control-label col-xs-1'></label>
				<div class='col-xs-4' >
					<table id='tabla_ingresos' cellpadding='0' cellspacing='0' border='0' class='table table-striped'>
						<thead>
							<tr>
								<th>No.</th>
								<th>Fecha</th>
								<th>Ingreso</th>
								<th>Motivo</th>
							</tr>
						</thead>
							<tbody>";
									$Consulta = "SELECT d.cantidad, d.motivo, date_format( d.fecha , '%d/%m/%Y') Fechas
												FROM donacion d
												".$Fechas.";";
									//echo $Consulta;
									$Respuesta = $Conexion->list_orders($Consulta);
									$x=0;
									while ($row = mysql_fetch_assoc($Respuesta))
									{
										$x++;

										echo '<tr>
													<td>'.$x.'</td>
													<td>'.$row["Fechas"].'</td>
													<td>'.$row["cantidad"].'</td>
													<td>'.$row["motivo"].'</td>
												</tr>
												';
									}
						echo "</tbody>
					</table>
				</div>
				<label class='control-label col-xs-1'></label>
				<div class='col-xs-4' >
					<table id='tabla_egresos' cellpadding='0' cellspacing='0' border='0' class='table table-striped'>
						<thead>
							<tr>
								<th>No.</th>
								<th>Fecha</th>
								<th>Egreso</th>
								<th>Motivo</th>
							</tr>
						</thead>
							<tbody>";
									$Consulta = "SELECT  e.monto, e.descripcion, date_format( e.fecha , '%d/%m/%Y') Fechas
												FROM egreso e
												".$Fechas2.";";
									//echo $Consulta;
									$Respuesta = $Conexion->list_orders($Consulta);
									$x=0;
									while ($row = mysql_fetch_assoc($Respuesta))
									{
										$x++;

										echo '<tr>
													<td>'.$x.'</td>
													<td>'.$row["Fechas"].'</td>
													<td>'.$row["monto"].'</td>
													<td>'.$row["descripcion"].'</td>
												</tr>
												';
									}
						echo "</tbody>
					</table>
				</div>
			</div>
			<script>
				FncTabla('tabla_ingresos');
				FncTabla('tabla_egresos');
			</script>";
	}  
?>