<?php

include_once('../../../conexao.php');



$cod = $_POST['codigo']; 
$nome = $_POST['nome'];
$vlPreco = $_POST['vlPreco'];
$qtEstoque = $_POST['qtEstoque'];

	try 
	{

		$stmt = $conn->prepare("UPDATE produto SET nome = :nome,
													  vlPreco = :vlPreco,
													  qtEstoque = :qtEstoque WHERE codigo = :cod");

		$stmt->execute(array(':cod' => $cod,
                             ':nome' => $nome,
                             ':vlPreco' => $vlPreco,
                             ':qtEstoque' => $qtEstoque));
		
		header( "refresh:0;url=consultaProduto.php" );

		echo "<script>alert('PRODUTO ALTERADO COM SUCESSO');</script>";


	} 

	catch(PDOException $e) 

	{

		echo 'Error: ' . $e->getMessage();

	}
