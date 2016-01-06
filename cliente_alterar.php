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
			<h3>Alteração de Cliente</h3>
			<br>
			<br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php
			$cliente_id = $_GET['id'];
				
			include ("conectaDB.inc");
			
			$buscasql_visualiza_clientes = mysqli_query($conectaBanco, "select * from cliente WHERE cliente_id = '".$cliente_id."' ");
			
			while($resultadosql_visualiza_clientes = mysqli_fetch_array($buscasql_visualiza_clientes))
				{				
				$cliente_id = $resultadosql_visualiza_clientes["cliente_id"];
				$cliente_nome = $resultadosql_visualiza_clientes["cliente_nome"];
				$cliente_email = $resultadosql_visualiza_clientes["cliente_email"];
				$cliente_telefone = $resultadosql_visualiza_clientes["cliente_telefone"];
					
				echo "<div class='col-md-3'>";
					echo "<br>";
					echo "<div class='input-group'>";
					echo "<div class='input-group-addon'>Nome</div>";
					echo "<input type='text' class='form-control' id='cliente_nome' value='".$cliente_nome."'>";
					echo "</div>";
					echo "<br>";
				echo "</div>";
				echo "<div class='col-md-3'>";
					echo "<br>";
					echo "<div class='input-group'>";
					echo "<div class='input-group-addon'>E-mail</div>";
					echo "<input type='text' class='form-control' id='cliente_email' value='".$cliente_email."'>";
					echo "</div>";
					echo "<br>";
				echo "</div>";
				echo "<div class='col-md-3'>";
					echo "<br>";
					echo "<div class='input-group'>";
					echo "<div class='input-group-addon'>Telefone</div>";
					echo "<input type='text' class='form-control' id='cliente_telefone' value='".$cliente_telefone."'>";
					echo "</div>";
					echo "<br>";
				echo "</div>";
				echo "<div class='col-md-3'>";
					echo "<br>";
					echo "<input type='button' class='form-control btn btn-primary' value='Confirmar' onclick='cliente_alterar_salvar()'>";
					echo "<br>";
				echo "</div>";
				}
			?>
		</div>
	</div>
</div>
<script>

function cliente_alterar_salvar()
	{
	var cliente_nome = $("#cliente_nome").val();
	var cliente_email = $("#cliente_email").val();
	var cliente_telefone = $("#cliente_telefone").val();
	
	$.ajax({
			type: 'POST',
			url: 'backend/cliente_alterar.php',
			data: {	cliente_id: <?php echo $cliente_id; ?>,
					cliente_nome: cliente_nome,
					cliente_email: cliente_email,
					cliente_telefone: cliente_telefone},
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