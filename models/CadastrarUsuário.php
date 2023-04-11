<?php

require_once './conexao.php';

if(isset($_GET['nome'])){
    $nome = $_GET['nome'];
}

if(isset($_GET['cpf'])){
    $cpf = $_GET['cpf'];
}

if(isset($_GET['funcaoUser'])){
    $funcao = $_GET['funcaoUser'];
}

if(isset($_GET['setorUser'])){
    $setor = $_GET['setorUser'];
}

if(isset($_GET['usuario'])){
    $usuario = $_GET['usuario'];
}

if(isset($_GET['senha'])){
    $senha = password_hash($_GET['senha'], PASSWORD_DEFAULT);
}

try {
    $pdo = Conection::getConnection();
    $sql = "INSERT INTO administrador (nome, cpf, funcao, setor, usuario, senha) VALUES (:nome,:cpf,:funcao,:setor,:usuario,:senha)";
    $consulta = $pdo->prepare($sql);

    $consulta->bindParam(':nome', $nome);
    $consulta->bindParam(':cpf', $cpf);
    $consulta->bindParam(':funcao', $funcao);
    $consulta->bindParam(':setor', $setor);
    $consulta->bindParam(':usuario', $usuario);
    $consulta->bindParam(':senha', $senha);
    
    $consulta->execute();
} catch (Exception $e) {
    echo "erro: ". $e;
}

?>