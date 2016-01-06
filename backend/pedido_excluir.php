<?php	
include ("../conectaDB.inc");

$pedido_id = $_POST['pedido_id'];

$deletaPedido = mysqli_query ($conectaBanco, "DELETE FROM pedido WHERE pedido_id = '".$pedido_id."' ") or die (mysql_error());																 
?>