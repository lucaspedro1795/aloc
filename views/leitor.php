<?php include 'head.php' ?>

<body>
    <div id="all">
        <?php include 'menu_adm.php' ?>
        <div class="main">
            <div class="cartLeitor">
                <h1><i class="fa-solid fa-qrcode"></i> Leitor</h1>
                <div class="qr-container">
                    <video id="video"></video>
                </div>
                <div>
                    <button class="buttons-active" id="btnAtivarCamera"><i class="fa-solid fa-camera"></i> Ativar Câmera</button>
                    <button class="buttons-stop" id="btnPararCamera"><i class="fa-solid fa-stop"></i> Parar Câmera</button>
                    <!-- <button class="buttons" id="testeModal"><i class="fa-solid fa-stop"></i> Parar Câmera</button> -->
                </div>
            </div>
            <script>
               
            </script>
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
<?php include '../controller/ConsultaQRController.php'; ?>
<?php include '../controller/ConsultaUsuariosCadastradosController.php'; ?>