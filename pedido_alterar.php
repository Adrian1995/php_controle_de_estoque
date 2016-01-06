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
			<h3>Alteração de Pedido</h3>
			<br>
			<br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php
			$pedido_id = $_GET['id'];
				
			include ("conectaDB.inc");	
			
			$buscasql_visualiza_pedido = mysqli_query($conectaBanco, "SELECT * FROM  pedido ped inner join cliente cli on ped.cliente_id = cli.cliente_id inner join produto pro on pro.produto_id = ped.produto_id WHERE pedido_id = '".$pedido_id."' ");
			
			while($resultadosql_visualiza_pedido = mysqli_fetch_array($buscasql_visualiza_pedido))
				{
				$produto_id = $resultadosql_visualiza_pedido["produto_id"];
				$produto_nome = $resultadosql_visualiza_pedido["produto_nome"];
				
				$cliente_id = $resultadosql_visualiza_pedido["cliente_id"];
				$cliente_nome = $resultadosql_visualiza_pedido["cliente_nome"];
				
				$qtde_produto = $resultadosql_visualiza_pedido["qtde_produto"];
					
					
				echo "<div class='col-md-3'>";
					echo "<br>";
					echo "<div class='input-group'>";
					echo "<div class='input-group-addon'>Produto</div>";
						echo "<select class='form-control' id='produto_id'>";
							echo "<option value='$produto_id'>$produto_nome</option>";
							$buscasql_visualiza_produtos = mysqli_query($conectaBanco, "select * from produto ORDER BY produto_id DESC");
							
							while($resultadosql_visualiza_produtos = mysqli_fetch_array($buscasql_visualiza_produtos))
								{
								$produto_id_c = $resultadosql_visualiza_produtos["produto_id"];
								$produto_nome = $resultadosql_visualiza_produtos["produto_nome"];
											
								if($produto_id != $produto_id_c)
									{
									echo "<option value='".$produto_id_c."'>".$produto_nome."</option>";
									}
								}
						echo "</select>";
					echo "</div>";
				echo "<br>";
				echo "</div>";
				echo "<div class='col-md-3'>";
					echo "<br>";
					echo "<div class='input-group'>";
					echo "<div class='input-group-addon'>Cliente</div>";
					echo "<select class='form-control' id='cliente_id'>";
						echo "<option value='$cliente_id'>$cliente_nome</option>";
							$buscasql_visualiza_clientes = mysqli_query($conectaBanco, "select * from cliente ORDER BY cliente_id DESC");
											
							while($resultadosql_visualiza_clientes = mysqli_fetch_array($buscasql_visualiza_clientes))
								{				
								$cliente_id_c = $resultadosql_visualiza_clientes["cliente_id"];
								$cliente_nome = $resultadosql_visualiza_clientes["cliente_nome"];
										
								if($cliente_id != $cliente_id_c)
									{
									echo "<option value='".$cliente_id_c."'>".$cliente_nome."</option>";
									}
								}
					echo "</select>";
					echo "</div>";
					echo "<br>";
				echo "</div>";
				echo "<div class='col-md-3'>";
					echo "<br>";
					echo "<div class='input-group'>";
					echo "<div class='input-group-addon'>Quantidade</div>";
					echo "<input type='number' class='form-control' id='qtde_produto' value='$qtde_produto' min='1'>";
					echo "</div>";
					echo "<br>";
				echo "</div>";
				echo "<div class='col-md-3'>";
					echo "<br>";
					echo "<input type='button' class='form-control btn btn-primary' value='Confirmar' onclick='pedido_alterar_salvar()'>";
					echo "<br>";
				echo "</div>";
					
					
					
					
					
				}
			?>
		</div>
	</div>
</div>
<script>

function pedido_alterar_salvar()
	{
	var produto_id = $("#produto_id").val();
	var cliente_id = $("#cliente_id").val();
	var qtde_produto = $("#qtde_produto").val();
	
	$.ajax({
			type: 'POST',
			url: 'backend/pedido_alterar.php',
			data: {	pedido_id: <?php echo $pedido_id; ?>,
					produto_id: produto_id,
					cliente_id: cliente_id,
					qtde_produto: qtde_produto},
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