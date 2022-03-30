<?php

 

// inclui o arquivo de inicialização

require '../models/conexao.php';

 

// resgata variáveis do formulário

$user = isset($_POST['user']) ? $_POST['user'] : '';

$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

 

if (empty($user) || empty($pass))

{

    echo '<script> alert ("Insira um os dados!"); location.href=("../index.php")</script>';

    exit;

}

 

 

$PDO = db_connect();

 

$sql = "SELECT * FROM colaborador WHERE usuario = :user AND senha = :pass";

$stmt = $PDO->prepare($sql);

 

$stmt->bindParam(':user', $user);

$stmt->bindParam(':pass', $pass);

 

$stmt->execute();

 

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

 

if (count($users) <= 0)

{

    echo '<script> alert ("Usuário e Senha Incorretos"); location.href=("../index.php")</script>';

    exit;

}

 

// pega o primeiro usuário

$user = $users[0];

 

session_start();

$_SESSION['logged_in'] = true;

$_SESSION['user_id'] = $user['id_col'];
$_SESSION['user_name'] = $user['nome'];
$_SESSION['user_cpf'] = $user['cpf'];
$_SESSION['user_funcao'] = $user['funcao'];
$_SESSION['user_setor'] = $user['setor'];
$_SESSION['user_usuario'] = $user['usuario'];
$_SESSION['user_senha'] = $user['senha'];
$_SESSION['user_situacao'] = $user['situacao'];
 

header('Location: ../views/home.php');