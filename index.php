<?php
$filename = 'conectaDB.inc';

if (file_exists($filename)) 
	{} 
else {
	header("Location: instalacao.php");
	}
?>
<html>
<head>
	<?php	include ("includes/head.inc");	?>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php	include ("includes/menu.inc");	?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php
			if(!empty($_GET['a']))
				{
				$status = $_GET['a'];
				
				if($status == "first")
					{
					echo "<div class='alert alert-success' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> Banco de dados instalado com sucesso!</div>";	
					}
				}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<div class="col-md-2">
					<button type="button" class="btn btn-default btn-xs" onclick="pedido_incluir()">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Incluir pedido
					</button>
				</div>
				<div class="col-md-10">
					<h4>Pedidos</h4>
				</div>
				<div class="col-md-12" id="recebe_cad_pedido">
				</div>
			</div>
			<div class="row">
			<?php	
			include ("conectaDB.inc");	
			
			$buscasql_visualiza_pedidos = mysqli_query($conectaBanco, "select * from pedido ped inner join cliente cli on ped.cliente_id = cli.cliente_id inner join produto pro on pro.produto_id = ped.produto_id ORDER BY pedido_id DESC");
			?>
			<table class="table table-striped">
				<thead>
					<td>Pedido</td>
					<td>Qtde.</td>
					<td>Preço</td>
					<td>Total</td>
					<td>Produto</td>
					<td>Cliente</td>
					<td>E-mail</td>
					<td>Telefone</td>
					<td>Ações</td>
				</thead>
				<?php
				while($resultadosql_visualiza_pedidos = mysqli_fetch_array($buscasql_visualiza_pedidos))
					{
					$pedido_id = $resultadosql_visualiza_pedidos["pedido_id"];
					$qtde_produto = $resultadosql_visualiza_pedidos["qtde_produto"];
					
					$produto_id = $resultadosql_visualiza_pedidos["produto_id"];
					$produto_nome = $resultadosql_visualiza_pedidos["produto_nome"];
					$produto_descricao = $resultadosql_visualiza_pedidos["produto_descricao"];
					$produto_preco = $resultadosql_visualiza_pedidos["produto_preco"];
				
					$cliente_id = $resultadosql_visualiza_pedidos["cliente_id"];
					$cliente_nome = $resultadosql_visualiza_pedidos["cliente_nome"];
					$cliente_email = $resultadosql_visualiza_pedidos["cliente_email"];
					$cliente_telefone = $resultadosql_visualiza_pedidos["cliente_telefone"];
					
					$total = $qtde_produto*$produto_preco;
					
					echo "<tbody>";
						echo "<td>".$pedido_id."</td>";
						echo "<td>".$qtde_produto."</td>";
						echo "<td>R$ ".str_replace(".", ",", $produto_preco)."</td>";
						echo "<td>R$ ".str_replace(".", ",", $total)."</td>";
						echo "<td>".$produto_nome."</td>";
						echo "<td>".$cliente_nome."</td>";
						echo "<td>".$cliente_email."</td>";
						echo "<td>".$cliente_telefone."</td>";
						echo "<td>";
							echo "<a href='pedido_alterar.php?id=".$pedido_id."'><span class='glyphicon glyphicon-cog' aria-hidden='true'></span></a> &nbsp; ";
							echo "<a href='#' onclick='pedido_excluir(".$pedido_id.")'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>";
						echo "</td>";
					echo "</tbody>";
					}
				?>
			</table>
			</div>
		</div>
	</div>
	<br>
	<br>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<div class="col-md-2">
					<button type="button" class="btn btn-default btn-xs" onclick="produto_incluir()">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Incluir produto
					</button>
				</div>
				<div class="col-md-10">
					<h4>Produtos</h4>
				</div>
				<div class="col-md-12" id="recebe_cad_produto">
				</div>
			</div>
			<div class="row">
			<?php	
			include ("conectaDB.inc");	
			
			$buscasql_visualiza_produtos = mysqli_query($conectaBanco, "select * from produto ORDER BY produto_id DESC");
			?>
			<table class="table table-striped">
				<thead>
					<td>ID</td>
					<td>Nome</td>
					<td>Descrição</td>
					<td>Preço</td>
					<td>Ações</td>
				</thead>
				<?php
				while($resultadosql_visualiza_produtos = mysqli_fetch_array($buscasql_visualiza_produtos))
					{
					$produto_id = $resultadosql_visualiza_produtos["produto_id"];
					$produto_nome = $resultadosql_visualiza_produtos["produto_nome"];
					$produto_descricao = $resultadosql_visualiza_produtos["produto_descricao"];
					$produto_preco = $resultadosql_visualiza_produtos["produto_preco"];
					
					echo "<tbody>";
						echo "<td>".$produto_id."</td>";
						echo "<td>".$produto_nome."</td>";
						echo "<td>".$produto_descricao."</td>";
						echo "<td>R$ ".str_replace(".", ",", $produto_preco)."</td>";
						echo "<td>";
							echo "<a href='produto_alterar.php?id=".$produto_id."'><span class='glyphicon glyphicon-cog' aria-hidden='true'></span></a> &nbsp; ";
							echo "<a href='#' onclick='produto_excluir(".$produto_id.")'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>";
						echo "</td>";
					echo "</tbody>";
					}
				?>
			</table>
			</div>
		</div>
	</div>
	<br>
	<br>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<div class="col-md-2">
					<button type="button" class="btn btn-default btn-xs" onclick="cliente_incluir()">
					 <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Incluir cliente
					</button>
				</div>
				<div class="col-md-10">
					<h4>Clientes</h4>
				</div>
				<div class="col-md-12" id="recebe_cad_cliente">
				</div>
			</div>
			<div class="row">
			<?php	
			include ("conectaDB.inc");	
			
			$buscasql_visualiza_clientes = mysqli_query($conectaBanco, "select * from cliente ORDER BY cliente_id DESC");
			?>
			<table class="table table-striped">
				<thead>
					<td>ID</td>
					<td>Nome</td>
					<td>E-mail</td>
					<td>Telefone</td>
					<td>Ações</td>
				</thead>
				<?php
				while($resultadosql_visualiza_clientes = mysqli_fetch_array($buscasql_visualiza_clientes))
					{				
					$cliente_id = $resultadosql_visualiza_clientes["cliente_id"];
					$cliente_nome = $resultadosql_visualiza_clientes["cliente_nome"];
					$cliente_email = $resultadosql_visualiza_clientes["cliente_email"];
					$cliente_telefone = $resultadosql_visualiza_clientes["cliente_telefone"];
					
					echo "<tbody>";
						echo "<td>".$cliente_id."</td>";
						echo "<td>".$cliente_nome."</td>";
						echo "<td>".$cliente_email."</td>";
						echo "<td>".$cliente_telefone."</td>";
						echo "<td>";
							echo "<a href='cliente_alterar.php?id=".$cliente_id."'><span class='glyphicon glyphicon-cog' aria-hidden='true'></span></a> &nbsp; ";
							echo "<a href='#' onclick='cliente_excluir(".$cliente_id.")'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>";
						echo "</td>";
					echo "</tbody>";
					}
				?>
			</table>
			</div>
		</div>
	</div>
