<?php
 
require_once '../models/conexao.php';
 
// resgata os valores do formulário
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;


// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE colaborador SET usuario = :usuario, senha = :senha WHERE id_col = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':senha', $senha);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    echo '<script> alert ("Senha e usuário alterados com sucesso!"); location.href=("../views/perfil.php")</script>';
    exit;
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}