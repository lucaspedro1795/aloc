<?php

use \PDO as PDO;

require_once '../models/conexao.php';

if (isset($_POST['user'])) {
    $usuario = $_POST['user'];
}

if (isset($_POST['pass'])) {
    $senha = $_POST['pass'];
}

try {
    $pdo = Conection::getConnection();
    $sql = "SELECT * FROM colaborador WHERE usuario = :usuario";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":usuario", $usuario);
    $consulta->execute();
    $result = $consulta->fetch(PDO::FETCH_OBJ);

    $msg_erro = '';

    if (password_verify($senha, $result->senha)) {
        session_start();
        $_SESSION['sessao'] = 'liberado';
        $_SESSION['idUsuario'] = $result->idCol;
        $_SESSION['user_name'] = $result->nome;
        $_SESSION['usuario'] = $result->usuario;
        $_SESSION['cpf'] = $result->cpf;
        $_SESSION['funcao'] = $result->funcao;
        $_SESSION['setor'] = $result->setor;
        $_SESSION['tipoUsuario'] = $result->tipoUsuario;
        $_SESSION['login'] = $result->login;
        header('Location: ../views/home.php');
    } else {
        $_SESSION['sessao'] = 'negado';
        $msg_erro = "Usuário ou Senha inválidos!";
        header('Location: ../index.php?msg_erro='.urlencode($msg_erro));
        exit();
    }
} catch (Exception $e) {
    echo "erro: " . $e;
}
