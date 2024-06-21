<?php
include '../includes/menu.php';

$id_cliente = $_GET["id_cliente"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lewi";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare sql and bind parameters
$sql = "SELECT cliente.*, logradouro.desc_logradouro, estado_cliente.desc_estadocliente
        FROM cliente
        INNER JOIN logradouro ON cliente.logradouro_cliente = logradouro.id_logradouro
        INNER JOIN estado_cliente ON cliente.estado_cliente = estado_cliente.id_estadocliente
        WHERE cliente.id_cliente = :id_cliente";

$stm = $conn->prepare($sql);
$stm->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
$stm->execute();
$dados = $stm->fetchAll(PDO::FETCH_OBJ);

echo '<table class="table table-striped-columns">';
foreach ($dados as $dado) {
    echo '<tr class="table-dark">';
    echo '<td class="table-dark">' . htmlspecialchars($dado->id_cliente) . '</td>';
    echo '<td class="table-dark">' . htmlspecialchars($dado->nome) . '</td>';
    echo '<td class="table-dark">' . htmlspecialchars($dado->sobrenome) . '</td>';
    echo '<td class="table-dark">' . htmlspecialchars($dado->contato) . '</td>';
    echo '<td class="table-dark">' . htmlspecialchars($dado->desc_logradouro) . '</td>';
    echo '<td class="table-dark">' . htmlspecialchars($dado->desc_estadocliente) . '</td>';
    echo '</tr>';
}
echo '</table>';
?>
</div>    
</body>
</html>
