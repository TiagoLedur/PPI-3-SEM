<?php
include '../includes/menu.php';

//$variavel =  $_GET['var_do_form_html'];
$id_pessoa =      $_GET['id_pessoa'];


//////////////////////abaixo são variáveis de conexão//////////////////////////////////////
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
//////////////////////abaixo a instrução SQL//////////////////////////////////////

try {
    $sql = "DELETE FROM pessoa WHERE id_pessoa ='$id_pessoa'";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec($sql);
    echo '
<div class="alert alert-success" role="alert">
  Registro excluído com sucesso!
</div>    

<a href=listar.php>Retornar</a>

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
Erro ao salvar operação!!
  ' . $sql . '  <br> ' . $e->getMessage() . ';
</div>    


  </body>
</html>
';
}
$conn = null;
