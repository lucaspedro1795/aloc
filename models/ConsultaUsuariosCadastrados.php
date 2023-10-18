<?php
require_once './conexao.php';

// if (isset($_GET['buscarUsuarios'])) {
//     $user = $_GET['buscarUsuarios'];
// }

// $user = 'Pedro';

try {
    $pdo = Conection::getConnection();
    $sql = "SELECT nome FROM colaborador";
    $consulta = $pdo->prepare($sql);
    // $consulta->bindValue(':user', "%$user%");
    $consulta->execute();
    $result = $consulta->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result, JSON_PRETTY_PRINT);
} catch (Exception $e) {
    echo "erro: " . $e->getMessage();
}
?>
