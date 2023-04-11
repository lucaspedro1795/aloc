<script type="text/javascript">
    let pagina = 0;
    let tamanhoPagina = 8;

    $(document).ready(function() {
        $.post('../models/ConsultaAlocacoes.php', function(result) {
            var res = JSON.parse(result);

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

    function preencher(res, itens) {
        for (i = pagina * tamanhoPagina; i < res.length && i < (pagina + 1) * tamanhoPagina; i++) {
            itens += "<tr><td data-Cod class='fw-bold'>" + res[i].cod + "</td>" +
                "<td data-nomeReg>" + res[i].nome_reg + "</td>" +
                "<td data-user >" + res[i].userAtual + "</td>" +
                "<td data-situacaoes >" + res[i].situacao + "</td>" +
                "</tr>";
        }
        $('#tabela-alocacoes tbody').html(itens);
        $('#numeracao').text('Página ' + (pagina + 1) + ' de ' + Math.ceil(res.length / tamanhoPagina));
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