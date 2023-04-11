<?php

function generateUniqueRandomCode($length = 6) {
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
  

  echo generateUniqueRandomCode();
  

?>