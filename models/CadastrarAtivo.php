<?php

require_once './conexao.php';


if (isset($_GET['nome_reg'])) {
    $nome_reg = $_GET['nome_reg'];
}

if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
}

if (isset($_GET['num_serie'])) {
    $num_serie = $_GET['num_serie'];
}

if (isset($_GET['setorAtivo'])) {
    $setor = $_GET['setorAtivo'];
}


if (isset($_GET['disponivel'])) {
    $disponivel = $_GET['disponivel'];
}

function generateUniqueRandomCode($length = 6)
{
    $characters = '0123456789';
    $code = '';
    $codes = []; // Array para armazenar os códigos gerados anteriormente
    do {
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
    } while (in_array($code, $codes)); // Repete até que o código gerado seja único
    $codes[] = $code; // Adiciona o código gerado ao array de códigos
    return $code;
}

$cod_item = GenerateUniqueRandomCode();

try {
    $pdo = Conection::getConnection();

    $sql = "INSERT INTO items(cod_item,nome_reg, categoria, num_serie, horario_alocado, setor, dispAloc) VALUES(:cod_item, :nome_reg, :categoria, :num_serie,null, :setor, :disponivel)";

    $consulta = $pdo->prepare($sql);

    $consulta->bindParam(':nome_reg', $nome_reg);

    $consulta->bindParam(':categoria', $cat);

    $consulta->bindParam(':num_serie', $num_serie);

    $consulta->bindParam(':setor', $setor);

    $consulta->bindParam(':disponivel', $disponivel);

    $consulta->bindParam(':cod_item', $cod_item);


    $consulta->execute();
} catch (Exception $e) {
    echo "erro: " . $e;
}
