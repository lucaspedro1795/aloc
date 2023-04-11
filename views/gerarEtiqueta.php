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

                </div>
                <button class="buttons" id="imprimir">Imprimir</button>
            </div>
        </div>
    </div>
</body>


    <!--Script do Remodal-->
    <script src="../remodal/dist/remodal.min.js"></script>
    
    <script src="../js/print.min.js"></script>
    <script>
    $('#imprimir').click(function() {
        var etiqueta = document.querySelector('#etiquetas');
        PrintJS({printable: etiqueta, type: 'html'});
    });
</script>
</body>

</html>

<!-- <?php include '../controller/GerarEtiquetaController.php'; ?> -->
<?php include '../controller/CadastroUsuarioController.php'; ?>
<?php include '../controller/CadastroItemController.php'; ?>