<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">

	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
	<link href="../../assets/styles/style.css" rel="stylesheet" />
	<link href="../../assets/styles/forms.css" rel="stylesheet" />

	<title>Cadastro de Produto</title>

	<script src='../../buscaCep.js'></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>

<body>
	<header>
		<section id='logo'>
			<a href='../menu.php'>
				<div><img src="../../assets/images/sophia-verardo.png" width="60"></div>
				<div>SophDev</div>
			</a>
		</section>
		<nav>
			<li id='cadastro'><a>Cadastro</a>
				<ul>
					<li><a href='formCadCliente.php'>Clientes</a></li>
					<li><a href='formCadFuncionario.php'>Funcionários</a></li>
					<li><a href='formCadFornecedor.php'>Fornecedores</a></li>
					<li><a href='formCadProduto.php'>Produtos</a></li>
					<li><a href='formCadUsuario.php'>Usuários</a></li>
				</ul>
			</li>
			<li id='consulta'><a>Consulta</a>
				<ul>
					<li><a href='../DataConsult/Cliente/consultaCliente.php'>Clientes</a></li>
					<li><a href='../DataConsult/Funcionario/consultaFuncionario.php'>Funcionários</a></li>
					<li><a href='../DataConsult/Fornecedor/consultaFornecedor.php'>Fornecedores</a></li>
					<li><a href='../DataConsult/Produto/consultaProduto.php'>Produtos</a></li>
					<li><a href='../DataConsult/Usuario/consultaUsuario.php'>Usuários</a></li>
				</ul>
			</li>
			<li><a href='login.php'>Sair</a></li>
		</nav>
	</header>
	<div id="container-main">
		<main>
			<section id='form'>
				<article>
					<img src="../../assets/images/formCadImage.jpg">
				</article>
				<article id='form-container'>
					<h1>Cadastro de Usuário</h1>
					<form action="#" method="POST">
						<div id='form-cad'>
							<div class='form-group'>
								<label>Nome Completo: </label>
								<input type="text" id="nome" name="nome" maxlength="50" required>
							</div>
							<div class='form-group'>
								<label>Login: </label>
								<input type="text" id="login" name="login" required>
							</div>
							<div class='form-group'>
								<label>E-mail: </label>
								<input type="text" id="email" name="email" required>
							</div>
							<div class='form-group'>
								<label>Senha: </label>
								<input type="password" id="senha" name="senha" minlength="8" maxlength='12' required>
							</div>
						</div>
						<div>
							<input type="submit" name="Cadastrar" class="form-button btnEnviar">
							<input type="reset" name="Limpar" class="form-button btnRedefinir">
						</div>
					</form>
				</article>
			</section>
		</main>
	</div>
</body>

</html>


<?php

if (!empty($_POST)) {
	$nome = $_POST['nome'];
    $loginUsuario = $_POST['login'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

	include_once('../../conexao.php');

	try {

		$stmt = $conn->prepare("INSERT INTO usuario (nome, loginUsuario, email, senha) VALUES (:nome, :loginUsuario, :email, :senha)");

		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':loginUsuario', $loginUsuario);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':senha', $senha);

		$stmt->execute();

		echo "<script>alert('Cadastrado com Sucesso');</script>";
	} catch (PDOException $e) {
		echo "Erro ao cadastrar: " . $e->getMessage();
	}
	$conn = null;
}
?>