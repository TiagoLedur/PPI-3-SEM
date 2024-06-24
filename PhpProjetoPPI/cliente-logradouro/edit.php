<?php
include '../includes/menu.php';

$id_clientelog = $_GET["id_clientelog"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lewi";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM cliente_logradouro WHERE id_clientelog = '$id_clientelog'";
$stm = $conn->prepare($sql);
$stm->execute();
$dados = $stm->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $dado):
    $id_clientelog = $dado->id_clientelog;
    $fk_cliente = $dado->fk_cliente;
    $fk_logradouro = $dado->fk_logradouro;
    $numero = $dado->numero;
endforeach;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Dados</title>
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
        <h2 class="text-center mb-4">Atualizar Dados</h2>
        
        <form action="update.php" method="GET">
            <input type="hidden" name="id_clientelog" id="id_clientelog" value="<?php echo $id_clientelog; ?>">

            <?php
            $sql1 = "SELECT * FROM cliente";
            $stm1 = $conn->prepare($sql1);
            $stm1->execute();
            $dados1 = $stm1->fetchAll(PDO::FETCH_OBJ);
            ?>
            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente:</label>
                <select id="id_cliente" name="id_cliente" class="form-select">
                    <?php
                    foreach ($dados1 as $dado1):
                        $selected = ($fk_cliente == $dado1->id_cliente) ? 'selected' : '';
                        echo '<option ' . $selected . ' value="' . $dado1->id_cliente . '">' . $dado1->nome . '</option>';
                    endforeach;
                    ?>
                </select>
            </div>

            <?php
            $sql2 = "SELECT * FROM logradouro";
            $stm2 = $conn->prepare($sql2);
            $stm2->execute();
            $dados2 = $stm2->fetchAll(PDO::FETCH_OBJ);
            ?>
            <div class="mb-3">
                <label for="id_logradouro" class="form-label">Logradouro:</label>
                <select id="id_logradouro" name="id_logradouro" class="form-select">
                    <?php
                    foreach ($dados2 as $dado2):
                        $selected = ($fk_logradouro == $dado2->id_logradouro) ? 'selected' : '';
                        echo '<option ' . $selected . ' value="' . $dado2->id_logradouro . '">' . $dado2->desc_logradouro . '</option>';
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="numero" class="form-label">Número:</label>
                <input type="text" id="numero" name="numero" class="form-control" value="<?php echo $numero; ?>" placeholder="Número">
            </div>
            
            <div class="d-grid">
                <button type="submit" class="btn btn-dark">Atualizar</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
