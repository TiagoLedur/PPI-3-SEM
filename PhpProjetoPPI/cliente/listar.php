<?php
include '../includes/menu.php';

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "lewi";

 

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,

        $password);

// set the PDO error mode to exception

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare sql and bind parameters

$sql = "SELECT cliente.*, logradouro.desc_logradouro, estado_cliente.desc_estadocliente
from cliente, logradouro, estado_cliente
where cliente.logradouro_cliente=logradouro.id_logradouro and cliente.estado_cliente=estado_cliente.id_estadocliente";

$stm = $conn->prepare($sql);

$stm->execute();

$dados = $stm->fetchAll(PDO::FETCH_OBJ);

echo' 
        <div class="container text-center">

            <a href="formulario.php"><button type="button" class="btn btn-dark">Inserir novo cadastro</button><a/>


        </div>
        
        <br>

';

echo '<table class="table table-striped">';

    echo '<tr class="table-dark">';
    
    echo'<td class="table-dark"><b>ID</b></td>';

      echo'<td class="table-dark"><b>Nome</b></td>';

      echo'<td class="table-dark"><b>Sobrenome</b></td>';
      
      echo'<td class="table-dark"><b>Contato</b></td>';

      echo'<td class="table-dark"><b>Logradouro</b></td>';
      
      echo'<td class="table-dark"><b>Estado</b></td>';
      
      echo'<td class="table-light"><b>Editar</b></td>';

      echo'<td class="table-light"><b>Excluir</b></td>';

      echo'<td class="table-light"><b>Visualizar</b></td>';


foreach ($dados as $dados):

    echo '<tr class="table-dark">';
    
    echo'<td class="table-dark"> '.$dados->id_cliente.' </td>';

      echo'<td class="table-dark"> '.$dados->nome.' </td>';

      echo'<td class="table-dark"> '.$dados->sobrenome.' </td>';

      echo'<td class="table-dark"> '.$dados->contato.' </td>';
      
      echo'<td class="table-dark"> '.$dados->desc_logradouro.' </td>';

      echo'<td class="table-dark"> '.$dados->desc_estadocliente.' </td>';
      
      echo'<td class="table-light"> <a href="edit.php?id_cliente='.$dados->id_cliente.'"><img src="../imagens/pencil-square.svg"></a></td>';

      echo'<td class="table-light"> <a href="delete.php?id_cliente='.$dados->id_cliente.'"><img src="../imagens/trash-fill.svg"></a></td>';

      echo'<td class="table-light"> <a href="view.php?id_cliente='.$dados->id_cliente.'"><img src="../imagens/eye-fill.svg"></a></td>';


    echo '</tr>';


endforeach;

echo '</table>';

?>
              
              
      </div>    
      

  </body>
</html>