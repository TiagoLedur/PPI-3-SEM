<?php
include '../includes/menu.php';

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "test";

 

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,

        $password);

// set the PDO error mode to exception

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare sql and bind parameters

$sql = "SELECT pessoa.*, estado_civil.descr_estadocv
from pessoa, estado_civil
where pessoa.id_estadocv=estado_civil.id_estadocv";

$stm = $conn->prepare($sql);

$stm->execute();

$dados = $stm->fetchAll(PDO::FETCH_OBJ);

echo' 
        <div class="container text-center">

            <a href="formulario.php"><button type="button" class="btn btn-primary">Inserir novo cadastro</button><a/>


        </div>
        
        <br>

';

echo '<table class="table table-striped">';

    echo '<tr class="table-primary">';
    
    echo'<td class="table-primary"><b>ID</b></td>';

      echo'<td class="table-primary"><b>Nome</b></td>';

      echo'<td class="table-primary"><b>Sobrenome</b></td>';
      
      echo'<td class="table-primary"><b>Idade</b></td>';

      echo'<td class="table-primary"><b>Estado Civíl</b></td>';
      
      echo'<td class="table-primary"><b>Editar</b></td>';

      echo'<td class="table-primary"><b>Excluir</b></td>';

      echo'<td class="table-primary"><b>Visualizar</b></td>';


foreach ($dados as $dados):

    echo '<tr class="table-primary">';
    
    echo'<td class="table-primary"> '.$dados->id_pessoa.' </td>';

      echo'<td class="table-primary"> '.$dados->nome.' </td>';

      echo'<td class="table-primary"> '.$dados->sobrenome.' </td>';

      echo'<td class="table-primary"> '.$dados->idade.' </td>';
      
      echo'<td class="table-primary"> '.$dados->descr_estadocv.' </td>';
      
      echo'<td class="table-primary"> <a href="edit.php?id_pessoa='.$dados->id_pessoa.'"><img src="../imagens/pencil-square.svg"></a></td>';

      echo'<td class="table-primary"> <a href="delete.php?id_pessoa='.$dados->id_pessoa.'"><img src="../imagens/trash-fill.svg"></a></td>';

      echo'<td class="table-primary"> <a href="view.php?id_pessoa='.$dados->id_pessoa.'"><img src="../imagens/eye-fill.svg"></a></td>';


    echo '</tr>';


endforeach;

echo '</table>';

?>
              
              
      </div>    
      

  </body>
</html>