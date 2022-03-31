<?php

session_start();

require_once '../../models/conexao.php';
 
// abre a conexão
$PDO = db_connect();
 
$sql_count = "SELECT COUNT(*) AS total FROM items WHERE dispAloc = 'S' AND situacao = 'ALOCADO' ORDER BY nome_reg ASC";

$sql_count2 = "SELECT COUNT(*) AS total FROM colaborador ORDER BY nome ASC";
 
// SQL para selecionar os registros
$sql = "SELECT cod, nome_reg, categoria, num_serie, setor, userAtual, DATE_FORMAT(horario_alocado, '%d/%m/%Y às %Hh%i' ) AS 'horario_alocado',situacao FROM items WHERE dispAloc = 'S' AND situacao = 'ALOCADO'";
 
// conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// conta o total de registros
$stmt_count2 = $PDO->prepare($sql_count2);
$stmt_count2->execute();
$total2 = $stmt_count2->fetchColumn();
 
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
        <div class="container-simple">
            <div class="content table-responsive">
                <div class="card m-3 p-3">
                    <h3>Total de Equipamentos Alocados : <?php echo $total ?></h3>

                    <?php if ($total > 0): ?>
                </div>


                <table class="table table-bordered border-success w-100">
                    <tbody>
                        <tr class="table-secondary">
                            <th>#</th>
                            <th>Nome do Registro</th>
                            <th>Nº Série</th>
                            <th>Usuário Atual</th>
                            <th>Situação</th>
                            <th>Data da Alocação</th>
                            <th>Ações</th>
                        </tr>
                        <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td class="fw-bold">
                                <?php echo $user['cod'] ?>
                            </td>
                            <td>
                                <?php echo $user['nome_reg'] ?>
                            </td>
                            <td>
                                <?php echo $user['num_serie'] ?>
                            </td>
                            <td>
                                <?php echo $user['userAtual'] ?>
                            </td>
                            <td>
                                <?php echo $user['situacao']?>
                            </td>
                            <td>
                                <?php echo $user['horario_alocado'] ?>
                            </td>
                            <td>
                                <a class="btn" href="../../controller/dev.php?cod=<?php echo $user['cod'] ?>">Devolver</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
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
                                    <a class="nav-link" href="inventario.php"><i class="bi bi-journal-text"></i>
                                    Inventário</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="alocacao.php"><i class="bi bi-laptop"></i> Alocação</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="perfil.php"><i class="bi bi-person-circle"></i> Perfil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../../controller/logout.php"><i class="bi bi-door-open"></i>
                                    Sair</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </body>

    </html>