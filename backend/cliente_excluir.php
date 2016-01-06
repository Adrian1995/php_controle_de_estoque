<?php	
include ("../conectaDB.inc");

$cliente_id = $_POST['cliente_id'];

$deletacliente = mysqli_query ($conectaBanco, "DELETE FROM cliente WHERE cliente_id = '".$cliente_id."' ") or die (mysql_error());																 
?>