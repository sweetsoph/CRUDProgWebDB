<?php

include_once('../../../conexao.php');



$cod = $_POST['codigo'];
$nome = $_POST['nome'];
$loginUsuario = $_POST['login'];
$email = $_POST['email'];
$senha = $_POST['senha'];

try {

    $stmt = $conn->prepare("UPDATE usuario SET nome = :nome,
                                                    loginUsuario = :loginUsuario,
                                                    email = :email,
                                                    senha = :senha WHERE codigo = :cod");

    $stmt->execute(array(
        ':cod' => $cod,
        ':nome' => $nome,
        ':loginUsuario' => $loginUsuario,
        ':email' => $email,
        ':senha' => $senha
    ));

    header("refresh:0;url=consultaUsuario.php");

    echo "<script>alert('USUARIO ALTERADO COM SUCESSO');</script>";
} catch (PDOException $e) {

    echo 'Error: ' . $e->getMessage();
}
