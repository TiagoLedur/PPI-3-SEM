<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Logradouro</title>
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
        <h2 class="text-center mb-4">Cadastrar Logradouro</h2>
        
        <form action="insert.php" method="GET">
            <div class="mb-3">
                <label for="desc_logradouro" class="form-label">Descrição:</label>
                <input type="text" id="desc_logradouro" name="desc_logradouro" class="form-control" placeholder="Descrição do logradouro">
            </div>
            
            <div class="d-grid">
                <button type="submit" class="btn btn-dark">Cadastrar</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
