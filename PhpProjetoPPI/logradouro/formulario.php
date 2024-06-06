
<?php
include '../includes/menu.php';
?>
        
        
        <div class="container text-center">
            
            <br><br><br><br>
            
            <h2>Cadastrar Logradouro</h2>
            
            <div class="row">
                <div class="col">
                    <br>          
        <form action="insert.php" method="GET" >
            <div class="p-3"><input placeholder="Descricao" type="text" name="desc_logradouro"      id="desc_logradouro"></div>
            <div class="p-3"><input placeholder="Numero" type="text" name="numero" id="numero"></div>
            
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


    ?>
         
            
            <div class="p-3"><input type="submit" value="Cadastrar" /></div>
        </form>
                    
                </div>
             </div>   
        </div>
      
  </body>
</html>
     