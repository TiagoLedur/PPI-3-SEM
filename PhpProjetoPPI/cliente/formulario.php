<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
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
        <h2 class="text-center mb-4">Cadastrar Cliente</h2>
        
        <form action="insert.php" method="GET">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome">
            </div>
            <div class="mb-3">
                <label for="sobrenome" class="form-label">Sobrenome:</label>
                <input type="text" id="sobrenome" name="sobrenome" class="form-control" placeholder="Sobrenome">
            </div>
            <div class="mb-3">
                <label for="contato" class="form-label">Contato:</label>
                <input type="text" id="contato" name="contato" class="form-control" placeholder="Contato">
            </div>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "lewi";

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM logradouro";
            $stm = $conn->prepare($sql);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            ?>
            <div class="mb-3">
                <label for="id_logradouro" class="form-label">Logradouro:</label>
                <select id="id_logradouro" name="id_logradouro" class="form-select">
                    <?php
                    foreach ($dados as $dado):
                        echo '<option value="'.$dado->id_logradouro.'">'.$dado->desc_logradouro.'</option>';
                    endforeach;
                    ?>
                </select>
            </div>

            <?php
            $sql = "SELECT * FROM estado_cliente";
            $stm = $conn->prepare($sql);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            ?>
            <div class="mb-3">
                <label for="id_estadocliente" class="form-label">Estado Cliente:</label>
                <select id="id_estadocliente" name="id_estadocliente" class="form-select">
                    <?php
                    foreach ($dados as $dado):
                        echo '<option value="'.$dado->id_estadocliente.'">'.$dado->desc_estadocliente.'</option>';
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
