<?php	
include ("../conectaDB.inc");

$pedido_id = $_POST['pedido_id'];
$produto_id = $_POST['produto_id'];
$qtde_produto = $_POST['qtde_produto'];
$cliente_id = $_POST['cliente_id'];
			
$alteraPedido = mysqli_query ($conectaBanco, "UPDATE pedido SET produto_id = '".$produto_id."',
																qtde_produto = '".$qtde_produto."',
																cliente_id  = '".$cliente_id."' 
															WHERE pedido_id = '".$pedido_id."' ") or die (mysql_error());																 
?>