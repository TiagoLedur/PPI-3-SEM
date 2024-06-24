<?php
include '../includes/menu.php';

$id_cliente = $_GET["id_cliente"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lewi";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM cliente WHERE id_cliente = '$id_cliente'";
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
        <h2 class="text-center mb-4">Dados Atualizados</h2>
        
        <form action="update.php" method="GET">
            <input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $id_cliente; ?>">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $nome; ?>" placeholder="Nome">
            </div>
            <div class="mb-3">
                <label for="sobrenome" class="form-label">Sobrenome:</label>
                <input type="text" id="sobrenome" name="sobrenome" class="form-control" value="<?php echo $sobrenome; ?>" placeholder="Sobrenome">
            </div>
            <div class="mb-3">
                <label for="contato" class="form-label">Contato:</label>
                <input type="text" id="contato" name="contato" class="form-control" value="<?php echo $contato; ?>" placeholder="Contato">
            </div>

            <?php
            $sql1 = "SELECT * FROM logradouro";
            $stm1 = $conn->prepare($sql1);
            $stm1->execute();
            $dados1 = $stm1->fetchAll(PDO::FETCH_OBJ);
            ?>
            <div class="mb-3">
                <label for="id_logradouro" class="form-label">Logradouro:</label>
                <select id="id_logradouro" name="id_logradouro" class="form-select">
                    <?php
                    foreach ($dados1 as $dado1):
                        $selected = ($id_logradouro_cad == $dado1->id_logradouro) ? 'selected' : '';
                        echo '<option ' . $selected . ' value="' . $dado1->id_logradouro . '">' . $dado1->desc_logradouro . '</option>';
                    endforeach;
                    ?>
                </select>
            </div>

            <?php
            $sql2 = "SELECT * FROM estado_cliente";
            $stm2 = $conn->prepare($sql2);
            $stm2->execute();
            $dados2 = $stm2->fetchAll(PDO::FETCH_OBJ);
            ?>
            <div class="mb-3">
                <label for="id_estadocliente" class="form-label">Estado Cliente:</label>
                <select id="id_estadocliente" name="id_estadocliente" class="form-select">
                    <?php
                    foreach ($dados2 as $dado2):
                        $selected = ($id_estadocliente_cad == $dado2->id_estadocliente) ? 'selected' : '';
                        echo '<option ' . $selected . ' value="' . $dado2->id_estadocliente . '">' . $dado2->desc_estadocliente . '</option>';
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
