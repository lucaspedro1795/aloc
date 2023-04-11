<?php

session_start();

require_once './conexao.php';

$user = $_SESSION['user_name'];

// $id = isset($_GET['cod']) ? $_GET['cod'] : null;
if(isset($_POST['cod'])){
    $id = $_POST['cod'];
}

try {
    $pdo = Conection::getConnection();
    $sql = "UPDATE items SET situacao = '', userAtual='', horario_alocado = '' WHERE cod = :id";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(':id', $id, PDO::PARAM_INT);
    $consulta->execute();

} catch (Exception $e) {
    echo "erro: " . $e;
}
