<script type="text/javascript">
    $(document).ready(function() {
        // var nomeUser = $().val();

        // var arrNome = {
        //     buscarUsuarios: nomeUser,
        // }

        $.get('../models/ConsultaUsuariosCadastrados.php', function(result){
            console.log(result);
            var res = JSON.parse(result);
            console.log(res);

            var itens = {
                propertyKey: ""
            };

            preencherDatalist(res, itens);
        });

        function preencherDatalist(res, itens){
            for(i = 0; i < res.length; i++){
                itens+= "<option value="+res[i].nome +">";
            }
            $('#options').html(itens);
        }
    });
</script>