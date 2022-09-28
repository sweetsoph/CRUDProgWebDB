<?php

include_once('../../../conexao.php');



$cod = $_POST['codigo']; 
$nome = $_POST['nomeCliente'];
$cpf = $_POST['cpfCliente'];
$rg = $_POST['rgCliente'];
$cep = $_POST['cepCliente'];
$num = $_POST['numCliente'];
$email = $_POST['emailCliente'];
$cel = $_POST['celularCliente'];

	try 
	{

		$stmt = $conn->prepare("UPDATE cliente SET nome = :nome,
													  cpf = :cpf,
													  rg = :rg,
													  cep = :cep,
													  numero = :num,
                                                      email = :email,
													  celular = :cel WHERE codigo = :cod");

		$stmt->execute(array(':cod' => $cod, 
							 ':nome' => $nome,
							 ':cpf' => $cpf,
							 ':rg' => $rg,
							 ':cep' => $cep,
							 ':num' => $num,
                             ':email' => $email,
                             ':cel' => $cel));
		
		header( "refresh:0;url=consultaCliente.php" );

		echo "<script>alert('CLIENTE ALTERADO COM SUCESSO');</script>";


	} 

	catch(PDOException $e) 

	{

		echo 'Error: ' . $e->getMessage();

	}
