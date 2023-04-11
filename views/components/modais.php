<div class="remodal" data-remodal-id="modal-reserva">
    <button data-remodal-action="close" class="remodal-close"></button>
    <input type="hidden" name="cdg" id="cdg" class="form-control" readonly="">
    <h2 class="text-primary"><i class="bi bi-bookmark-plus"></i> Reservar Equipamento</h2>
    <h5>
        Deseja reservar este equipamento?
    </h5>
    <br>
    <button data-remodal-action="cancel" class="remodal-cancel">Não</button>
    <button data-remodal-action="confirm" class="remodal-confirm" id="confirmarReserva">Sim</button>
</div>


<div class="remodal" data-remodal-id="modal-confirmacao-reserva">
    <h1 class="text-success"><i class="bi bi-check-circle-fill"></i> Reservado com Sucesso!</h1>
    <br>
    <button data-remodal-action="confirm" class="remodal-confirm" id="btn-reload">OK</button>
</div>


<div class="remodal" data-remodal-id="modal-erro-reserva">
    <h1 class="text-danger">Alerta</h1>
    <h5>
        Não foi possível realizar a reserva!
    </h5>
    <br>
    <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
</div>


<div class="remodal" data-remodal-id="modal-limpar-situacao">
    <button data-remodal-action="close" class="remodal-close"></button>
    <input type="hidden" name="cod" id="cod" class="form-control" readonly="">
    <h2 class="text-danger"> Deseja limpar a situação do equipamento?</h2>
    <br>
    <button data-remodal-action="cancel" class="remodal-cancel">Não</button>
    <button data-remodal-action="confirm" class="remodal-confirm" id="confirmarLimp">Sim</button>
</div>

<div class="remodal" data-remodal-id="modal-confirmacao-limpeza">
    <button data-remodal-action="close" class="remodal-close" id="fechar"></button>
    <h1 class="text-success"><i class="bi bi-check-circle-fill"></i> Situação Limpa!</h1>
    <br>
    <button data-remodal-action="confirm" class="remodal-confirm" id="btn-reloadLimpeza">OK</button>
</div>


<div class="remodal" data-remodal-id="alerta">
    <button data-remodal-action="close" class="remodal-close"></button>
    <h2 class="text-danger">Alerta</h2>
    <h5>
        Não possui nenhum equipamento disponível!
    </h5>
    <br>
    <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
</div>



<div class="remodal" data-remodal-id="alerta">
    <button data-remodal-action="close" class="remodal-close"></button>
    <h2 class="text-danger">Alerta</h2>
    <h5>
        Não possui nenhum equipamento disponível!
    </h5>
    <br>
    <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
</div>


<div class="remodal" data-remodal-id="modal-cadastrar-usuario">
    <button data-remodal-action="close" class="remodal-close"></button>
    <h2 class="text-primary"><i class="fa-solid fa-user-plus"></i> Cadastrar Usuário</h2>
    <br>
    <div class="mb-3">
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" required>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="funcaoUser" name="funcaoUser" placeholder="Função">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="setorUser" name="setorUser" placeholder="Setor">
    </div>
    <hr style="width:100% !important;">
    <div class="mb-3">
        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required>
    </div>
    <div class="mb-3">
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
    </div>
    <hr style="width:100% !important;">
    <br>
    <button data-remodal-action="confirm" class="remodal-confirm" id="btnCadastrarUser">Cadastrar</button>
    
</div>




<div class="remodal" data-remodal-id="modal-cadastrar-ativo">
    <button data-remodal-action="close" class="remodal-close"></button>
    <h2 class="text-primary"><i class="fa-solid fa-laptop-medical"></i> Cadastrar Ativo</h2>
    <div class="mb-3">
        <input type="text" class="form-control" id="nome_reg" name="nome_reg" placeholder="Nome do Registro" required>
    </div>
    <div class="mb-3">
        <select class="form-select" name="cat" id="cat">
            <option value="##">Selecione uma categoria...</option>
            <option value="COMPUTADOR">COMPUTADOR</option>
            <option value="NOTEBOOKS">NOTEBOOKS</option>
            <option value="PERIFÉRICOS">PERIFÉRICOS</option>
            <option value="IMPRESSORAS">IMPRESSORAS</option>
            <option value="REDES">REDES</option>
            <option value="MATERIAL">MATERIAL</option>
        </select>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="num_serie" name="num_serie" placeholder="Nº de Série">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="setorAtivo" name="setorAtivo" placeholder="Setor">
    </div>
    <div class="mb-3">
        <select class="form-select" name="disponivel" id="disponivel" required>
            <option value="##">Está disponível para alocação?</option>
            <option value="S">Sim</option>
            <option value="N">Não</option>
        </select>
    </div>
    <br>
    <button data-remodal-action="confirm" class="remodal-confirm" id="btnCadastrarAtivo">Cadastrar</button>
</div>


<div class="remodal" data-remodal-id="alerta-cadastro-ativo">
    <h1 class="text-success"><i class="bi bi-check-circle-fill"></i> Cadastrado com Sucesso!</h1>
    <br>
    <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
</div>


<div class="remodal" data-remodal-id="alerta-qrcode">
    <button data-remodal-action="close" class="remodal-close"></button>
    <h2 class="text-danger">Alerta</h2>
    <h5>
       <div id="resultado"></div>
    </h5>
    <br>
    <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
</div>


<div class="remodal" data-remodal-id="alerta-usuario-cadastrado">
    <h1 class="text-success"><i class="bi bi-check-circle-fill"></i> Usuário cadastrado com Sucesso!</h1>
    <br>
    <button data-remodal-action="confirm" class="remodal-confirm" id="btn-reload">OK</button>
</div>

<div class="remodal" data-remodal-id="erro-usuario-cadastrado">
    <h1 class="text-danger"><i class="fa-solid fa-circle-xmark"></i> Erro ao cadastrar o usuário!</h1>
    <br>
    <button data-remodal-action="confirm" class="remodal-confirm" id="btn-reload">OK</button>
</div>


<div class="remodal" data-remodal-id="alerta-ativo-cadastrado">
    <h1 class="text-success"><i class="bi bi-check-circle-fill"></i> Ativo cadastrado com Sucesso!</h1>
    <br>
    <button data-remodal-action="confirm" class="remodal-confirm" id="btn-reload">OK</button>
</div>

<div class="remodal" data-remodal-id="erro-ativo-cadastrado">
    <h1 class="text-danger"><i class="fa-solid fa-circle-xmark"></i> Erro ao cadastrar o ativo!</h1>
    <br>
    <button data-remodal-action="confirm" class="remodal-confirm" id="btn-reload">OK</button>
</div>