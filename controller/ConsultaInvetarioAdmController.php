<script type="text/javascript">
    let pagina = 0;
    let tamanhoPagina = 5;

    $('#confirmarLimp').click(function() {
        var cod = $('#cod').val();
        // console.log(cod);

        var arr_inventario = {
            cod: cod
        }

        $.post('../models/LimparSituacao.php', arr_inventario, function(response) {
            var inst = $('[data-remodal-id=modal-confirmacao-limpeza]').remodal();
            inst.open();
            consultaInventario();
        })
    });

    $("#cadastro-usuario").click(function() {
        var inst = $('[data-remodal-id=modal-cadastrar-usuario]').remodal();
        inst.open();
    });


    function consultaInventario() {
        $.post('../models/ConsultaInventarioAdm.php', function(result) {
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

        $.post('../models/ConsultaInventarioAdm.php', function(result) {
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

    $("#tabela-inventarioadm").on("click", "#btn-etiqueta", function() {
    var cod_item = $(this).closest('tr').find("td[data-CodAdm]").text();
    var nomeReg = $(this).closest('tr').find("td[data-nomeReg]").text();
    console.log(cod_item, nomeReg);
    location.href = "../views/gerarEtiqueta.php?cod_item=" + cod_item + "&nomeReg=" + nomeReg + ""
  });

    function preencher(res, itens) {
        for (i = pagina * tamanhoPagina; i < res.length && i < (pagina + 1) * tamanhoPagina; i++) {
            itens += "<tr><td data-CodAdm class='fw-bold'>" + res[i].cod_item + "</td>" +
                "<td data-nomeReg>" + res[i].nome_reg + "</td>" +
                "<td data-categoria >" + res[i].categoria + "</td>" +
                "<td data-categoria ></td>" +
                "<td data-categoria >" + res[i].setor + "</td>" +
                // "<td data-categoria >" + res[i].userAtual + "</td>" +
                // "<td data-categoria >" + res[i].situacao + "</td>" +
                // "<td data-categoria >" + res[i].horario_alocado + "</td>" +
                "<td><a href='#' class='' data-remodal-target='modal-editar-ativo' id='editar'><i class='fa-solid fa-pen-to-square'></i></a></td>" +
                "<td><a href='#' class='' id='btn-etiqueta'><i class='fa-solid fa-tag'></i></a></td>" +
                "<td><a href='#' class='' data-remodal-target='modal-excluir-ativo' id='excluir'><i class='fa-solid fa-trash-can'></i></a></td>" +
                "</tr>";
        }

        let qtdItens = "<h4>Total de Ativos:  " + res.length + "</h4>";
        $('#tabela-inventarioadm tbody').html(itens);
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