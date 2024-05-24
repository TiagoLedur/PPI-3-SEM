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

$sql = "SELECT * FROM pessoa WHERE id_pessoa = '$id_pessoa' ";

$stm = $conn->prepare($sql);

$stm->execute();

$dados = $stm->fetchAll(PDO::FETCH_OBJ);


foreach ($dados as $dados):
    
    $id_pessoa = $dados->id_pessoa;
    $nome = $dados->nome;
    $sobrenome = $dados->sobrenome;
    $idade = $dados->idade;
    $id_estadocv_cad = $dados->id_estadocv;
    
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
            <div class="p-3"><input type="hidden" name="id_pessoa" id="id_pessoa" value="<?php echo $id_pessoa; ?>"></div>  
            <div class="p-3"><input placeholder="Nome" type="text" name="nome" id="nome" value="<?php echo $nome; ?>"></div>
            <div class="p-3"><input placeholder="Sobrenome" type="text" name="sobrenome" id="sobrenome" value="<?php echo $sobrenome; ?>"></div>
            <div class="p-3"><input placeholder="Idade" type="text" name="idade" id="idade" value="<?php echo $idade; ?>"></div>
            
            
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
        
            if($id_estadocv_cad == $dados->id_estadocv){
                echo '<option selected value="'.$dados->id_estadocv.'">'.$dados->descr_estadocv.'</option>';
            }
            else{
                echo '<option value="'.$dados->id_estadocv.'">'.$dados->descr_estadocv.'</option>';
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
     