<script type="text/javascript">
    let pagina = 0;
    let tamanhoPagina = 8;

    $(document).ready(function() {
        $.get('../models/ConsultaTabelaUsuarios.php', function(result) {
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

    function preencher(res, itens) {
        for (i = pagina * tamanhoPagina; i < res.length && i < (pagina + 1) * tamanhoPagina; i++) {
            itens += "<tr><td data-CodUser>" + res[i].id_col + "</td>" +
                "<td data-Nome>" + res[i].nome + "</td>" +
                "<td data-Nome>" + res[i].cpf + "</td>" +
                "<td data-Nome>" + res[i].funcao + "</td>" +
                "<td data-Nome>" + res[i].setor + "</td>" +
                "<td><a href='#' class='' data-remodal-target='modal-editar-ativo' id='editar'><i class='fa-solid fa-pen-to-square'></i></a></td>" +
                "<td><a href='#' class='' id='btn-etiqueta'><i class='fa-solid fa-tag'></i></a></td>" +
                "<td><a href='#' class='' data-remodal-target='modal-excluir-ativo' id='excluir'><i class='fa-solid fa-trash-can'></i></a></td>" +
                "</tr>"
        }
        $('#tabela-usuarios tbody').html(itens);
        $('#numeracao').text('Página ' + (pagina + 1) + ' de ' + Math.ceil(res.length / tamanhoPagina));
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