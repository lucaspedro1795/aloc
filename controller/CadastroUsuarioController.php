<script type="text/javascript">
    $('#btnCadastrarUser').on('click', function(){
        var nomeUser = $('#nome').val();
        var cpfUser = $('#cpf').val();
        var funcaoUser = $('#funcaoUser').val();
        var setorUser = $('#setorUser').val();
        var usuario = $('#usuario').val();
        var senha = $('#senha').val();
       
        var arr_user = {
            nome: nomeUser,
            cpf: cpfUser,
            funcaoUser: funcaoUser,
            setorUser: setorUser,
            usuario: usuario,
            senha: senha
        }

        // console.table(arr_user);

        $.get('../models/CadastrarUsuário.php', arr_user, function(response){
            if(response = 0){
                var inst = $('[data-remodal-id=erro-usuario-cadastrado]').remodal();
                inst.open();
            } else {
                var inst = $('[data-remodal-id=alerta-usuario-cadastrado]').remodal();
                inst.open();
            }
        })
    });
</script>