<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$serverName = "{$_ENV['DB_SERVER']},1433";
$connectionOptions = array(
    "Database" => $_ENV['DB_DATABASE'],
    "Uid" => $_ENV['DB_USERNAME'],
    "PWD" => $_ENV['DB_PASSWORD'],
    "Encrypt" => 1,
    "TrustServerCertificate" => 0
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

$sql = "SELECT * FROM Clientes";
$stmt = sqlsrv_query($conn, $sql);

if (!$stmt) {
    die(print_r(sqlsrv_errors(), true));
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:nth-child(odd) {
            background-color: #ffffff;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Clientes Cadastrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Cidade</th>
            <th>Telefone</th>
        </tr>
        <?php while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) : ?>
        <tr>
            <td><?= $row['Id_Cliente'] ?></td>
            <td><?= $row['Nome'] ?></td>
            <td><?= $row['Endereco'] ?></td>
            <td><?= $row['Cidade'] ?></td>
            <td><?= $row['Telefone'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
