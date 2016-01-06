<?php	
include ("../conectaDB.inc");

$produto_id = $_POST['produto_id'];

$deletaproduto = mysqli_query ($conectaBanco, "DELETE FROM produto WHERE produto_id = '".$produto_id."' ") or die (mysql_error());																 
?>