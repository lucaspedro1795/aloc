<?php
require_once './conexao.php';

try {
    $pdo = Conection::getConnection();
    $sql = "SELECT * FROM colaborador";
    $consulta = $pdo->prepare($sql);
    $consulta->execute();

    $result = $consulta->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result, JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo "erro: ".$e;
}

?>