<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Logradouro à Cliente</title>
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
        <h2 class="text-center mb-4">Cadastrar Logradouro à Cliente</h2>
        
        <form action="insert.php" method="GET">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "lewi";

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Consultar clientes
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

            <?php
            // Consultar logradouros
            $sql1 = "SELECT * FROM logradouro";
            $stm1 = $conn->prepare($sql1);
            $stm1->execute();
            $logradouros = $stm1->fetchAll(PDO::FETCH_OBJ);
            ?>
            <div class="mb-3">
                <label for="id_logradouro" class="form-label">Logradouro:</label>
                <select id="id_logradouro" name="id_logradouro" class="form-select">
                    <?php
                    foreach ($logradouros as $logradouro):
                        echo '<option value="'.$logradouro->id_logradouro.'">'.$logradouro->desc_logradouro.'</option>';
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="numero" class="form-label">Número:</label>
                <input type="text" id="numero" name="numero" class="form-control" placeholder="Número">
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-dark">Cadastrar</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
