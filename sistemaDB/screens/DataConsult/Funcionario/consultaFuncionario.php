<!doctype html>
<html lang=''>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">

	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
	<link href="../../../assets/styles/style.css" rel="stylesheet" />
	<link href="../../../assets/styles/consulta.css" rel="stylesheet" />

	<title>Consulta Funcionario</title>

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
					<li><a href='../Cliente/consultaCliente.php'>Clientes</a></li>
					<li><a href='consultaFuncionario.php'>Funcionários</a></li>
					<li><a href='../Fornecedor/consultaFornecedor.php'>Fornecedores</a></li>
					<li><a href='../Produto/consultaProduto.php'>Produtos</a></li>
					<li><a href='../Usuario/consultaUsuario.php'>Usuários</a></li>
				</ul>
			</li>
			<li><a href='login.php'>Sair</a></li>
		</nav>
	</header>
	<main>
		<section class='container-consulta'>
			<?php

			include_once('../../../conexao.php');
			try {
				$select = $conn->prepare('SELECT * FROM funcionario');
				$select->execute();
				while ($row = $select->fetch()) {
					echo "<div class='group-consulta'>";
					echo "<label>Codigo: " . $row['codigo'] . "</label>";
					echo "<label>Nome: " . $row['nome'] . "</label>";
					echo "<label>CPF: " . $row['cpf'] . "</label>";
					echo "<label>RG: " . $row['rg'] . "</label>";
					echo "<label>Dt. Admissão: " . $row['dtAdmissao'] . "</label>";
					echo "<label>Salário: " . $row['vlSalario'] . "</label>";
					echo "<label>CEP: " . $row['cep'] . "</label>";
					echo "<label>Numero: " . $row['numero'] . "</label>";
					echo "<label>Celular: " . $row['celular'] . "</label>";
					echo "<label>Email: " . $row['email'] . "</label>";
			?>
					<button onclick="window.location.href='alterarFuncionario.php?id=<?php echo $row['codigo']; ?>'">
						Alterar
					</button>

					<button onclick="window.location.href='../../DataExclude/Funcionario/excluirFuncionario.php?id=<?php echo $row['codigo']; ?>'">
						Excluir
					</button>
					</div>
			<?php
				}
			} catch (PDOException $e) {
				echo 'ERROR: ' . $e->getMessage();
			}
			?>
		</section>
	</main>
</body>
<html>