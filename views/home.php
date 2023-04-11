<?php

session_start();

?>
<?php include_once 'head.php'; ?>

<body>
    <div id="all">
        <?php include_once 'menu_adm.php'; ?>
        <div class="main">
            <h1 class="logo">Aloc</h1>
        </div>
    </div>
</body>


    <!--Script do Remodal-->
    <script src="../remodal/dist/remodal.min.js"></script>

</body>

</html>


<?php include '../controller/CadastroUsuarioController.php'; ?>
<?php include '../controller/CadastroItemController.php'; ?>