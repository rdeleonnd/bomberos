<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="jquery/jquery-ui-1.10.1.custom.min.css" />
		<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.css" />
		<script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="jquery/jquery-ui.js"></script>
	</head>
	<body>
		<table>
			<tr>
				Bienvenidos todos..!
			</tr>
			<tr>
				<div id="principal" name="principal"></div>
			</tr>
		</table>
	</body>
</html>
<script >
	$(document).ready(function(){
		$("#principal").load("reporte_servicio.php #principal");
		alert("Hola..!!");
	});
	
</script>
<?php 
?>