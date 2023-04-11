<?php include_once 'head.php'; ?>

<?php
include_once "components/modais.php";
?>

<body>
    <div id="all">
        <?php include_once 'menu_adm.php'; ?>
        <div class="main">
            <div class="cart table-responsive">
                <div id="qtdItens"></div>
                <table border="1" class="tabelaAll" id="tabela-alocacao">
                    <thead>
                        <tr class="table-dark">
                            <th>Cód. Ativo</th>
                            <th>Nome do Registro</th>
                            <th>Categoria</th>
                            <!-- <th>Nº Série</th> -->
                            <!-- <th>Setor</th> -->
                            <th>Usuário Atual</th>
                            <th>Situação</th>
                            <th>Data da Alocação</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <div id="paginacao">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link depois" id="primeira" href="#" aria-label="Next">
                                    <i class="fa-solid fa-backward-step"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link antes" id="anterior" href="#" aria-label="Previous">
                                    <i class="fa-solid fa-caret-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" id="numeracao" disabled="">...</a></li>
                            <li class="page-item">
                                <a class="page-link depois" id="proximo" href="#" aria-label="Next">
                                    <i class="fa-solid fa-caret-right"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link depois" id="ultima" href="#" aria-label="Next">
                                    <i class="fa-solid fa-forward-step"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>



    <script src="../jquery/jquery.js"></script>
    <script src="../jquery/jquery.mask.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/popper.js"></script>

    <!--Script do Remodal-->
    <script src="../remodal/dist/remodal.min.js"></script>


    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js" defer></script>
</body>

</html>

<?php include '../controller/ConsultaAlocacaoController.php'; ?>

<?php include '../controller/CadastroUsuarioController.php'; ?>
<?php include '../controller/CadastroItemController.php'; ?>