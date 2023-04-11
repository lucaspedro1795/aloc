<script type="text/javascript">
    let pagina = 0;
    let tamanhoPagina = 5;


    $("#confirmarReserva").click(function() {
        var cod = $('#cdg').val();
        // console.log(cod);

        var arr_reserva = {
            cdg: cod
        };
        console.log(arr_reserva);

        $.post('../models/AlocarAtivo.php', arr_reserva, function(response) {

            var inst = $('[data-remodal-id=modal-confirmacao-reserva]').remodal();
            inst.open();
        });
    });

    $('#btn-reload').click(function(){
        location.reload();
    });

    $(document).ready(function() {

        $.post('../models/ConsultaInventario.php', function(result) {
            var res = JSON.parse(result);

            localStorage.setItem("dados", res);

            var itens = {
                propertyKey: ""
            };

            if (res.length === 0) {
                var inst = $('[data-remodal-id=alerta]').remodal();
                inst.open();
            } else {
                preencher(res, itens);

                $(function() {
                    $('#proximo').click(function() {
                        if (pagina < res.length / tamanhoPagina - 1) {
                            pagina++;
                            preencher(res, itens);
                            ajustarBotoes(res, tamanhoPagina);
                        }
                    });
                    $('#anterior').click(function() {
                        if (pagina > 0) {
                            pagina--;
                            preencher(res, itens);
                            ajustarBotoes(res, tamanhoPagina);
                        }
                    });
                    preencher(res, itens);
                    ajustarBotoes(res, tamanhoPagina);

                });

            }

        });
    });

    $("#tabela-inventario").on("click", "#reserva", function() {
        var codigoItem = $(this).closest('tr').find("td[data-Cod]").text();
        $('#cdg').val(codigoItem);
    });

    function preencher(res, itens) {
        for (i = pagina * tamanhoPagina; i < res.length && i < (pagina + 1) * tamanhoPagina; i++) {
            itens += "<tr><td data-Cod class='fw-bold'>" + res[i].cod + "</td>" +
                "<td data-nomeReg>" + res[i].nome_reg + "</td>" +
                "<td data-categoria >" + res[i].categoria + "</td>" +
                "<td><a href='#' class='btn btn-primary btn-reservar' data-remodal-target='modal-reserva' id='reserva'>Reservar</a></td>" +
                "</tr>";
        }

        let qtdItens = "<h4>Total itens disponíveis: " + res.length + "</h4>";
        $('#tabela-inventario tbody').html(itens);
        $('#numeracao').text('Página ' + (pagina + 1) + ' de ' + Math.ceil(res.length / tamanhoPagina));
        $('#qtdItens').html(qtdItens);
    }


    function ajustarBotoes(res, tamanhoPagina) {
        var qtdPaginas = Math.ceil(res.length / tamanhoPagina)

        if (pagina == (qtdPaginas - 1) && pagina != 0) {
            $('#proximo').hide()
            // var inst = $('[data-remodal-id=alerta-fim-tabela]').remodal();
            // inst.open();
        } else {
            $('#proximo').show()
        }
        if (qtdPaginas == 1) {
            $('#proximo').hide()
        }
        if (pagina == 0) {
            $('#anterior').hide()
        } else {
            $('#anterior').show()
        }

    }
</script>