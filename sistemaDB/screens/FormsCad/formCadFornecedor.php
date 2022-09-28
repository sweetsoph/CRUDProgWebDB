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

	<title>Cadastro de Fornecedor</title>

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
					<h1>Cadastro de Fornecedor</h1>
					<form action="#" method="POST">
						<div id='form-cad'>
							<div class='form-group'>
								<label>Nome Empresa: </label>
								<input type="text" id="nomeEmpresa" name="nomeEmpresa" maxlength="50" required>
							</div>
                            <div class='form-group'>
								<label>Nome Contato: </label>
								<input type="text" id="nomeContato" name="nomeContato" maxlength="50" required>
							</div>
                            <div class='form-group'>
								<label>Produto: </label>
								<input type="text" id="produto" name="produto" maxlength="50" required>
							</div>
							<div class='form-group'>
								<label>CNPJ: </label>
								<input type="text" id="cnpjFornecedor" name="cnpjFornecedor" onkeypress="$(this).mask('00.000.000/0000-00')" maxlength='11' required>
							</div>
                            <div class='form-group'>
								<label>Insc. Estadual: </label>
								<input type="text" id="ieFornecedor" name="ieFornecedor" required>
							</div>
							<div class='form-group'>
								<label>CEP: </label>
								<input type="text" id="cep" name="cepFornecedor" onblur="pesquisacep(this.value);" onkeypress="$(this).mask('#####-###')" maxlength="
                            9" required>
							</div>
							<div class='form-group'>
								<label>Rua: </label>
								<input type="text" id="rua" name="ruaFornecedor" required>
							</div>
							<div class='form-group'>
								<label>Bairro: </label>
								<input type="text" id="bairro" name="bairroFornecedor" required>
							</div>
							<div class='form-group'>
								<label>Cidade: </label>
								<input type="text" id="cidade" name="cidadeFornecedor" required>
							</div>
							<div class='form-group'>
								<label>Estado: </label>
								<input type="text" id="uf" name="ufFornecedor" required>
							</div>
							<div class='form-group'>
								<label>Nº: </label>
								<input type="text" id="numFornecedor" name="numFornecedor" onkeypress="$(this).mask('#')" pattern="[0-9]+$" maxlength="10" required>
							</div>
							<div class='form-group'>
								<label>Celular: </label>
								<input type="text" id="celularFornecedor" name="celularFornecedor" onkeypress="$(this).mask('(00) 90000-0000')" maxlength="11" required>
							</div>
							<div class='form-group'>
								<label>Email: </label>
								<input type="text" id="emailFornecedor" name="emailFornecedor" maxlength="40" required>
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
	$nmEmpresa = $_POST['nomeEmpresa'];
    $nmContato = $_POST['nomeContato'];
    $produto = $_POST['produto'];
	$cnpj = $_POST['cnpjFornecedor'];
    $ie = $_POST['ieFornecedor'];
	$cep = $_POST['cepFornecedor'];
	$num = $_POST['numFornecedor'];
	$celular = $_POST['celularFornecedor'];
	$email = $_POST['emailFornecedor'];

	include_once('../../conexao.php');

	try {

		$stmt = $conn->prepare("INSERT INTO fornecedor (nmEmpresa, nmContato, produto, cnpj, ie, cep, numero, celular, email)
                              VALUES (:nmEmpresa, :nmContato, :produto, :cnpj, :ie, :cep, :numero, :celular, :email)");

		$stmt->bindParam(':nmEmpresa', $nmEmpresa);
        $stmt->bindParam(':nmContato', $nmContato);
        $stmt->bindParam(':produto', $produto);
        $stmt->bindParam(':cnpj', $cnpj);
        $stmt->bindParam(':ie', $ie);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':num', $num);
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