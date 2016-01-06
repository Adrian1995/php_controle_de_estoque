<?php	
include ("../conectaDB.inc");

$produto_id = $_POST['produto_id'];
$produto_nome = $_POST['produto_nome'];
$produto_descricao = $_POST['produto_descricao'];
$produto_preco = $_POST['produto_preco'];
$produto_preco = str_replace(",", ".", $produto_preco);
			
$alteraProduto = mysqli_query ($conectaBanco, "UPDATE produto SET produto_nome = '".$produto_nome."',
																 produto_descricao = '".$produto_descricao."',
																 produto_preco  = '".$produto_preco."' 
															WHERE produto_id = '".$produto_id."' ") or die (mysql_error());																 
?>