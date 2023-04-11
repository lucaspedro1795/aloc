    <nav class="menu">
        <h2 class="logo" href="#">Aloc</h2>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="home.php"><i class="fa-solid fa-house"></i> Home</a>
            </li>
            <li class="dropdown">
                <a class="nav-link dropbtn" href="#"><i class="fa-solid fa-file-circle-plus"></i> Cadastrar <i id="iconDown" class="bi bi-caret-down-fill"></i></a>
                <ul class="dropdown-content">
                    <li><a data-remodal-target="modal-cadastrar-usuario" id="cadastro-usuario"><i class="fa-solid fa-user-plus"></i> Usuários</a></li>
                    <li><a href="" data-remodal-target="modal-cadastrar-ativo"><i class="fa-solid fa-laptop-medical"></i> Ativos</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="nav-link dropbtn" href="#"><i class="fa-solid fa-laptop-file"></i> Ativos <i id="iconDown" class="bi bi-caret-down-fill"></i></a>
                <ul class="dropdown-content">
                    <li><a href="inventario.php"><i class="fa-solid fa-clipboard-list"></i> Inventário</a></li>
                    <li><a href="alocacao.php"><i class="fa-brands fa-leanpub"></i> Alocação</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="leitor.php"><i class="fa-solid fa-qrcode"></i> Leitor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa-solid fa-users-line"></i> Usuários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa-solid fa-square-poll-horizontal"></i> Relatórios</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="perfil.php"><i class="fa-solid fa-id-badge"></i> Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../controller/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair</a>
            </li>
        </ul>

    </nav>

    <script src="../jquery/jquery.js"></script>
    <script src="../jquery/jquery.mask.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/popper.js"></script>

    <?php include 'components/modais.php'; ?>
    <script src="../remodal/dist/remodal.min.js"></script>