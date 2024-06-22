<?php
include '../includes/menu.php';

 $id_pedido = $_GET["id_pedido"];

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "lewi";

 

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,

        $password);

// set the PDO error mode to exception

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare sql and bind parameters

$sql = "SELECT pedido.*, cliente.nome
from pedido, cliente 
where pedido.cliente_pedido = cliente.id_cliente and id_pedido = $id_pedido";

$stm = $conn->prepare($sql);

$stm->execute();

$dados = $stm->fetchAll(PDO::FETCH_OBJ);

echo '<table class="table table-striped-columns">';

foreach ($dados as $dados):

    echo '<tr class="table-dark">';
    
    echo'<td class="table-dark"> '.$dados->id_pedido.' </td>';

      echo'<td class="table-dark"> '.$dados->desc_pedido.' </td>';

      echo'<td class="table-dark"> '.$dados->qtde_pedido.' </td>';

      echo'<td class="table-dark"> '.$dados->preco_pedido.' </td>';

      echo'<td class="table-dark"> '.$dados->nome.' </td>';

    echo '</tr>';


endforeach;

echo '</table>';


?>
              
              
      </div>    
      
  </body>
</html>