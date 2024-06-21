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

$sql = "SELECT * FROM logradouro WHERE id_logradouro = '$id_logradouro' ";

$stm = $conn->prepare($sql);

$stm->execute();

$dados = $stm->fetchAll(PDO::FETCH_OBJ);


foreach ($dados as $dados):
    
    $id_logradouro = $dados->id_logradouro;
    $desc_logradouro = $dados->desc_logradouro;
    
    
endforeach;
    
    ?>



<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Atualizar Dados</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>

        
        
        <div class="container text-center">
            
            
            
            <h2>Dados atualizados:</h2>
            
            <div class="row">
                <div class="col">
                              
        <form action="update.php" method="GET" >
            <div class="p-3"><input type="hidden" name="id_logradouro" id="id_logradouro" value="<?php echo $id_logradouro; ?>"></div>  
            <div class="p-3"><input placeholder="Descricao" type="text" name="desc_logradouro" id="desc_logradouro" value="<?php echo $desc_logradouro; ?>"></div>
                       
        
            
           
            <div class="p-3"><input type="submit" value="Cadastrar" /></div>
        </form>
                    
                </div>
             </div>   
        </div>
      
  </body>
</html>
     