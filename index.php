<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aloc</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>

<body>
    <div class="principal">
        <div class="form-login">
            <h1 class="logo">Aloc</h1>
            <form action="controller/ConsultaLoginAdm.php" method="post">
                <input type="text" name="user" id="user" placeholder="Usuário" required>
                <input type="password" name="pass" id="pass" placeholder="Senha" required>
                <input id="acess" type="submit" value="Entrar">
            </form>
            <?php
            if (isset($_GET['msg_erro'])) {
                $mensagem = $_GET['msg_erro'];
                echo  "<h3 class='msg-erro'>" . $mensagem . "<a href='#' id='close'><i class='bi bi-x-lg'></i></a> </h3>";
            }
            ?>
            <!-- <h4 class="title">Você é administrador? <a href="views/administrador/login.php">Acesse aqui</a></h4> -->
            <h4 class="title">Esqueceu sua senha? <a href="views/alterarSenha.php">Clique aqui para redefinir</a></h4>
        </div>
        <img class="img-login" src="https://img.freepik.com/fotos-gratis/ninguem-na-estacao-de-trabalho-do-call-center-vazio-com-computadores-e-instrumentos-de-audio-nao-ha-pessoas-nos-balcoes-de-atendimento-ao-cliente-com-tecnologia-de-telecomunicacoes-oferecendo-assistencia-de-linha-de-apoio_482257-44179.jpg" alt="tesste">
    </div>


    <script src="jquery/jquery.js"></script>
    <script>
        $(document).ready(function() {
            // Selecione a div que deseja fazer desaparecer
            var divSumir = $('.msg-erro');

            // Defina o tempo (em milissegundos) após o qual a div deve desaparecer
            var tempoDesaparecer = 2500;

            // Aguarde o tempo especificado e faça a div desaparecer usando fadeOut
            setTimeout(function() {
                divSumir.fadeOut('slow');
                var url = window.location.href;

                // Verifica se o parâmetro 'name' está presente na URL
                if (url.indexOf('?msg_erro=') > -1) {
                    // Remove o parâmetro 'name' da URL
                    var novaUrl = url.replace(/([?&])msg_erro=[^&]+(&|$)/, '$1').replace(/(&|\?)$/, '');

                    // Atualiza a URL da página sem o parâmetro 'name'
                    window.history.replaceState({}, document.title, novaUrl);
                }
            }, tempoDesaparecer);
        });

        $('#close').click(function() {
            $('.msg-erro').hide();
            // Obtém a URL atual
            var url = window.location.href;

            // Verifica se o parâmetro 'name' está presente na URL
            if (url.indexOf('?msg_erro=') > -1) {
                // Remove o parâmetro 'name' da URL
                var novaUrl = url.replace(/([?&])msg_erro=[^&]+(&|$)/, '$1').replace(/(&|\?)$/, '');

                // Atualiza a URL da página sem o parâmetro 'name'
                window.history.replaceState({}, document.title, novaUrl);
            }
        });
    </script>
</body>

</html>