<?php
include '../includes/menu.php';

$id_pedido = $_GET["id_pedido"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lewi";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM pedido WHERE id_pedido = '$id_pedido'";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        body {
             background-color: #DCDCDC; 
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="form-container">
        <h2 class="text-center mb-4">Atualizar Pedido</h2>
        
        <form action="update.php" method="GET">
            <input type="hidden" name="id_pedido" id="id_pedido" value="<?php echo $id_pedido; ?>">

            <div class="mb-3">
                <label for="desc_pedido" class="form-label">Descrição do Pedido:</label>
                <textarea id="desc_pedido" name="desc_pedido" class="form-control" rows="5"><?php echo $desc_pedido; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="qtde_pedido" class="form-label">Quantidade do Pedido:</label>
                <input type="text" id="qtde_pedido" name="qtde_pedido" class="form-control" value="<?php echo $qtde_pedido; ?>" placeholder="Quantidade do Pedido">
            </div>
            <div class="mb-3">
                <label for="preco_pedido" class="form-label">Preço do Pedido:</label>
                <input type="text" id="preco_pedido" name="preco_pedido" class="form-control" value="<?php echo $preco_pedido; ?>" placeholder="Preço do Pedido">
            </div>

            <?php
            $sql = "SELECT * FROM cliente";
            $stm = $conn->prepare($sql);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            ?>
            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente:</label>
                <select id="id_cliente" name="id_cliente" class="form-select">
                    <?php
                    foreach ($dados as $dado):
                        if($cliente_pedido_cad == $dado->id_cliente){
                            echo '<option selected value="'.$dado->id_cliente.'">'.$dado->nome.'</option>';
                        } else {
                            echo '<option value="'.$dado->id_cliente.'">'.$dado->nome.'</option>';
                        }
                    endforeach;
                    ?>
                </select>
            </div>
            
            <div class="d-grid">
                <button type="submit" class="btn btn-dark">Atualizar</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
