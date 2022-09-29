<!doctype html>
<html lang=''>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">

	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
	<link href="../../../assets/styles/style.css" rel="stylesheet" />
	<link href="../../../assets/styles/excluir.css" rel="stylesheet" />

	<title>Excluir Usuário</title>

	<script src='../../buscaCep.js'></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>

<body>
	<header>
		<section id='logo'>
			<a href='../../menu.php'>
				<div><img src="../../../assets/images/sophia-verardo.png" width="60"></div>
				<div>SophDev</div>
			</a>
		</section>
		<nav>
			<li id='cadastro'><a>Cadastro</a>
				<ul>
					<li><a href='../../FormsCad/formCadCliente.php'>Clientes</a></li>
					<li><a href='../../FormsCad/formCadFuncionario.php'>Funcionários</a></li>
					<li><a href='../../FormsCad/formCadFornecedor.php'>Fornecedores</a></li>
					<li><a href='../../FormsCad/formCadProduto.php'>Produtos</a></li>
					<li><a href='../../FormsCad/formCadUsuario.php'>Usuários</a></li>
				</ul>
			</li>
			<li id='consulta'><a>Consulta</a>
				<ul>
					<li><a href='../../DataConsult/Cliente/consultaCliente.php'>Clientes</a></li>
					<li><a href='../../DataConsult/Funcionario/consultaFuncionario.php'>Funcionários</a></li>
					<li><a href='../../DataConsult/Fornecedor/consultaFornecedor.php'>Fornecedores</a></li>
					<li><a href='../../DataConsult/Produto/consultaProduto.php'>Produtos</a></li>
					<li><a href='../../DataConsult/Usuario/consultaUsuario.php'>Usuários</a></li>
				</ul>
			</li>
			<li><a href='login.php'>Sair</a></li>
		</nav>
	</header>
	<main>
		<section class="user-content">
			<?php

			echo "<h1>Excluir Usuário</h1>";

			$cod = $_GET['id'];

			include_once('../../../conexao.php');

			$select = $conn->prepare("SELECT * FROM usuario where codigo=$cod");
			$select->execute();

			while ($row = $select->fetch()) {
				echo "<p>";
				echo "<br><b>Codigo: </b>" . $row['codigo'];
				echo "<br><b>Nome: </b>" . $row['nome'];
				echo "<br><b>Login: </b>" . $row['loginUsuario'];
				echo "<br><b>E-mail: </b>" . $row['email'];
				echo "<br><b>Senha: </b>" . $row['senha'];
				echo "</p>";
			?>
				<div>
					<button id="btnExcluir" onclick="window.location.href='confirmaExcluirUsuario.php?id=<?php echo $row['codigo']; ?>'">
						Excluir
					</button>
					<button id="btnVoltar" onclick="window.location.href='../../DataConsult/Usuario/consultaUsuario.php'">Voltar</button>
				</div>
			<?php
			}
			?>
		</section>
	</main>
</body>
<html>