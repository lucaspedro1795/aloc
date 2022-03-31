<?php

session_start();

require_once '../models/conexao.php';
 
// abre a conexão
$PDO = db_connect();
 
// SQL para selecionar os registros
$sql = "SELECT * FROM items WHERE dispAloc = 'S' AND situacao = 'ALOCADO' AND userAtual = '$_SESSION[user_name]'";

 
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
</head>

<body>
    <div class="container-simple">
        <div class="content table-responsive">
        

            <table border="1" class="table table-bordered border-success">
                <tbody>
                    <tr class="table-secondary">
                        <th scope="col">#</th>
                        <th scope="col">Nome do Registro</th>
                        <th scope="col">Usuário Atual</th>
                        <th scope="col">Situação</th>
                    </tr>
                <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td class="fw-bold"><?php echo $user['cod'] ?></td>
                    <td><?php echo $user['nome_reg'] ?></td>
                    <td><?php echo $user['userAtual'] ?></td>
                    <td><?php echo $user['situacao']?></td>
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
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
                                            <a class="nav-link" href="emprestimo.php"><i class="bi bi-laptop"></i> Empréstimo</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="meus.php"><i class="bi bi-laptop"></i> Minhas Solicitações</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="perfil.php"><i class="bi bi-person-circle"></i> Perfil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../controller/logout.php"><i class="bi bi-door-open"></i> Sair</a>
                                        </li>
                                    </ul>
                                </div>
                    </div>
                </nav>
        </div>
    </div>
</body>

</html>