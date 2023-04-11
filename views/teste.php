<?php

if (isset($_POST['submit'])) {

  // Verifica se o arquivo foi enviado
  if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {

    // Verifica se o arquivo é um CSV
    $file_info = pathinfo($_FILES['file']['name']);
    if ($file_info['extension'] == 'csv') {

      // Abre o arquivo CSV
      $file = fopen($_FILES['file']['tmp_name'], 'r');

      // Lê a primeira linha do arquivo (cabeçalho)
      $headers = fgetcsv($file);

      // Loop através do arquivo CSV
      while (($data = fgetcsv($file)) !== false) {

        // Cria um array associativo com os dados da linha
        $user = array_combine($headers, $data);

        // Conecta com o banco de dados (substitua pelos seus dados)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "aloc_novo";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Verifica se a conexão foi bem-sucedida
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        // Insere o usuário na tabela (substitua pelos seus dados)
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('" . $user['nome'] . "', '" . $user['email'] . "', '" . $user['senha'] . "')";

        if (mysqli_query($conn, $sql)) {
          echo "Usuário " . $user['nome'] . " inserido com sucesso!";
        } else {
          echo "Erro ao inserir usuário: " . mysqli_error($conn);
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($conn);

      }

      // Fecha o arquivo CSV
      fclose($file);

    } else {
      echo "O arquivo enviado deve ser um CSV!";
    }

  } else {
    echo "Erro ao enviar o arquivo!";
  }

}

?>

<form method="post" enctype="multipart/form-data">
  <input type="file" name="file">
  <input type="submit" name="submit" value="Enviar">
</form>
