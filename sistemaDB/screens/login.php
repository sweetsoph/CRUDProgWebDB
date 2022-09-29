<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="../assets/styles/style.css" rel="stylesheet" />
    <link href="../assets/styles/login.css" rel="stylesheet" />

    <title>Login</title>

    <script src='../buscaCep.js'></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>

<body>
    <main></main>
    <section>
        <form action="menu.php" method="POST">
            <div>
                <h1>Seja bem-vindo(a) ao meu sistema comercial CRUD!</h1>
                <p>Aqui é a área de login, você deve entrar com a conta de Admin (o e-mail e a senha são super secretos e nada previsíveis).</p>
            </div>
            <article>
                <div class="form-group">
                    <label>Usuário</label>
                    <input type="text" name="usuario" placeholder="Usuário" required>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>
            </article>
            <button type="submit">Entrar</button>
        </form>
    </section>
</body>

</html>
<?php
if (!empty($_POST)) {
    $email = $_POST['usuario'];
    $senha = $_POST['senha'];

    if (($email == "Admin") && ($senha == "Admin")) {
        header('Location:menu.php');
    } else if (($email == "sophia") && ($senha == "sophia123")) {
        header('Location:menu.php');
    } else {
        echo "<script>alert('Email ou senha incorreto');</script>";
    }
}
?>