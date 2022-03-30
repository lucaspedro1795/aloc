<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aloc</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
</head>

<body>
    <div class="principal">
        <div class="form-login">
            <h1 class="logo">Aloc</h1>
            <h3 class="title">Alterar Senha</h3>
            <form action="../controller/senha.php" method="post">
                <input type="text" name="usuario" id="usuario" placeholder="Digite seu usuário" required>
                <input type="password" name="senha" id="senha" placeholder="Digite a nova senha" required>
                <input id="acess" type="submit" value="Alterar senha">
            </form>
            <a class="title" href="../index.php"><i class="bi bi-arrow-left"></i> Voltar</a>
        </div>
    </div>
</body>

</html>