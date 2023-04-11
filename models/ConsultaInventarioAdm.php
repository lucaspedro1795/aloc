<?php

session_start();


require_once './conexao.php';

try {
    $pdo = Conection::getConnection();

    $sql = "SELECT cod_item, nome_reg, categoria, num_serie, setor, userAtual, DATE_FORMAT(horario_alocado, '%d/%m/%Y às %Hh%i' ) AS 'horario_alocado',situacao FROM items";

    $consulta = $pdo->prepare($sql);
    $consulta->execute();

    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultado, JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo "erro: ". $e;
}
