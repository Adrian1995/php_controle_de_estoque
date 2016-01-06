<?php	
include ("../conectaDB.inc");

$produto_nome = $_POST['produto_nome'];
$produto_descricao = $_POST['produto_descricao'];
$produto_preco = $_POST['produto_preco'];
$produto_preco = str_replace(",", ".", $produto_preco);

$consultaUltimoID = mysqli_query($conectaBanco, "SELECT MAX(produto_id) FROM produto");
$dados = mysqli_fetch_array($consultaUltimoID);
$ultimoID = $dados["0"];
$produto_id = $ultimoID+1;
			
	$insereProduto = mysqli_query ($conectaBanco, "INSERT INTO produto (produto_id, 
																		produto_nome,
																		produto_descricao,
																		produto_preco)
															VALUES	( '$produto_id', 
																	  '$produto_nome',
																	  '$produto_descricao',
																	  '$produto_preco')") or die (mysql_error());																 
?>