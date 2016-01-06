<?php	
include ("../conectaDB.inc");

$produto_id = $_POST['produto_id'];
$qtde_produto = $_POST['qtde_produto'];
$cliente_id = $_POST['cliente_id'];

$consultaUltimoID = mysqli_query($conectaBanco, "SELECT MAX(pedido_id) FROM pedido");
$dados = mysqli_fetch_array($consultaUltimoID);
$ultimoID = $dados["0"];
$pedido_id = $ultimoID+1;
			
	$inserePedido = mysqli_query ($conectaBanco, "INSERT INTO pedido (pedido_id, 
																	  produto_id,
																	  qtde_produto,
																	  cliente_id)
															VALUES	( '$pedido_id', 
																	  '$produto_id',
																	  '$qtde_produto',
																	  '$cliente_id')") or die (mysql_error());																 
?>