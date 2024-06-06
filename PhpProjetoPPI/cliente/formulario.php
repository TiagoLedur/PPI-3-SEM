
<?php
include '../includes/menu.php';
?>
        
        
        <div class="container text-center">
            
            <br><br><br><br>
            
            <h2>Formulário</h2>
            
            <div class="row">
                <div class="col">
                    <br>          
        <form action="insert.php" method="GET" >
            <div class="p-3"><input placeholder="Nome" type="text" name="nome"      id="nome"></div>
            <div class="p-3"><input placeholder="Sobrenome" type="text" name="sobrenome" id="sobrenome"></div>
            <div class="p-3"><input placeholder="Idade" type="text" name="idade"     id="idade"></div>
            
             <?php
    
        $servername = "localhost";

$username = "root";

$password = "";

$dbname = "test";

 

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,

        $password);

// set the PDO error mode to exception

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare sql and bind parameters

$sql = "SELECT * FROM estado_civil";

$stm = $conn->prepare($sql);

$stm->execute();

$dados = $stm->fetchAll(PDO::FETCH_OBJ);

   

    echo '<select name="id_estadocv">';
        
        foreach ($dados as $dados):
        
        echo '<option value="'.$dados->id_estadocv.'">'.$dados->descr_estadocv.'</option>';
        
    endforeach;

    echo '</select>'

    ?>
         
            
            <div class="p-3"><input type="submit" value="Cadastrar" /></div>
        </form>
                    
                </div>
             </div>   
        </div>
      
  </body>
</html>
     