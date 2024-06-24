<?php
include '../includes/menu.php';

if (isset($_GET['id_pedido'])) {
    $id_pedido = $_GET['id_pedido'];

    if (isset($_GET['confirmar']) && $_GET['confirmar'] == 'true') {
        // Lógica para exclusão
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lewi";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE FROM pedido WHERE id_pedido = :id_pedido";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_pedido', $id_pedido, PDO::PARAM_INT);
            $stmt->execute();

            echo '
            <!DOCTYPE html>
            <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Exclusão de Pedido</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <style>
                    body {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                    }
                </style>
            </head>
            <body>
                <div class="container text-center">
                    <div class="alert alert-success" role="alert">
                        Registro excluído com sucesso!
                    </div>    
                    <a href="listar.php" class="btn btn-primary">Retornar</a>
                </div>
            </body>
            </html>';
            
        } catch (PDOException $e) {
            echo '
            <!DOCTYPE html>
            <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Exclusão de Pedido</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <style>
                    body {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                    }
                </style>
            </head>
            <body>
                <div class="container text-center">
                    <div class="alert alert-danger" role="alert">
                        Erro ao excluir registro: ' . $e->getMessage() . '
                    </div>    
                    <a href="listar.php" class="btn btn-primary">Retornar</a>
                </div>
            </body>
            </html>';
        }

        $conn = null;
    } else {
        // Página de confirmação de exclusão
        echo '
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Confirmação de Exclusão</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <style>
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
            </style>
        </head>
        <body>
            <div class="container text-center">
                <h2 class="mt-5">Confirmação de Exclusão</h2>
                <p>Você tem certeza que deseja excluir este registro?</p>
                <a href="delete.php?id_pedido=' . $id_pedido . '&confirmar=true" class="btn btn-danger">Sim, Excluir</a>
                <a href="listar.php" class="btn btn-primary">Cancelar</a>
            </div>
        </body>
        </html>';
    }
} else {
    // Caso o id_pedido não seja fornecido
    echo 'ID do pedido não fornecido.';
}
?>
