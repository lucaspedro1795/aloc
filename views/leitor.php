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
                </div>
            </div>
            <script>
                $('#btnAtivarCamera').click(function() {
                    // Seleciona o elemento de vídeo e o elemento de resultado
                    const video = document.getElementById('video');
                    const resultado = document.getElementById('resultado');

                    // Cria um objeto de scanner Instascan
                    const scanner = new Instascan.Scanner({
                        video
                    });

                    // Adiciona um ouvinte de eventos para quando o vídeo começar a ser reproduzido
                    video.addEventListener('playing', function() {
                        // Calcula a proporção do vídeo
                        const videoRatio = video.videoWidth / video.videoHeight;

                        // Calcula a proporção da div
                        const divRatio = video.parentNode.clientWidth / video.parentNode.clientHeight;

                        // Verifica qual proporção é maior
                        if (videoRatio > divRatio) {
                            // Ajusta a largura do vídeo para preencher a div
                            video.style.width = '300px';
                            video.style.height = 'auto';
                        } else {
                            // Ajusta a altura do vídeo para preencher a div
                            video.style.width = 'auto';
                            video.style.height = '100%';
                        }
                    });

                    // Adiciona um ouvinte de eventos para quando um código QR é lido
                    scanner.addListener('scan', function(conteudo) {
                        var inst = $('[data-remodal-id=alerta-qrcode]').remodal();
                        inst.open();
                        // Exibe o conteúdo do QR Code no elemento de resultado
                        resultado.innerText = conteudo;
                    });

                    // Inicializa o scanner
                    Instascan.Camera.getCameras().then(function(cameras) {
                        if (cameras.length > 0) {
                            scanner.start(cameras[0]);
                        } else {
                            console.error('Nenhuma câmera encontrada.');
                        }
                    }).catch(function(e) {
                        console.error(e);
                    });
                    $('#btnPararCamera').click(function() {
                        scanner.stop();
                    });
                });
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