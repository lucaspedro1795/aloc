<?php
 
require_once '../models/conexao.php';
 
// resgata os valores do formulário
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;


// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE administrador SET senha = :senha WHERE usuario = :usuario";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':senha', $senha);
 
if ($stmt->execute())
{
    echo '<script> alert ("Senha alterada com sucesso!"); location.href=("../index.php")</script>';
    exit;
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}