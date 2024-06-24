<?php
include '../includes/menu.php';

$id_cliente = $_GET['id_cliente'];
$nome = $_GET['nome'];
$sobrenome = $_GET['sobrenome'];
$contato = $_GET['contato'];
$id_logradouro = $_GET['id_logradouro'];
$id_estadocliente = $_GET['id_estadocliente'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lewi";

try {
    $sql = "UPDATE cliente SET nome = '$nome', sobrenome = '$sobrenome', contato = '$contato', logradouro_cliente = '$id_logradouro', estado_cliente = '$id_estadocliente' WHERE id_cliente = '$id_cliente'";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec($sql);

    echo '
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atualização de Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Sucesso!</h4>
        <p>Dado atualizado com sucesso.</p>
        <hr>
        <a href="listar.php" class="btn btn-success">Retornar</a>
      </div>
    </div>
  </body>
</html>
    ';
} catch (PDOException $e) {
    echo '
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atualização de Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Erro!</h4>
        <p>Erro ao atualizar dados. Por favor, tente novamente.</p>
        <hr>
        <p class="mb-0">' . $sql . '<br>' . $e->getMessage() . '</p>
        <a href="listar.php" class="btn btn-danger mt-3">Tentar novamente</a>
      </div>
    </div>
  </body>
</html>
    ';
}
$conn = null;
?>
