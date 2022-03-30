<?php

session_start();

require_once '../models/conexao.php';
 
$user = $_SESSION['user_name'];
// pega o ID da URL
$id = isset($_GET['cod']) ? $_GET['cod'] : null;
 
// valida o ID
if (empty($id))
{
    echo "ID não informado";
    exit;
}
 
// remove do banco
$PDO = db_connect();
$sql = "UPDATE items SET situacao = '', userAtual='', horario_alocado = '' WHERE cod = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: ../views/administrador/inventario.php');
}
else
{
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}