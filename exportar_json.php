<?php
$host = 'localhost';
$db = 'peliculas';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM peliculas");
    $peliculas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$peliculas) {
        echo "No se encontraron datos en la tabla 'peliculas'.";
        exit;
    }

    $moviesJSON = json_encode($peliculas, JSON_PRETTY_PRINT);
    if ($moviesJSON === false) {
        echo "Error al convertir los datos a JSON: " . json_last_error_msg();
        exit;
    }

    // Especifica el nombre del archivo para la descarga
    $filename = 'peliculas.json';

    // Encabezados para forzar la descarga
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . strlen($moviesJSON));

    // Envía el contenido del archivo al navegador
    echo $moviesJSON;
    exit;

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error inesperado: " . $e->getMessage();
}
