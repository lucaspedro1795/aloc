<?php
require_once './conexao.php';
session_start();

$user = $_SESSION['user_name'];
 
if(isset($_POST['cdg'])){
    $cod = $_POST['cdg'];
}

try {
   $pdo = Conection::getConnection();
   $sql = "UPDATE items SET situacao = 'ALOCADO', userAtual = '$user', horario_alocado = now() WHERE cod = :cod";
   $consulta = $pdo->prepare($sql);

   $consulta->bindParam(':cod', $cod, PDO::PARAM_INT);

   $consulta->execute();

} catch (Exception $e) {
    echo "Erro: ". $e;
}
