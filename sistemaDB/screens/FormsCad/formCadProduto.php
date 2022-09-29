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
					<h1>Cadastro de Produto</h1>
					<form action="#" method="POST">
						<div id='form-cad'>
							<div class='form-group'>
								<label>Nome: </label>
								<input type="text" id="nomeProduto" name="nomeProduto" maxlength="50" required>
							</div>
							<div class='form-group'>
								<label>Preço: </label>
								<input type="text" id="preco" name="preco" step="0.01" maxlength='11' required>
							</div>
							<div class='form-group'>
								<label>Qt. Estoque: </label>
								<input type="number" id="qtEstoque" name="qtEstoque" maxlength='9' required>
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
	$nome = $_POST['nomeProduto'];
	$preco = $_POST['preco'];
	$qtEstoque = $_POST['qtEstoque'];

	include_once('../../conexao.php');

	try {

		$stmt = $conn->prepare("INSERT INTO produto (nome, vlPreco, qtEstoque) VALUES (:nome, :preco, :qtEstoque)");

		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':preco', $preco);
		$stmt->bindParam(':qtEstoque', $qtEstoque);

		$stmt->execute();

		echo "<script>alert('Cadastrado com Sucesso');</script>";
	} catch (PDOException $e) {
		echo "Erro ao cadastrar: " . $e->getMessage();
	}
	$conn = null;
}
?>