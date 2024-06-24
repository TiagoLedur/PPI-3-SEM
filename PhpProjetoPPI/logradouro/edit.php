<?php
include '../includes/menu.php';

$id_logradouro = $_GET["id_logradouro"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lewi";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM logradouro WHERE id_logradouro = '$id_logradouro'";
$stm = $conn->prepare($sql);
$stm->execute();
$dados = $stm->fetchAll(PDO::FETCH_OBJ);

foreach ($dados as $dado):
    $id_logradouro = $dado->id_logradouro;
    $desc_logradouro = $dado->desc_logradouro;
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
            <input type="hidden" name="id_logradouro" id="id_logradouro" value="<?php echo $id_logradouro; ?>">

            <div class="mb-3">
                <label for="desc_logradouro" class="form-label">Descrição:</label>
                <input type="text" id="desc_logradouro" name="desc_logradouro" class="form-control" value="<?php echo $desc_logradouro; ?>" placeholder="Descrição">
            </div>
            
            <div class="d-grid">
                <button type="submit" class="btn btn-dark">Atualizar</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
