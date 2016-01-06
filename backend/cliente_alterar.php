<?php	
include ("../conectaDB.inc");

$cliente_id = $_POST['cliente_id'];
$cliente_nome = $_POST['cliente_nome'];
$cliente_email = $_POST['cliente_email'];
$cliente_telefone = $_POST['cliente_telefone'];
			
$alteraProduto = mysqli_query ($conectaBanco, "UPDATE cliente SET cliente_nome = '".$cliente_nome."',
																  cliente_email = '".$cliente_email."',
																  cliente_telefone  = '".$cliente_telefone."' 
															WHERE cliente_id = '".$cliente_id."' ") or die (mysql_error());																 
?>