</div>
<script>


function pedido_incluir()
	{
	$("#recebe_cad_pedido").empty();
	$("#recebe_cad_pedido").append("<div class='col-md-3'>"+
										"<br>"+
										"<div class='input-group'>"+
										  "<div class='input-group-addon'>Produto</div>"+
										  "<select class='form-control' id='produto_id'>"+
											"<option value=''>Selecione...</option><?php
											$buscasql_visualiza_produtos = mysqli_query($conectaBanco, "select * from produto ORDER BY produto_id DESC");
											while($resultadosql_visualiza_produtos = mysqli_fetch_array($buscasql_visualiza_produtos))
												{
												$produto_id = $resultadosql_visualiza_produtos["produto_id"];
												$produto_nome = $resultadosql_visualiza_produtos["produto_nome"];
												
												echo "<option value='".$produto_id."'>".$produto_nome."</option>";
												}
											?></select>"+
										"</div>"+
										"<br>"+
									"</div>"+
									"<div class='col-md-3'>"+
										"<br>"+
										"<div class='input-group'>"+
										  "<div class='input-group-addon'>Cliente</div>"+
										  "<select class='form-control' id='cliente_id'>"+
											"<option value=''>Selecione...</option><?php
											$buscasql_visualiza_clientes = mysqli_query($conectaBanco, "select * from cliente ORDER BY cliente_id DESC");
											while($resultadosql_visualiza_clientes = mysqli_fetch_array($buscasql_visualiza_clientes))
												{				
												$cliente_id = $resultadosql_visualiza_clientes["cliente_id"];
												$cliente_nome = $resultadosql_visualiza_clientes["cliente_nome"];
												
												echo "<option value='".$cliente_id."'>".$cliente_nome."</option>";
												}
											?></select>"+
										"</div>"+
										"<br>"+
									"</div>"+
									"<div class='col-md-3'>"+
										"<br>"+
										"<div class='input-group'>"+
										  "<div class='input-group-addon'>Quantidade</div>"+
										  "<input type='number' class='form-control' id='qtde_produto' min='1'>"+
										"</div>"+
										"<br>"+
									"</div>"+
									"<div class='col-md-3'>"+
										"<br>"+
										"<input type='button' class='form-control btn btn-primary' value='Confirmar' onclick='pedido_incluir_salvar()'>"+
										"<br>"+
									"</div>");
	}
