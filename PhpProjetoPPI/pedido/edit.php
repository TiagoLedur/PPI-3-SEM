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

$sql = "SELECT * FROM pedido WHERE id_pedido = '$id_pedido' ";

$stm = $conn->prepare($sql);

$stm->execute();

$dados = $stm->fetchAll(PDO::FETCH_OBJ);


foreach ($dados as $dado):
    
    $id_pedido = $dado->id_pedido;
    $desc_pedido = $dado->desc_pedido;
    $qtde_pedido = $dado->qtde_pedido;
    $preco_pedido = $dado->preco_pedido;
    $cliente_pedido_cad = $dado->cliente_pedido;
    
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
            <div class="p-3"><input type="hidden" name="id_pedido" id="id_pedido" value="<?php echo $id_pedido; ?>"></div>  

            <div class="form-group row">
                <label for="desc_pedido" class="col-4 col-form-label">Descrição do Pedido:</label> 
                <div class="col-8">
                    <textarea id="desc_pedido" name="desc_pedido" cols="40" rows="5" class="form-control"><?php echo $desc_pedido; ?></textarea>
                </div>
            </div> 
            <br>

            <div class="p-3"><input placeholder="qtde_pedido" type="text" name="qtde_pedido" id="qtde_pedido" value="<?php echo $qtde_pedido; ?>"></div>
            <div class="p-3"><input placeholder="preco_pedido" type="text" name="preco_pedido" id="preco_pedido" value="<?php echo $preco_pedido; ?>"></div>
            
            
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

$sql = "SELECT * FROM cliente";

$stm = $conn->prepare($sql);

$stm->execute();

$dados = $stm->fetchAll(PDO::FETCH_OBJ);

   

    echo '<select name="id_cliente">';
        
        foreach ($dados as $dado):
        
            if($cliente_pedido_cad == $dado->id_cliente){
                echo '<option selected value="'.$dado->id_cliente.'">'.$dado->nome.'</option>';
            }
            else{
                echo '<option value="'.$dado->id_cliente.'">'.$dado->nome.'</option>';
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
     