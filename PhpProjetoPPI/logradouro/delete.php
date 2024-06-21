<?php
include '../includes/menu.php';

//$variavel =  $_GET['var_do_form_html'];
$id_logradouro =      $_GET['id_logradouro'];


if(isset($_GET['confirmar']) && $_GET['confirmar'] == 'true') {
//////////////////////abaixo são variáveis de conexão//////////////////////////////////////
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lewi";
//////////////////////abaixo a instrução SQL//////////////////////////////////////

try {
    $sql = "DELETE FROM logradouro WHERE id_logradouro ='$id_logradouro'";

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
}else {echo '
  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Confirmação de Exclusão</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  <body>
      <div class="container">
          <h2>Confirmação de Exclusão</h2>
          <p>Você tem certeza que deseja excluir este registro?</p>
          <a href="delete.php?id_logradouro=' . $id_logradouro . '&confirmar=true" class="btn btn-danger">Sim, Excluir</a>
          <a href="listar.php" class="btn btn-primary">Cancelar</a>
      </div>
  </body>
  </html>';
}
