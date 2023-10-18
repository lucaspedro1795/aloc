<?php

if(isset($_GET['cod_item'])){
    $cod = $_GET['cod_item'];
}

try {
    
} catch (\Exception $e) {
    echo "erro: ". $e;
}

?>