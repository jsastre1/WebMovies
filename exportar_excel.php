<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "peliculas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear un nuevo objeto Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Añadir encabezados a las columnas
$headers = [
    'Title', 'Year', 'Rated', 'Released', 'Runtime', 'Genre', 
    'Director', 'Writer', 'Actors', 'Plot', 'Language', 
    'Country', 'Awards', 'Ratings', 'Metascore', 'imdbRating', 
    'imdbVotes', 'imdbID', 'Type', 'DVD', 'BoxOffice', 
    'Production', 'Website', 'Response', 'Poster'
];

foreach ($headers as $key => $header) {
    // Usar setCellValue con la referencia de celda
    $sheet->setCellValue(chr(65 + $key) . '1', $header); // chr(65) es 'A', chr(66) es 'B', etc.
}

// Añadir datos de las películas de la base de datos
$row = 2; // Empezar en la segunda fila
$sql = "SELECT * FROM peliculas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($pelicula = $result->fetch_assoc()) {
        foreach ($headers as $key => $header) {
            $sheet->setCellValue(chr(65 + $key) . $row, $pelicula[$header] ?? 'N/A');
        }
        $row++;
    }
}

// Obtener películas de la API de OMDB
$apiKey = '26e0f7c5'; // Reemplaza con tu clave de API
$apiUrl = 'https://www.omdbapi.com/?s=Harry&apikey=' . $apiKey; 
$response = file_get_contents($apiUrl);
$peliculasAPI = json_decode($response, true);

// Verificar si la respuesta es válida
if (isset($peliculasAPI['Search'])) {
    foreach ($peliculasAPI['Search'] as $pelicula) {
        $sheet->setCellValue('A' . $row, $pelicula['Title'] ?? 'No disponible');
        $sheet->setCellValue('B' . $row, $pelicula['Year'] ?? 'No disponible');
        $sheet->setCellValue('C' . $row, $pelicula['Rated'] ?? 'No disponible');
        $sheet->setCellValue('D' . $row, $pelicula['Released'] ?? 'No disponible');
        $sheet->setCellValue('E' . $row, $pelicula['Runtime'] ?? 'No disponible');
        $sheet->setCellValue('F' . $row, $pelicula['Genre'] ?? 'No disponible');
        $sheet->setCellValue('G' . $row, $pelicula['Director'] ?? 'No disponible');
        $sheet->setCellValue('H' . $row, $pelicula['Writer'] ?? 'No disponible');
        $sheet->setCellValue('I' . $row, $pelicula['Actors'] ?? 'No disponible');
        $sheet->setCellValue('J' . $row, $pelicula['Plot'] ?? 'No disponible');
        $sheet->setCellValue('K' . $row, $pelicula['Language'] ?? 'No disponible');
        $sheet->setCellValue('L' . $row, $pelicula['Country'] ?? 'No disponible');
        $sheet->setCellValue('M' . $row, $pelicula['Awards'] ?? 'No disponible');
        $sheet->setCellValue('N' . $row, $pelicula['Metascore'] ?? 'No disponible');
        $sheet->setCellValue('O' . $row, $pelicula['imdbRating'] ?? 'No disponible');
        $sheet->setCellValue('P' . $row, $pelicula['imdbVotes'] ?? 'No disponible');
        $sheet->setCellValue('Q' . $row, $pelicula['BoxOffice'] ?? 'No disponible');
        $sheet->setCellValue('R' . $row, $pelicula['imdbID'] ?? 'No disponible');
        $sheet->setCellValue('S' . $row, $pelicula['Type'] ?? 'No disponible');
        $sheet->setCellValue('T' . $row, $pelicula['DVD'] ?? 'No disponible');
        $sheet->setCellValue('U' . $row, $pelicula['Production'] ?? 'No disponible');
        $sheet->setCellValue('V' . $row, $pelicula['Website'] ?? 'No disponible');
        $sheet->setCellValue('W' . $row, $pelicula['Ratings'][0]['Value'] ?? 'No disponible'); // Ejemplo para otro campo posible
        $sheet->setCellValue('X' . $row, 'N/A'); // Campo adicional que no esté en la API
        $sheet->setCellValue('Y' . $row, $pelicula['Poster'] ?? 'No disponible');
        $row++;
    }
}


// Guardar el archivo Excel
$writer = new Xlsx($spreadsheet);
$filename = 'peliculas.xlsx';
$writer->save($filename);

// Descargar el archivo Excel
if (file_exists($filename)) {
    // Limpiar la salida del búfer
    ob_clean();
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
    header('Cache-Control: max-age=0');
    readfile($filename);
    exit; // Asegúrate de salir después de la descarga
} else {
    echo "El archivo no existe.";
}

// Cerrar la conexión
$conn->close();
?>