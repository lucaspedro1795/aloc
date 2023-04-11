<?php
session_start();
require_once '../models/conexao.php';

$pdo = Conection::getConnection(); 

$sql = "SELECT * FROM items WHERE dispAloc = 'S' AND situacao = 'ALOCADO' AND userAtual = '$_SESSION[user_name]'";

$consulta = $pdo->prepare($sql);

$consulta->execute();

$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado, JSON_PRETTY_PRINT);
