<?php

require_once '../models/conexao.php';

if(isset($_POST['nome_reg'])){
    $nome_reg = $_POST['nome_reg'];
}

if(isset($_POST['cat'])){
    $cat = $_POST['cat'];
}

if(isset($_POST['num_serie'])){
    $num_serie = $_POST['num_serie'];
}

if(isset($_POST['disponivel'])){
    $disponivel = $_POST['disponivel'];
}


try {
    $pdo = Conection::getConnection();

    $sql = "INSERT INTO items(cod,nome_reg, categoria, num_serie, dispAloc) VALUES(null, :nome_reg, :categoria, :num_serie, :dispAloc)";
    $consulta = $PDO->prepare($sql);
    $consulta->bindParam(':nome_reg', $nome_reg);
    $consulta->bindParam(':categoria', $cat);
    $consulta->bindParam(':num_serie', $num_serie);
    $consulta->bindParam(':disponivel', $disponivel);

    $consulta->execute();

} catch (Exception $e) {
    echo "erro: ". $e;
}
