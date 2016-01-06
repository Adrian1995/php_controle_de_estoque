<html>
<head>
	<?php	include ("includes/head.inc");	?>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php	include ("includes/menu.inc");	?>
			<br>
			<br>
			<h3>Alteração de Produto</h3>
			<br>
			<br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php
			$produto_id = $_GET['id'];
				
			include ("conectaDB.inc");
			
			$buscasql_visualiza_produtos = mysqli_query($conectaBanco, "select * from produto WHERE produto_id = '".$produto_id."' ");
			
			while($resultadosql_visualiza_produtos = mysqli_fetch_array($buscasql_visualiza_produtos))
				{
				$produto_id = $resultadosql_visualiza_produtos["produto_id"];
				$produto_nome = $resultadosql_visualiza_produtos["produto_nome"];
				$produto_descricao = $resultadosql_visualiza_produtos["produto_descricao"];
				$produto_preco = $resultadosql_visualiza_produtos["produto_preco"];
					
				echo "<div class='col-md-3'>";
					echo "<br>";
					echo "<div class='input-group'>";
					echo "<div class='input-group-addon'>Nome</div>";
					echo "<input type='text' class='form-control' id='produto_nome' value='".$produto_nome."'>";
					echo "</div>";
					echo "<br>";
				echo "</div>";
				echo "<div class='col-md-3'>";
					echo "<br>";
					echo "<div class='input-group'>";
					echo "<div class='input-group-addon'>Descrição</div>";
					echo "<input type='text' class='form-control' id='produto_descricao' value='".$produto_descricao."'>";
					echo "</div>";
					echo "<br>";
				echo "</div>";
				echo "<div class='col-md-3'>";
					echo "<br>";
					echo "<div class='input-group'>";
					echo "<div class='input-group-addon'>Preço</div>";
					echo "<input type='text' class='form-control' id='produto_preco' value='".str_replace(".", ",", $produto_preco)."'>";
					echo "</div>";
					echo "<br>";
				echo "</div>";
				echo "<div class='col-md-3'>";
					echo "<br>";
					echo "<input type='button' class='form-control btn btn-primary' value='Confirmar' onclick='produto_alterar_salvar()'>";
					echo "<br>";
				echo "</div>";					
				}
			?>
		</div>
	</div>
</div>
<script>

function produto_alterar_salvar()
	{
	var produto_nome = $("#produto_nome").val();
	var produto_descricao = $("#produto_descricao").val();
	var produto_preco = $("#produto_preco").val();
	
	$.ajax({
			type: 'POST',
			url: 'backend/produto_alterar.php',
			data: {	produto_id: <?php echo $produto_id; ?>,
					produto_nome: produto_nome,
					produto_descricao: produto_descricao,
					produto_preco: produto_preco},
			async: true
			})
	.done(function(dados)
		{
		var novaURL = "index.php";
		$(window.document.location).attr('href',novaURL);
		});
	}

</script>	
</body>
</html>