<?php
	function CrearCombo($Consulta,$Nombre,$Funcion,$Prefijo,$Sufijo,$Seleccionado,$Error)
	{
		include('app_db_config.php');
		require_once('dbops.php');     
		$MyOps = new DB($usr_Nombre,$usr_pwd,$target_db,$target_host);
		$count=0;
		$combo="<select id ='".$Nombre."' name ='".$Nombre."' ".$Funcion." style='width:300px'>";
		$combo.=$Prefijo;
		$res = $MyOps->list_orders($Consulta);
		if ($res)
		{
			while ($row = mysql_fetch_assoc($res)) 
			{
				$count++;
				if ($Seleccionado==$row['id'])
					$combo.="<option value='".$row['id']."' selected>".utf8_encode($row["Nombre"])." *</option>";
				else
					$combo.="<option value='".$row['id']."'>".utf8_encode($row["Nombre"])."</option>";
			}
		}

		$combo.=$Sufijo."</select>";
		if ($count==0)
		{
			$combo =" <img src='general_repository/image/stop_24x24.png'> <font color =red><b>No existen Datos</b></font>";
		}
			return $combo;
		}
?>