<?php

use \PDO as PDO;
require_once '../models/conexao.php';


try {
    $pdo = Conection::getConnection();

    // SQL para selecionar os registros

    $sql = "SELECT * FROM items WHERE dispAloc = 'S' AND situacao = ''";
    // seleciona os registros

    $consulta = $pdo->prepare($sql);

    $consulta->execute();

    $result = $consulta->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result, JSON_PRETTY_PRINT);
    
} catch (Exception $e) {
    echo "erro: " . $e;
}
