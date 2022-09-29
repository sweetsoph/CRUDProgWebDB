<?php

include_once('../../../conexao.php');



$cod = $_POST['codigo'];
$nmEmpresa = $_POST['nomeEmpresa'];
$nmContato = $_POST['nomeContato'];
$produto = $_POST['produto'];
$cnpj = $_POST['cnpj'];
$ie = $_POST['ie'];
$cep = $_POST['cepCliente'];
$num = $_POST['numCliente'];
$email = $_POST['emailCliente'];
$cel = $_POST['celularCliente'];

try {

    $stmt = $conn->prepare("UPDATE fornecedor SET nmEmpresa = :nmEmpresa,
        nmContato = :nmContato,
        produto = :produto,
        cnpj = :cnpj,
        ie = :ie,
        cep = :cep,
        numero = :num,
        email = :email,
        celular = :cel WHERE codigo = :cod");

    $stmt->execute(array(
        ':cod' => $cod,
        ':nmEmpresa' => $nmEmpresa,
        ':nmContato' => $nmContato,
        ':produto' => $produto,
        ':cnpj' => $cnpj,
        ':ie' => $ie,
        ':cep' => $cep,
        ':num' => $num,
        ':email' => $email,
        ':cel' => $cel
    ));

    header("refresh:0;url=consultaFornecedor.php");

    echo "<script>alert('FORNECEDOR ALTERADO COM SUCESSO');</script>";
} catch (PDOException $e) {

    echo 'Error: ' . $e->getMessage();
}
