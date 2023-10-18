<script type="text/javascript">
    $('#testeModal').click(function() {
        var inst = $('[data-remodal-id=alerta-qrcode]').remodal();
        inst.open();
    });

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
                video.style.width = '400px';
                video.style.height = 'auto';
            } else {
                // Ajusta a altura do vídeo para preencher a div
                video.style.width = 'auto';
                video.style.height = '100%';
            }
        });

        // Adiciona um ouvinte de eventos para quando um código QR é lido
        scanner.addListener('scan', function(conteudo) {
            var qr = conteudo;

            // var nome = pegarNomeAtivo();

            $.ajax({
                type: "GET",
                url: "../models/ConsultaQRAlocados.php",
                data: {
                    'cod_item': qr
                    // 'nomeReg': nome_reg
                },
                sucess: function(result) {
                    if (result != '') {
                        var inst = $('[data-remodal-id=alerta-qrcode]').remodal();
                        inst.open();
                    } else {

                    }
                }
            })

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