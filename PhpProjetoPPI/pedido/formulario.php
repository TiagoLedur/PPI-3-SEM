<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pedido</title>
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
    </style>
</head>
<body>

<?php
include '../includes/menu.php';
?>

<div class="container mt-5">
    <div class="form-container">
        <h2 class="text-center mb-4">Cadastrar Pedido</h2>
        
        <form action="insert.php" method="GET">
            <div class="mb-3">
                <label for="desc_pedido" class="form-label">Descrição do Pedido:</label>
                <textarea id="desc_pedido" name="desc_pedido" cols="40" rows="5" class="form-control"></textarea>
            </div>
            
            <div class="mb-3">
                <label for="qtde_pedido" class="form-label">Quantidade:</label>
                <input type="text" id="qtde_pedido" name="qtde_pedido" class="form-control" placeholder="Quantidade">
            </div>

            <div class="mb-3">
                <label for="preco_pedido" class="form-label">Preço:</label>
                <input type="text" id="preco_pedido" name="preco_pedido" class="form-control" placeholder="Preço">
            </div>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "lewi";

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM cliente";
            $stm = $conn->prepare($sql);
            $stm->execute();
            $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
            ?>
            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente:</label>
                <select id="id_cliente" name="id_cliente" class="form-select">
                    <?php
                    foreach ($clientes as $cliente):
                        echo '<option value="'.$cliente->id_cliente.'">'.$cliente->nome.'</option>';
                    endforeach;
                    ?>
                </select>
            </div>
            
            <div class="d-grid">
                <button type="submit" class="btn btn-dark">Cadastrar</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
