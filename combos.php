<?php 
	include('funciones/funciones.php');
			
	if(isset($_POST["subcategorias"]))
	{
		$Consulta = "SELECT idCausa id, descCausa nombre from causa
					 WHERE codServicio = '".$_POST["ID"]."'
					 ORDER BY nombre;";
		echo FncCrearCombo($Consulta,"subcategorias",'','','','','');	
	}
?>