<script type="text/javascript">

    function consultaInventario(){
        $.post('../models/ConsultaInvetarioAdm.php', function(result) {
            var res = JSON.parse(result);

            localStorage.setItem('dados', res);

            var dados = localStorage.getItem('dados');

            if(dados){
                var res = JSON.parse(dados);
            }

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

    $('#btnCadastrarAtivo').on('click', function(){
        var nomeAtivo = $('#nome_reg').val();
        var categoria = $('#cat').val();
        var num_serie = $('num_serie').val();
        var setorAtivo = $('#setorAtivo').val();
        var disponivel = $('#disponivel').val();
       
        var arr_ativo = {
            nome_reg: nomeAtivo,
            cat: categoria,
            num_serie: num_serie,
            setorAtivo: setorAtivo,
            disponivel: disponivel
        }
        

        $.get('../models/CadastrarAtivo.php', arr_ativo, function(response){
            // console.log(response);
            if(response = 0){
                var inst = $('[data-remodal-id=erro-ativo-cadastrado]').remodal();
                inst.open();
            } else {
                var inst = $('[data-remodal-id=alerta-ativo-cadastrado]').remodal();
                inst.open();
            }
        })
    });
</script>