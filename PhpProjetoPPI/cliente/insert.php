<?php
include '../includes/menu.php';

//$variavel =  $_GET['var_do_form_html'];
$nome =      $_GET['nome'];
$sobrenome = $_GET['sobrenome'];
$idade =     $_GET['idade'];
$id_estadocv = $_GET['id_estadocv'];

//////////////////////abaixo são variáveis de conexão//////////////////////////////////////
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
//////////////////////abaixo a instrução SQL//////////////////////////////////////

try {
    $sql = "INSERT INTO pessoa(nome, sobrenome, idade, id_estadocv) VALUES ('$nome', '$sobrenome', $idade, '$id_estadocv')";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec($sql);
    echo '
<div class="alert alert-success" role="alert">
  Registro inserido com sucesso!
</div> 

    <a href=listar.php>Ver dados</a>

  </body>
</html>
';

   
} catch (PDOException $e) {
    echo '<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
<div class="alert alert-danger" role="alert">
Erro ao salvar produto!!
  ' . $sql . '  <br> ' . $e->getMessage() . ';
</div>    


  </body>
</html>
';
}
$conn = null;

