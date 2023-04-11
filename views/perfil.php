<?php

session_start();

require_once '../models/conexao.php';

?>
<?php include_once 'head.php'; ?>

<?php
include_once "components/modais.php";
?>

<body>
    <div id="all">
        <?php include_once 'menu_adm.php'; ?>
        <div class="main">
            <div class="cart">
                <h1 class="dif"><i class="bi bi-person-circle"></i> <?php echo $_SESSION['user_name']; ?></h1>
                <div class="fw-bold">
                    <p>Usuário: <?php echo $_SESSION['usuario']; ?></p>
                    <p><input type="hidden" name="id" value="<?php echo $_SESSION['idUsuario']; ?>"></p>
                    <p>CPF: <?php echo $_SESSION['cpf']; ?></p>
                    <p>Função: <?php echo $_SESSION['funcao']; ?></p>
                    <p>Setor: <?php echo $_SESSION['setor']; ?></p>
                    <hr>
                    <button class="buttons">Redefinir senha</button>
                    <button class="buttons">Editar perfil</button>
                </div>
            </div>
        </div>
    </div>
    </div>



    <script src="../jquery/jquery.js"></script>
    <script src="../jquery/jquery.mask.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/popper.js"></script>

    <!--Script do Remodal-->
    <script src="../remodal/dist/remodal.min.js"></script>


    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js" defer></script>

</body>


</html>

<?php include '../controller/CadastroUsuarioController.php'; ?>
<?php include '../controller/CadastroItemController.php'; ?>
