<?php
	
//Efetua a conexão com o banco de dados

	$host = $_POST['host'];
	$user= $_POST['usuario'];
	$pass = $_POST['senha'];
	$banco = $_POST['nomedobanco'];
	
	$conectaBanco = mysqli_connect ($host, $user, $pass) or die (mysql_error());
	$selecionaBanco = mysqli_select_db ($conectaBanco, $banco) or die (mysql_error());
	
							
//Cria as tabelas e cadastra os eventos

	$criaTabelaProduto = mysqli_query ($conectaBanco, "CREATE TABLE produto ( produto_id BIGINT,
																			  produto_nome VARCHAR(100) not null,
																			  produto_descricao VARCHAR(500) not null,
																			  produto_preco DECIMAL(10,2)  not null,
																			
																			  PRIMARY KEY(produto_id));") or die (mysql_error());
							
	$insereProduto = mysqli_query ($conectaBanco, "INSERT INTO produto (	produto_id, 
																		produto_nome, 
																		produto_descricao,
																		produto_preco)
															VALUES	(	'1', 
																		'Exemplo de produto 1', 
																		'Descrição do primeiro produto',
																		'59.99')") or die (mysql_error());
																
	$insereProduto = mysqli_query ($conectaBanco, "INSERT INTO produto (produto_id, 
																		produto_nome, 
																		produto_descricao,
																		produto_preco)
															VALUES	(	'2', 
																		'Exemplo de produto 2', 
																		'Descrição do segundo produto',
																		'15.50')") or die (mysql_error());

																
										

	$criaTabelaCliente = mysqli_query ($conectaBanco, "CREATE TABLE cliente ( cliente_id BIGINT,
																			  cliente_nome VARCHAR(100) not null,
																			  cliente_email VARCHAR(50) not null,
																			  cliente_telefone BIGINT not null,
																			
																			  PRIMARY KEY(cliente_id));") or die (mysql_error());
							
	$insereCliente = mysqli_query ($conectaBanco, "INSERT INTO cliente (cliente_id, 
																		cliente_nome, 
																		cliente_email,
																		cliente_telefone)
															VALUES	(	'1', 
																		'João pereira', 
																		'joao@teste.com',
																		'11999997777')") or die (mysql_error());
														
	$insereCliente = mysqli_query ($conectaBanco, "INSERT INTO cliente (cliente_id, 
																		cliente_nome, 
																		cliente_email,
																		cliente_telefone)
															VALUES	(	'2', 
																		'Antonio Carlos', 
																		'antonio@teste.com',
																		'11999996666')") or die (mysql_error());
														
														
														
														
	$criaTabelaPedido = mysqli_query ($conectaBanco, "CREATE TABLE pedido ( pedido_id BIGINT,
																			produto_id BIGINT,
																			qtde_produto BIGINT,
																			cliente_id BIGINT,
																			
																			PRIMARY KEY(pedido_id));") or die (mysql_error());
							
	$inserePedido = mysqli_query ($conectaBanco, "INSERT INTO pedido (pedido_id, 
																	  produto_id,
																	  qtde_produto,
																	  cliente_id)
															VALUES	( '1', 
																	  '1',
																	  '55',
																	  '2')") or die (mysql_error());
														
	$inserePedido = mysqli_query ($conectaBanco, "INSERT INTO pedido (pedido_id, 
																	  produto_id, 
																	  qtde_produto,
																	  cliente_id)
															VALUES	( '2', 
																	  '2',
																	  '17',
																	  '1')") or die (mysql_error());
												
															
															
//Cria arquivo de conexão

	$arquivo = fopen('conectaDB.inc', 'w+');
		if ($arquivo==false) 
			{die ("Erro ao criar o arquivo!");}
			
	$arquivo = fopen('conectaDB.inc', 'a+');
	
	if ($arquivo)
		{
		$host = "'".$host."'";
		$user = "'".$user."'";
		$pass = "'".$pass."'";
		$banco = "'".$banco."'";
		
		
		$conteudoArquivo = '<?php
							$conectaBanco = mysqli_connect ('.$host.', '.$user.', '.$pass.') or die (mysql_error());
							$selecionaBanco = mysqli_select_db ($conectaBanco, '.$banco.') or die (mysql_error());
							
							date_default_timezone_set("Brazil/East");
							?>';
		
		rewind($arquivo);
		
		if(!fwrite($arquivo, $conteudoArquivo)) die ('Erro ao criar');
		fclose($arquivo);		
		}
	
//Redireciona para a página principal

	header("Location: index.php?a=first");
	?>