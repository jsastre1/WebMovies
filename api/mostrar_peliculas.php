<?php
// Conexión a la base de datos
$servername = "localhost"; // Cambia esto según tu configuración
$username = "root"; // Tu usuario de MySQL
$password = ""; // Tu contraseña de MySQL
$dbname = "peliculas"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener todas las películas
$sql = "SELECT * FROM peliculas";
$result = $conn->query($sql);

// Crear un array para almacenar las películas
$peliculas = [];

if ($result && $result->num_rows > 0) {
    // Iterar a través de los resultados y almacenar cada película en el array
    while ($row = $result->fetch_assoc()) {
        echo "Título: " . $row['Title'] . "<br>";
        echo "Año: " . $row['Year'] . "<br>";
        echo "Clasificación: " . $row['Rated'] . "<br>";
        echo "Estreno: " . $row['Released'] . "<br>";
        echo "Duración: " . $row['Runtime'] . "<br>";
        echo "Género: " . $row['Genre'] . "<br>";
        echo "Director: " . $row['Director'] . "<br>";
        echo "Escritor: " . $row['Writer'] . "<br>";
        echo "Actores: " . $row['Actors'] . "<br>";
        echo "Sinopsis: " . $row['Plot'] . "<br>";
        echo "Idioma: " . $row['Language'] . "<br>";
        echo "País: " . $row['Country'] . "<br>";
        echo "Premios: " . $row['Awards'] . "<br>";
        echo "Póster: <img src='" . $row['Poster'] . "' alt='Póster' /><br>";
        echo "Calificaciones: " . $row['Ratings'] . "<br>";
        echo "Metascore: " . $row['Metascore'] . "<br>";
        echo "Calificación IMDb: " . $row['imdbRating'] . "<br>";
        echo "Votos IMDb: " . $row['imdbVotes'] . "<br>";
        echo "ID IMDb: " . $row['imdbID'] . "<br>";
        echo "Tipo: " . $row['Type'] . "<br>";
        echo "DVD: " . $row['DVD'] . "<br>";
        echo "Box Office: " . $row['BoxOffice'] . "<br>";
        echo "Producción: " . $row['Production'] . "<br>";
        echo "Sitio web: <a href='" . $row['Website'] . "'>" . $row['Website'] . "</a><br>";
        echo "<hr>"; // Línea horizontal para separar películas
    }
}else{
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();
?>