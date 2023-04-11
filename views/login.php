<!DOCTYPE html>

<html lang="pt-BR">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aloc</title>

    <link rel="stylesheet" href="../../css/style.css">    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="shortcut icon" href="../../assets/images/favicon.png" type="image/x-icon">

</head>



<body>

    <div class="principal">

        <div class="form-login">

            <h1 class="logo">Aloc</h1>

            <h2 class="title-2">Administrador</h2>

            <form action="../../controller/ConsultaLoginAdm.php" method="post">

                <input type="text" name="user" id="user" placeholder="Usuário" required>

                <input type="password" name="pass" id="pass" placeholder="Senha" required>

                <input id="acess" type="submit" value="Entrar">

            </form>
            <?php
            if (isset($_GET['msg_erro'])) {
                $mensagem = $_GET['msg_erro'];
                echo  "<h4 class='msg-erro'>".$mensagem."</h4>";
            }
            ?>

            <h4 class="title"><a href="../../index.php"><i class="bi bi-arrow-left"></i> Voltar</a></h4>

            <h4 class="title">Esqueceu sua senha? <a href="alterarSenha.php">Clique aqui para redefinir</a></h4>

        </div>

    </div>

</body>



</html>