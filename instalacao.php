<html>
<head>
	<?php	include ("includes/head.inc");	?>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form action="instalacao_backend.php" method="POST">
				<br>
				<h3>Instalação do banco de dados</h3>
				<br>
				<br>
				<div class="input-group">
				  <div class="input-group-addon">Host</div>
				  <input type="text" class="form-control" name="host">
				</div>
				<br>
				<div class="input-group">
				  <div class="input-group-addon">Usuário</div>
				  <input type="text" class="form-control" name="usuario">
				</div>
				<br>
				<div class="input-group">
				  <div class="input-group-addon">Senha</div>
				  <input type="password" class="form-control" name="senha">
				</div>
				<br>
				<div class="input-group">
				  <div class="input-group-addon">Nome do banco</div>
				  <input type="text" class="form-control" name="nomedobanco">
				</div>
				<br>			
				<input type="submit" class="form-control btn btn-primary" value="Instalar banco">
			</form>
		</div>
	</div>
</div>
</body>
</html>