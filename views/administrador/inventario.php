<?php

session_start();

require_once '../../models/conexao.php';

//verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
 
// abre a conexão
$PDO = db_connect();
 
$sql_count = "SELECT COUNT(*) AS total FROM items ORDER BY nome_reg ASC";

$sql_count2 = "SELECT COUNT(*) AS total FROM colaborador ORDER BY nome ASC";
 

 
// conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// conta o total de registros
$stmt_count2 = $PDO->prepare($sql_count2);
$stmt_count2->execute();
$total2 = $stmt_count2->fetchColumn();

//seta a quantidade de itens por página, neste caso, 2 itens 
$registros = 4; 
 
//calcula o número de páginas arredondando o resultado para cima 
$numPaginas = ceil($total/$registros); 

//variavel para calcular o início da visualização com base na página atual 
$inicio = ($registros*$pagina)-$registros;

// SQL para selecionar os registros
$sql = "SELECT cod, nome_reg, categoria, num_serie, setor, userAtual, DATE_FORMAT(horario_alocado, '%d/%m/%Y às %Hh%i' ) AS 'horario_alocado',situacao FROM items limit $inicio,$registros; ";
 
// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();

?>
<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aloc</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../../assets/images/favicon.png" type="image/x-icon">
</head>

<body>
    <div class="container-simple table-responsive">
        <div class="content table-responsive">
            <div class="card ms-3 mt-3 me-3">
                <h3> Total de Items: <?php echo $total ?></h3>

                <?php if ($total > 0): ?>
                    <div class="blockquote">
                    <button type="button" class="btn btn-secondary ms-5 mt-0" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i> Adicionar</button>
                    </div>
                    
            </div>
            <div class="card ms-3 mb-3 me-3 table-responsive">
                <table class="table table-bordered border-success">
                    <tbody>
                        <tr class="table-secondary">
                            <th>#</th>
                            <th>Nome do Registro</th>
                            <th>Categoria</th>
                            <th>Nº Série</th>
                            <th>Setor</th>
                            <th>Usuário Atual</th>
                            <th>Situação</th>
                            <th>Data da Alocação</th>
                            <th>Ações</th>
                        </tr>
                    <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td class="fw-bold"><?php echo $user['cod'] ?></td>
                        <td><?php echo $user['nome_reg'] ?></td>
                        <td><?php echo $user['categoria'] ?></td>
                        <td><?php echo $user['num_serie'] ?></td>
                        <td><?php echo $user['setor'] ?></td>
                        <td><?php echo $user['userAtual'] ?></td>
                        <td><?php echo $user['situacao']?></td>
                        <td><?php echo $user['horario_alocado'] ?></td>
                        <td>
                            <a class="btn" href="../../controller/limp.php?cod=<?php echo $user['cod'] ?>">Limpar situação</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
                <div class="paginacao" style="margin-top: -13px;">
                <?php
                //exibe a paginação 
                    for($i = 1; $i < $numPaginas + 1; $i++) { 
                        echo "<a class='active' href='inventario.php?pagina=$i'>".$i."</a> ";
                    } 
                ?>
                </div>
            </div>        
            
            <?php else: ?>
 
                <p>Nenhum usuário registrado</p>

            <?php endif; ?>
        </div>
        <div class="menu">
            <nav class="navbar navbar-expand-lg navbar-light bg-light center">
                    <div class="container-fluid">
                    <h2 class="logo" href="#">Aloc</h2>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="home.php"><i class="bi bi-house-door"></i> Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link  active" href="inventario.php"><i class="bi bi-journal-text"></i> Inventário</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="alocacao.php"><i class="bi bi-laptop"></i> Alocação</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="perfil.php"><i class="bi bi-person-circle"></i> Perfil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../../controller/logout.php"><i class="bi bi-door-open"></i> Sair</a>
                                        </li>
                                    </ul>
                                </div>
                    </div>
                </nav>
        </div>
    </div>

    <!-- Adicionar Item -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-laptop"></i> Adicionar Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form action="../../controller/add_item.php" method="post">
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
                        <input type="text" class="form-control" id="setor" name="setor" placeholder="Setor">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="disponivel" id="disponivel" required>
                            <option value="##">Está disponível para alocação?</option>
                            <option value="S">Sim</option>
                            <option value="N">Não</option>
                        </select>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Adicionar">
               </form>
            </div>
            </div>
        </div>
    </div>
    
</body>

</html>