<?php
include '../includes/menu.php';

 $id_logradouro = $_GET["id_logradouro"];

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "lewi";

 

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,

        $password);

// set the PDO error mode to exception

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare sql and bind parameters

$sql = "SELECT * FROM logradouro where id_logradouro = $id_logradouro";





$stm = $conn->prepare($sql);

$stm->execute();

$dados = $stm->fetchAll(PDO::FETCH_OBJ);

echo '<table class="table table-striped-columns">';

foreach ($dados as $dados):

    echo '<tr class="table-dark">';
    
     echo'<td class="table-dark"> '.$dados->id_logradouro.' </td>';

      echo'<td class="table-dark"> '.$dados->desc_logradouro.' </td>';

    echo '</tr>';


endforeach;

echo '</table>';


?>
              
              
      </div>    
      
  </body>
</html>