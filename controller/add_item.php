<?php

require_once '../models/conexao.php';

$nome_reg = isset($_POST['nome_reg']) ? $_POST['nome_reg'] : null;
$cat = isset($_POST['cat']) ? $_POST['cat'] : null;
$num_serie = isset($_POST['num_serie']) ? $_POST['num_serie'] : null;
$disponivel = isset($_POST['disponivel']) ? $_POST['disponivel'] : null;
 
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($nome_reg) || empty($disponivel))
{
    echo '<script> alert ("Volte e preencha os campos requeridos"); location.href=("../views/administrador/inventario.php")</script>';
    exit;
}
 
 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO items(cod,nome_reg, categoria, num_serie, dispAloc) VALUES(null, :nome_reg, :categoria, :num_serie, :dispAloc)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome_reg', $nome_reg);
$stmt->bindParam(':categoria', $cat);
$stmt->bindParam(':num_serie', $num_serie);
$stmt->bindParam(':disponivel', $disponivel);
 
 
if ($stmt->execute())
{
    header('Location: ../views/administrador/inventario.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}

 


?>