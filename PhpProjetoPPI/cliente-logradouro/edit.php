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

$sql = "SELECT * FROM cliente_logradouro WHERE id_clientelog = '$id_clientelog' ";

$stm = $conn->prepare($sql);

$stm->execute();

$dados = $stm->fetchAll(PDO::FETCH_OBJ);


foreach ($dados as $dados):
    
    $id_clientelog = $dados->id_clientelog;
    $fk_cliente = $dados->fk_cliente;
    $fk_logradouro = $dados->fk_logradouro;
    $numero = $dados->numero;
    
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
            <div class="p-3"><input type="hidden" name="id_clientelog" id="id_clientelog" value="<?php echo $id_clientelog; ?>"></div>  
            
            
            <?php
    
        $servername = "localhost";

$username = "root";

$password = "";

$dbname = "lewi";

 

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,

        $password);

// set the PDO error mode to exception

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare sql and bind parameters

$sql1 = "SELECT * FROM cliente";

$stm1 = $conn->prepare($sql1);

$stm1->execute();

$dados1 = $stm1->fetchAll(PDO::FETCH_OBJ);


    echo '<select name="id_cliente">';
        
        foreach ($dados1 as $dado1):
        
            if($fk_cliente == $dado1->id_cliente){
                echo '<option selected value="'.$dado1->id_cliente.'">'.$dado1->nome.'</option>';
            }
            else{
                echo '<option value="'.$dado1->id_cliente.'">'.$dado1->nome.'</option>';
            }
            
    endforeach;

    echo '</select>';


$sql2 = "SELECT * FROM logradouro";

$stm2 = $conn->prepare($sql2);

$stm2->execute();

$dados2 = $stm2->fetchAll(PDO::FETCH_OBJ);


    echo '<br><br><select name="id_logradouro">';
        
        foreach ($dados2 as $dado2):
        
            if($fk_logradouro == $dado2->id_logradouro){
                echo '<option selected value="'.$dado2->id_logradouro.'">'.$dado2->desc_logradouro.'</option>';
            }
            else{
                echo '<option value="'.$dado2->id_logradouro.'">'.$dado2->desc_logradouro.'</option>';
            }
            
    endforeach;

    echo '</select>'

    ?>

        
            <div class="p-3"><input placeholder="Número" type="text" name="numero" id="numero" value="<?php echo $numero; ?>"></div>
           
            <div class="p-3"><input type="submit" value="Cadastrar" /></div>
        </form>
                    
                </div>
             </div>   
        </div>
      
  </body>
</html>
     