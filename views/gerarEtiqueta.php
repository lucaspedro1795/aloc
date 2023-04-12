<?php

session_start();

?>
<?php include_once 'head.php'; ?>

<body>
    <div id="all">
        <?php include_once 'menu_adm.php'; ?>
        <div class="main">
            <div class="cart">
                <div class="etiqueta" id="etiquetas">
                    <div class="qrCode">
                        <img src="" alt="" id="qrCont">
                    </div>
                    <div>
                        <h5 id="nomeReg"></h5>
                        <span id="codigo"></span>
                    </div>
                </div>
                <button class="buttons" id="imprimir">Imprimir</button>
                <button class="buttons" id="voltar">Voltar</button>
            </div>
        </div>
    </div>
</body>


<!--Script do Remodal-->
<script src="../remodal/dist/remodal.min.js"></script>
<script>
    $('#voltar').click(function(){
        history.back();
    })
</script>
</body>

</html>

<?php include '../controller/GerarEtiquetaController.php' ?>
<?php include '../controller/CadastroUsuarioController.php'; ?>
<?php include '../controller/CadastroItemController.php'; ?>