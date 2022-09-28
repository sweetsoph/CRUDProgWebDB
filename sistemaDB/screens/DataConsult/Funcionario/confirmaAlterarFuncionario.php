<?php

include_once('../../../conexao.php');



$cod = $_POST['codigo'];
$nome = $_POST['nomeFuncionario'];
$cpf = $_POST['cpfFuncionario'];
$rg = $_POST['rgFuncionario'];
$dtAdmissao = $_POST['dtAdmissao'];
$salario = $_POST['salario'];
$cep = $_POST['cepFuncionario'];
$num = $_POST['numFuncionario'];
$email = $_POST['emailFuncionario'];
$cel = $_POST['celularFuncionario'];

try {

    $stmt = $conn->prepare("UPDATE funcionario SET nome = :nome,
													  cpf = :cpf,
													  rg = :rg,
                                                      dtAdmissao = :dtAdmissao,
                                                      vlSalario = :salario,
													  cep = :cep,
													  numero = :num,
                                                      email = :email,
													  celular = :cel WHERE codigo = :cod");

    $stmt->execute(array(
        ':cod' => $cod,
        ':nome' => $nome,
        ':cpf' => $cpf,
        ':rg' => $rg,
        ':dtAdmissao' => $dtAdmissao,
        ':salario' => $salario,
        ':cep' => $cep,
        ':num' => $num,
        ':email' => $email,
        ':cel' => $cel
    ));

    header("refresh:0;url=consultaFuncionario.php");

    echo "<script>alert('FUNCIONARIO ALTERADO COM SUCESSO');</script>";
} catch (PDOException $e) {

    echo 'Error: ' . $e->getMessage();
}
