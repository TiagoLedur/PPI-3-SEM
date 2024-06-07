<?php
include '../includes/menu.php';

 $id_pessoa = $_GET["id_pessoa"];

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "test";

 

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,

        $password);

// set the PDO error mode to exception

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare sql and bind parameters

$sql = "SELECT * FROM pessoa where id_pessoa = $id_pessoa";

$stm = $conn->prepare($sql);

$stm->execute();

$dados = $stm->fetchAll(PDO::FETCH_OBJ);

echo '<table class="table table-striped-columns">';

foreach ($dados as $dados):

    echo '<tr class="table-primary">';
    
    echo'<td class="table-primary"> '.$dados->id_pessoa.' </td>';

      echo'<td class="table-primary"> '.$dados->nome.' </td>';

      echo'<td class="table-primary"> '.$dados->sobrenome.' </td>';

      echo'<td class="table-primary"> '.$dados->idade.' </td>';


    echo '</tr>';


endforeach;

echo '</table>';


?>
              
              
      </div>    
      
  </body>
</html>