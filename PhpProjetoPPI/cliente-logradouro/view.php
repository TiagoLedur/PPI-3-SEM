<?php
include '../includes/menu.php';

 $id_clientelog = $_GET["id_clientelog"];

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
WHERE cliente.id_cliente=cliente_logradouro.fk_cliente and logradouro.id_logradouro=cliente_logradouro.fk_logradouro and id_clientelog=$id_clientelog";


$stm = $conn->prepare($sql);

$stm->execute();

$dados = $stm->fetchAll(PDO::FETCH_OBJ);

echo '<table class="table table-striped-columns">';

foreach ($dados as $dados):

    echo '<tr class="table-dark">';
    
    echo'<td class="table-dark"> '.$dados->id_clientelog.' </td>';

    echo'<td class="table-dark"> '.$dados->nome.' </td>';

    echo'<td class="table-dark"> '.$dados->desc_logradouro.' </td>';

    echo'<td class="table-dark"> '.$dados->numero.' </td>';

    echo '</tr>';


endforeach;

echo '</table>';


?>
              
              
      </div>    
      
  </body>
</html>