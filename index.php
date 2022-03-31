<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aloc</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
</head>

<body>
    <div class="principal">
        <div class="form-login">
            <h1 class="logo">Aloc</h1>
            <form action="controller/login.php" method="post">
                <input type="text" name="user" id="user" placeholder="Usuário" required>
                <input type="password" name="pass" id="pass" placeholder="Senha" required>
                <input id="acess" type="submit" value="Entrar">
            </form>
            <h4 class="title">Você é administrador? <a href="views/administrador/login.php">Acesse aqui</a></h4>
            <h4 class="title">Esqueceu sua senha? <a href="views/alterarSenha.php">Clique aqui para redefinir</a></h4>
        </div>
    </div>
</body>

</html>