function pedido_incluir_salvar()
	{
	var produto_id = $("#produto_id").val();
	var cliente_id = $("#cliente_id").val();
	var qtde_produto = $("#qtde_produto").val();
	
	$.ajax({
			type: 'POST',
			url: 'backend/pedido_incluir.php',
			data: {	produto_id: produto_id,
					cliente_id: cliente_id,
					qtde_produto: qtde_produto},
			async: true
			})
	.done(function(dados)
		{
		location.reload();
		});
	}
function pedido_excluir(pedido_id)
	{
	$.ajax({
			type: 'POST',
			url: 'backend/pedido_excluir.php',
			data: {	pedido_id: pedido_id},
			async: true
			})
	.done(function(dados)
		{
		location.reload();
		});
	}

	
function produto_incluir()
	{
	$("#recebe_cad_produto").empty();
	$("#recebe_cad_produto").append("<div class='col-md-3'>"+
										"<br>"+
										"<div class='input-group'>"+
										  "<div class='input-group-addon'>Nome</div>"+
										  "<input type='text' class='form-control' id='produto_nome'>"+
										"</div>"+
										"<br>"+
									"</div>"+
									"<div class='col-md-3'>"+
										"<br>"+
										"<div class='input-group'>"+
										  "<div class='input-group-addon'>Descrição</div>"+
										  "<input type='text' class='form-control' id='produto_descricao'>"+
										"</div>"+
										"<br>"+
									"</div>"+
									"<div class='col-md-3'>"+
										"<br>"+
										"<div class='input-group'>"+
										  "<div class='input-group-addon'>Preço</div>"+
										  "<input type='text' class='form-control' id='produto_preco'>"+
										"</div>"+
										"<br>"+
									"</div>"+
									"<div class='col-md-3'>"+
										"<br>"+
										"<input type='button' class='form-control btn btn-primary' value='Confirmar' onclick='produto_incluir_salvar()'>"+
										"<br>"+
									"</div>");
	}
function produto_incluir_salvar()
	{
	var produto_nome = $("#produto_nome").val();
	var produto_descricao = $("#produto_descricao").val();
	var produto_preco = $("#produto_preco").val();
	
	$.ajax({
			type: 'POST',
			url: 'backend/produto_incluir.php',
			data: {	produto_nome: produto_nome,
					produto_descricao: produto_descricao,
					produto_preco: produto_preco},
			async: true
			})
	.done(function(dados)
		{
		location.reload();
		});
	}
function produto_excluir(produto_id)
	{
	$.ajax({
			type: 'POST',
			url: 'backend/produto_excluir.php',
			data: {	produto_id: produto_id},
			async: true
			})
	.done(function(dados)
		{
		location.reload();
		});
	}	
	
	
function cliente_incluir()
	{
	$("#recebe_cad_cliente").empty();
	$("#recebe_cad_cliente").append("<div class='col-md-3'>"+
										"<br>"+
										"<div class='input-group'>"+
										  "<div class='input-group-addon'>Nome</div>"+
										  "<input type='text' class='form-control' id='cliente_nome'>"+
										"</div>"+
										"<br>"+
									"</div>"+
									"<div class='col-md-3'>"+
										"<br>"+
										"<div class='input-group'>"+
										  "<div class='input-group-addon'>E-mail</div>"+
										  "<input type='text' class='form-control' id='cliente_email'>"+
										"</div>"+
										"<br>"+
									"</div>"+
									"<div class='col-md-3'>"+
										"<br>"+
										"<div class='input-group'>"+
										  "<div class='input-group-addon'>Telefone</div>"+
										  "<input type='text' class='form-control' id='cliente_telefone'>"+
										"</div>"+
										"<br>"+
									"</div>"+
									"<div class='col-md-3'>"+
										"<br>"+
										"<input type='button' class='form-control btn btn-primary' value='Confirmar' onclick='cliente_incluir_salvar()'>"+
										"<br>"+
									"</div>");
	}
function cliente_incluir_salvar()
	{
	var cliente_nome = $("#cliente_nome").val();
	var cliente_email = $("#cliente_email").val();
	var cliente_telefone = $("#cliente_telefone").val();
	
	$.ajax({
			type: 'POST',
			url: 'backend/cliente_incluir.php',
			data: {	cliente_nome: cliente_nome,
					cliente_email: cliente_email,
					cliente_telefone: cliente_telefone},
			async: true
			})
	.done(function(dados)
		{
		location.reload();
		});
	}
function cliente_excluir(cliente_id)
	{
	$.ajax({
			type: 'POST',
			url: 'backend/cliente_excluir.php',
			data: {	cliente_id: cliente_id},
			async: true
			})
	.done(function(dados)
		{
		location.reload();
		});
	}
	
</script>	
</body>
</html>