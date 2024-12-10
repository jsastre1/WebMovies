<?php
header('Content-Type: application/json');

$host = 'localhost';
$db = 'peliculas';
$user = 'root';
$pass = '';

// Conectar a la base de datos
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Error de conexión: ' . $conn->connect_error]);
    exit();
}

// Consultar las películas
$sql = "SELECT * FROM peliculas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $peliculas = [];
    while ($row = $result->fetch_assoc()) {
        $peliculas[] = $row;
    }
    echo json_encode($peliculas);
} else {
    echo json_encode(['message' => 'No se encontraron películas']);
}

$conn->close();
?>
