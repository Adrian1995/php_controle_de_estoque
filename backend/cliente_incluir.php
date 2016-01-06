<?php	
include ("../conectaDB.inc");

$cliente_nome = $_POST['cliente_nome'];
$cliente_email = $_POST['cliente_email'];
$cliente_telefone = $_POST['cliente_telefone'];

$consultaUltimoID = mysqli_query($conectaBanco, "SELECT MAX(cliente_id) FROM cliente");
$dados = mysqli_fetch_array($consultaUltimoID);
$ultimoID = $dados["0"];
$cliente_id = $ultimoID+1;
			
	$insereCliente = mysqli_query ($conectaBanco, "INSERT INTO cliente (cliente_id, 
																		cliente_nome,
																		cliente_email,
																		cliente_telefone)
															VALUES	( '$cliente_id', 
																	  '$cliente_nome',
																	  '$cliente_email',
																	  '$cliente_telefone')") or die (mysql_error());																 
?>