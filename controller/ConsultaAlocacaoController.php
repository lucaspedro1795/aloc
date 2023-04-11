<script type="text/javascript">
    let pagina = 0;
    let tamanhoPagina = 5;


    $("#cadastro-usuario").click(function() {
        var inst = $('[data-remodal-id=modal-cadastrar-usuario]').remodal();
        inst.open();
    });


    function consultaAlocacoes() {
        $.post('../models/ConsultaAlocados.php', function(result) {
            var res = JSON.parse(result);

            localStorage.setItem('dados', res);

            var itens = {
                propertyKey: ""
            };

            if (res.length === 0) {
                var inst = $('[data-remodal-id=alerta]').remodal();
                inst.open();
            } else {
                preencher(res, itens);



            }

        });
    }

    $(document).ready(function() {

        $.post('../models/ConsultaAlocados.php', function(result) {
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
                    $('#primeira').click(function() {
                        pagina = 0;
                        preencher(res, itens);
                        ajustarBotoes(res, tamanhoPagina);
                    });
                    $('#ultima').click(function() {
                        pagina = Math.floor(res.length / tamanhoPagina);
                        preencher(res, itens);
                        ajustarBotoes(res, tamanhoPagina);
                    });
                    preencher(res, itens);
                    ajustarBotoes(res, tamanhoPagina);

                });

            }

        });
    });

    $("#tabela-inventarioadm").on("click", "#limpar", function() {
        var codigoItemAdm = $(this).closest('tr').find("td[data-CodAdm]").text();
        $('#cod').val(codigoItemAdm);
    });

    function preencher(res, itens) {
        for (i = pagina * tamanhoPagina; i < res.length && i < (pagina + 1) * tamanhoPagina; i++) {
            itens += "<tr><td data-CodAdm class='fw-bold'>" + res[i].cod_item + "</td>" +
                "<td data-nomeReg>" + res[i].nome_reg + "</td>" +
                "<td data-categoria >" + res[i].categoria + "</td>" +
                // "<td data-categoria >" + res[i].setor + "</td>" +
                "<td data-userAtual >" + res[i].userAtual + "</td>" +
                "<td data-situacao id='situacao'>" + res[i].situacao + "</td>" +
                "<td data-hrAloc >" + res[i].horario_alocado + "</td>" +
                "<td><a href='#' class='' id='protocolar'><i class='fa-solid fa-file-contract'></i></a></td>" +
                "<td><a href='#' class='' id='editar'><i class='fa-solid fa-power-off'></i></a></td>" +
                "</tr>";
        }
        var situacao = $('#situacao').val();
        console.log(situacao);
        if (situacao === 'ALOCADO') {
            $('#tabela-alocacao tbody tr #situacao').addClass('text-success');
        } else {
            $('#tabela-alocacao tbody tr #situacao').addClass('text-danger');
        }

        let qtdItens = "<h4>Total de Alocados:  " + res.length + "</h4>";
        $('#tabela-alocacao tbody').html(itens);
        $('#numeracao').text('Página ' + (pagina + 1) + ' de ' + Math.ceil(res.length / tamanhoPagina));
        $('#qtdItens').html(qtdItens);
    }


    function ajustarBotoes(res, tamanhoPagina) {
        var qtdPaginas = Math.ceil(res.length / tamanhoPagina)

        if (pagina == (qtdPaginas - 1) && pagina != 0) {
            $('#proximo').hide()
            $('#ultima').hide()
            // var inst = $('[data-remodal-id=alerta-fim-tabela]').remodal();
            // inst.open();
        } else {
            $('#proximo').show()
            $('#ultima').show()
        }
        if (qtdPaginas == 1) {
            $('#proximo').hide()
        }
        if (pagina == 0) {
            $('#anterior').hide()
            $('#primeira').hide()
        } else {
            $('#anterior').show()
            $('#primeira').show()
        }

    }
</script>