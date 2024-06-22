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

$sql = "SELECT cliente_logradouro.*, cliente.nome, logradouro.desc_logradouro  
FROM cliente_logradouro, cliente, logradouro
WHERE cliente.id_cliente=cliente_logradouro.fk_cliente and logradouro.id_logradouro=cliente_logradouro.fk_logradouro";

$stm = $conn->prepare($sql);

$stm->execute();

$dados = $stm->fetchAll(PDO::FETCH_OBJ);

echo'
        
        <div class="container text-center">
      
            <a href="formulario.php"><button type="button" class="btn btn-dark">Inserir novo cadastro</button><a/>


        </div>
        
        <br>

';

echo '<table class="table table-dark table-striped">';

    echo '<tr class="table-dark">';
    
    echo'<td class="table-dark"><b>ID</b></td>';

      echo'<td class="table-dark"><b>Cliente</b></td>';   
      
      echo'<td class="table-dark"><b>Logradouro</b></td>';

      echo'<td class="table-dark"><b>Número</b></td>';

      echo'<td class="table-light"><b>Editar</b></td>';

      echo'<td class="table-light"><b>Excluir</b></td>';

      echo'<td class="table-light"><b>Visualizar</b></td>';
      

foreach ($dados as $dados):

    echo '<tr class="table-dark">';
    
    echo'<td class="table-dark"> '.$dados->id_clientelog.' </td>';

      echo'<td class="table-dark"> '.$dados->nome.' </td>';

      echo'<td class="table-dark"> '.$dados->desc_logradouro.' </td>';

      echo'<td class="table-dark"> '.$dados->numero.' </td>';

      echo'<td class="table-light"> <a href="edit.php?id_clientelog='.$dados->id_clientelog.'"><img src="../imagens/pencil-square.svg"></a></td>';

      echo'<td class="table-light"> <a href="delete.php?id_clientelog='.$dados->id_clientelog.'"><img src="../imagens/trash-fill.svg"></a></td>';

      echo'<td class="table-light"> <a href="view.php?id_clientelog='.$dados->id_clientelog.'"><img src="../imagens/eye-fill.svg"></a></td>';


    echo '</tr>';


endforeach;

echo '</table>';


?>
              
              
      </div>    
      

  </body>
</html>