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

	<title>Cadastro de Cliente</title>

	<script src='../../buscaCep.js'></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>

<body>
	<header>
		<section id='logo'>
			<a href='menu.php'>
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
					<h1>Cadastro de Cliente</h1>
					<form action="#" method="POST">
						<div id='form-cad'>
							<div class='form-group'>
								<label>Nome: </label>
								<input type="text" id="nomeCliente" name="nomeCliente" maxlength="50" required>
							</div>
							<div class='form-group'>
								<label>CPF: </label>
								<input type="text" id="cpfCliente" name="cpfCliente" onkeypress="$(this).mask('000.000.000-00')" maxlength='11' required>
							</div>
							<div class='form-group'>
								<label>RG: </label>
								<input type="text" id="rgCliente" name="rgCliente" onkeypress="$(this).mask('00.000.000-0')" maxlength='9' required>
							</div>
							<div class='form-group'>
								<label>CEP: </label>
								<input type="text" id="cep" name="cepCliente" onblur="pesquisacep(this.value);" onkeypress="$(this).mask('#####-###')" maxlength="
                            9" required>
							</div>
							<div class='form-group'>
								<label>Rua: </label>
								<input type="text" id="rua" name="ruaCliente" required>
							</div>
							<div class='form-group'>
								<label>Bairro: </label>
								<input type="text" id="bairro" name="bairroCliente" required>
							</div>
							<div class='form-group'>
								<label>Cidade: </label>
								<input type="text" id="cidade" name="cidadeCliente" required>
							</div>
							<div class='form-group'>
								<label>Estado: </label>
								<input type="text" id="uf" name="ufCliente" required>
							</div>
							<div class='form-group'>
								<label>Nº: </label>
								<input type="text" id="numCliente" name="numCliente" onkeypress="$(this).mask('#')" pattern="[0-9]+$" maxlength="10" required>
							</div>
							<div class='form-group'>
								<label>Celular: </label>
								<input type="text" id="celularCliente" name="celularCliente" onkeypress="$(this).mask('(00) 90000-0000')" maxlength="11" required>
							</div>
							<div class='form-group'>
								<label>Email: </label>
								<input type="text" id="emailCliente" name="emailCliente" maxlength="40" required>
							</div>
						</div>
						<div class="group-buttons">
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
	$nome = $_POST['nomeCliente'];
	$cpf = $_POST['cpfCliente'];
	$rg = $_POST['rgCliente'];
	$cep = $_POST['cepCliente'];
	$num = $_POST['numCliente'];
	$celular = $_POST['celularCliente'];
	$email = $_POST['emailCliente'];

	include_once('../../conexao.php');

	try {

		$stmt = $conn->prepare("INSERT INTO cliente (nome, cpf, rg, cep, numero, celular, email)
	  	                      VALUES (:nome, :cpf, :rg, :cep, :numero, :celular, :email)");

		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':cpf', $cpf);
		$stmt->bindParam(':rg', $rg);
		$stmt->bindParam(':cep', $cep);
		$stmt->bindParam(':numero', $num);
		$stmt->bindParam(':celular', $celular);
		$stmt->bindParam(':email', $email);

		$stmt->execute();

		echo "<script>alert('Cadastrado com Sucesso');</script>";
	} catch (PDOException $e) {
		echo "Erro ao cadastrar: " . $e->getMessage();
	}
	$conn = null;
}
?>