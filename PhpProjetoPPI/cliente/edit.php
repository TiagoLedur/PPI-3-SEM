    <?php
    
    include '../includes/menu.php';
    
        $id_cliente = $_GET["id_cliente"];
        
        $servername = "localhost";

$username = "root";

$password = "";

$dbname = "lewi";

 

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,

        $password);

// set the PDO error mode to exception

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare sql and bind parameters

$sql = "SELECT * FROM cliente WHERE id_cliente = '$id_cliente' ";

$stm = $conn->prepare($sql);

$stm->execute();

$dados = $stm->fetchAll(PDO::FETCH_OBJ);


foreach ($dados as $dado):
    
    $id_cliente = $dado->id_cliente;
    $nome = $dado->nome;
    $sobrenome = $dado->sobrenome;
    $contato = $dado->contato;
    $id_logradouro_cad = $dado->logradouro_cliente;
    $id_estadocliente_cad = $dado->estado_cliente;

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
            
            <br>
            
            <h2>Dados atualizados:</h2>
            
            <div class="row">
                <div class="col">
                    <br>          
        <form action="update.php" method="GET" >
            <div class="p-3"><input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $id_cliente; ?>"></div>  
            <div class="p-3"><input placeholder="Nome" type="text" name="nome" id="nome" value="<?php echo $nome; ?>"></div>
            <div class="p-3"><input placeholder="Sobrenome" type="text" name="sobrenome" id="sobrenome" value="<?php echo $sobrenome; ?>"></div>
            <div class="p-3"><input placeholder="Contato" type="text" name="contato" id="contato" value="<?php echo $contato; ?>"></div>
            
            
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

$sql1 = "SELECT * FROM logradouro";

$stm1 = $conn->prepare($sql1);

$stm1->execute();

$dados1 = $stm1->fetchAll(PDO::FETCH_OBJ);


    echo '<select name="id_logradouro">';
        
        foreach ($dados1 as $dado1):
        
            if($id_logradouro_cad == $dado1->id_logradouro){
                echo '<option selected value="'.$dado1->id_logradouro.'">'.$dado1->desc_logradouro.'</option>';
            }
            else{
                echo '<option value="'.$dado1->id_logradouro.'">'.$dado1->desc_logradouro.'</option>';
            }
            
    endforeach;

    echo '</select>';


$sql2 = "SELECT * FROM estado_cliente";

$stm2 = $conn->prepare($sql2);

$stm2->execute();

$dados2 = $stm2->fetchAll(PDO::FETCH_OBJ);


    echo '<br><br><select name="id_estadocliente">';
        
        foreach ($dados2 as $dado2):
        
            if($id_estadocliente_cad == $dado2->id_estadocliente){
                echo '<option selected value="'.$dado2->id_estadocliente.'">'.$dado2->desc_estadocliente.'</option>';
            }
            else{
                echo '<option value="'.$dado2->id_estadocliente.'">'.$dado2->desc_estadocliente.'</option>';
            }
            
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
     